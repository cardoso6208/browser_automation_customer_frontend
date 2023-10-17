<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LoginAttempt extends Model
{
    public const LOGIN_SUCCESS = '1';
    public const LOGIN_FAILED = '2';
    public const LOGOUT = '3';

    // public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $perPage = 100;
    protected $fillable = [
        'email',
        'login_status_id',
        'time',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

}
