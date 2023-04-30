<?php

namespace App\Http\Controllers;

use App\Models\CampusOrganization;
use App\Models\FacultyOrganization;
use App\Models\User;
use App\Models\UserAssociationOrganization;
use App\Models\UserCampusOrganization;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use ProtoneMedia\Splade\Facades\SEO;
use ProtoneMedia\Splade\Facades\Toast;

class AdminRegisterOptionController extends Controller
{

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // $user->status = 'registered';

        Auth::login($user);

        return redirect(auth()->user()->getRedirectRoute());
    }

    public function optionUserAdmin()
    {
        return view('auth.option-user-admin');
    }

    public function optionUserAdminCampusStore(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position' => 'required',
            'code_campus_organization' => 'required',
        ]);

        $logo = $request->file('logo');
        if ($request->hasFile('logo')) {
            $path = $logo->store('public/client-campus-logo');
            UserCampusOrganization::create([
                'user_id' => auth()->user()->id,
                'logo' => $path,
                'position' => ucwords(strtolower($request->position)),
                'campus_organization_code' => $request->code_campus_organization,
            ]);
        }

        $user = User::find(auth()->user()->id);
        // add role admin-pusat
        $user->assignRole('admin-pusat');
        Toast::success('Your registration has been successful, thank you for joining!')->backdrop()->autoDismiss(3);
        return to_route('admin.dashboard');
    }

    public function optionUserAdminAssociationStore(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position' => 'required',
            'code_faculty_organization' => 'required',
        ]);

        $logo = $request->file('logo');
        if ($request->hasFile('logo')) {
            $path = $logo->store('public/client-association-logo');
            UserAssociationOrganization::create([
                'user_id' => auth()->user()->id,
                'logo' => $path,
                'position' => ucwords(strtolower($request->position)),
                'faculty_organization_code' => $request->code_faculty_organization,
            ]);
        }

        $user = User::find(auth()->user()->id);
        // add role admin-himpunan
        $user->assignRole('admin-himpunan');
        Toast::success('Your registration has been successful, thank you for joining!')->backdrop()->autoDismiss(3);
        return to_route('admin.dashboard');
    }
}
