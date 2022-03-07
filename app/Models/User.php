<?php

namespace App\Models;

use App\Notifications\PasswordReset;
use App\Traits\UserTrait;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'is_root',
        'created_by',
        'last_login',
        'roles',
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
        'roles' => 'array',
        'pays' => 'array',
        'regions' => 'array',
        'departments' => 'array',
        'arrondissements' => 'array',
        'communes' => 'array',
        'centres' => 'array',
    ];


    public function created_user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
    public function user_role()
    {
        return $this->hasOne(Role::class, 'id', 'role');
    }
    public function sendPasswordResetNotification($token)
    {
        $data = [
            'token' => $token,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
        ];
        $this->notify(new PasswordReset($data));
    }
}
