<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatterApi;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserFetchResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return ResponseFormatterApi::error(
                ['message' => $validator->errors()],
                'Authentication Failed',
                422
            );
        }
        try {
            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)) {
                return ResponseFormatterApi::error(
                    [
                        'message' => 'Unauthorized'
                    ],
                    'Authentication Failed',
                    500
                );
            }

            $user = User::where('email', $request->email)->first();

            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            // jika user memiliki role sebagai admin maka jangan login
            if ($user->hasRole('super-admin') || $user->hasRole('admin-pusat') || $user->hasRole('admin-himpunan')) {
                return ResponseFormatterApi::error(
                    [
                        'message' => 'Unauthorized'
                    ],
                    'Authentication Failed',
                    500
                );
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatterApi::success(
                [
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $user
                ],
                'Authenticated'
            );
        } catch (\Exception $error) {
            return ResponseFormatterApi::error(
                [
                    'message' => 'Something went wrong',
                    'error' => $error
                ],
                'Authentication Failed',
                500
            );
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:8|max:50'
        ]);

        if ($validator->fails()) {
            return ResponseFormatterApi::error(
                ['message' => $validator->errors()],
                'Invalid Data',
                422
            );
        }
        try {
            $mahasiswa = User::create([
                'name' => ucwords(strtolower($request->name)),
                'user_code' => null,
                'email' => strtolower($request->email),
                'password' => bcrypt($request->password),
            ]);

            $mahasiswa->assignRole('mahasiswa');

            // assign mahasiswa to student
            $mahasiswa->student()->create([
                'study_program_id' => 1,
                'user_id' => $mahasiswa->id,
            ]);

            $tokenResult = $mahasiswa->createToken('authToken')->plainTextToken;

            return ResponseFormatterApi::success(
                [
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $mahasiswa
                ],
                'User Registered'
            );
        } catch (Exception $error) {
            return ResponseFormatterApi::error(
                [
                    'message' => 'Something Went Wrong',
                    'error' => $error
                ],
                500
            );
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatterApi::success(
            $token,
            'Success Logout'
        );
    }

    public function fetch(Request $request)
    {

        $data_user = User::with('student')->where('id', '=', $request->user()->id)->get();
        return ResponseFormatterApi::success(
            UserFetchResource::collection($data_user),
            'The profile data has been successfully retrieved'
        );
    }
}
