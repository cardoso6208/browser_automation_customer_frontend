<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
{
    public const WAITING_EMAIL_CONFIRM = '1';
    public const PASSWORD_RESET_REQUEST = '2';
    public const ENABLED = '3';
    public const DISABLED = '4';
    use HasApiTokens, HasFactory, Notifiable;
    protected $perPage = 100;

    public function __construct( array $attributes = []){
        parent::__construct($attributes);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'userid',
        'password',
        'status_id',
        'last_login_at',
        'date_last_password_set',
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

    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
            'status_id' => 3
        ])->save();
    }

    // public function status(){
    //     return $this->hasOne('App\Model\UserStatus');
    // }
}
