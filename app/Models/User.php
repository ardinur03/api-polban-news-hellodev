<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_code',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // function assesor untuk mengubah format waktu
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function userCampusOrganization()
    {
        return $this->hasOne(UserCampusOrganization::class);
    }

    public function userAssociationOrganization()
    {
        return $this->hasOne(UserAssociationOrganization::class);
    }


    public function getRedirectRoute()
    {
        if ($this->hasRole('admin-pusat') | $this->hasRole('admin-himpunan')) {
            return RouteServiceProvider::HOME;
        } else if ($this->hasRole('super-admin')) {
            return RouteServiceProvider::HOME_SUPER_ADMIN;
        } else if ($this->hasRole('mahasiswa')) {
            Toast::title('INVALID!')->danger('Please log in using the Polban News mobile application!')->backdrop();
            return '/';
        } else {
            Toast::title('SUCCESS!')->info('Welcome to Poban News, please select your role at Polban campus!')->center()->backdrop();
            return RouteServiceProvider::OPTION_USER_ADMIN;
        }
    }
}
