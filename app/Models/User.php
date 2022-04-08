<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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


    public function user_role()
    {
        return $this->belongsTo('App\Models\UserRole', 'role');
    }

    public function user_permission()
    {
        $permission = $this->user_role->permission;
        $user_permissions = explode(',', $permission);

        $permissions = [];

        foreach ($user_permissions as $user_permission) {
            if ($user_permission == '1') {
                $permissions['1'] = __('Home');
            }
            if ($user_permission == '2') {
                $permissions['2'] = __('Contact Requests');
            }
            if ($user_permission == '3') {
                $permissions['3'] = __('Reservation Requests');
            }
            if ($user_permission == '4') {
                $permissions['4'] = __('Website Pages');
            }
            if ($user_permission == '5') {
                $permissions['5'] = __('Teamworks');
            }
            if ($user_permission == '6') {
                $permissions['6'] = __('Projects');
            }
            if ($user_permission == '7') {
                $permissions['7'] = __('Contact');
            }
            if ($user_permission == '8') {
                $permissions['8'] = __('Success Partners');
            }
            if ($user_permission == '9') {
                $permissions['9'] = __('System Users');
            }
            if ($user_permission == '10') {
                $permissions['10'] = __('Blog');
            }
            if ($user_permission == '11') {
                $permissions['11'] = __('Mails');
            }

        }

        return $permissions;

    }
}
