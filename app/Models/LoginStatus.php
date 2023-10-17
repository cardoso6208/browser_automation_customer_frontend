<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginStatus extends Model
{
    public const LOGIN_SUCCESS = '1';
    public const LOGIN_FAILD = '2';
    public const LOGOUT = '3';

    protected $table = 'login_status';
    protected $fillable = [
        'name',
        'display_name',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    // public function users()
    // {
    //     return $this->hasMany('App\Models\User', 'status', 'id');
    // }
}
