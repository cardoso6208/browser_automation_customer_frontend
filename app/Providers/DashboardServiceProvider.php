<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\LoginAttempt;
use App\Models\LoginStatus;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public static function getAccountEnabledCount()
    {
        return User::where('status_id', User::ENABLED)->count();
    }

    public static function getAccountWaitingEmailConfirmCount()
    {
        return User::where('status_id', User::WAITING_EMAIL_CONFIRM)->count();
    }
    public static function getAccountPasswordResetRequestCount()
    {
        return User::where('status_id', User::PASSWORD_RESET_REQUEST)->count();
    }
    public static function getAccountDisabledCount()
    {
        return User::where('status_id', User::DISABLED)->count();
    }

    public static function getLoginStatusUsersCount($minutes, $status){

        $current_time_stamp = time();
        //LOGIN_SUCCESS = '1';
        //LOGIN_FAILED = '2';
        //LOGOUT = '3';
        $count = 0;
        if($status == LoginAttempt::LOGIN_SUCCESS ){
            $count = LoginAttempt::where('login_status_id', LoginAttempt::LOGIN_SUCCESS)
            ->where('time','>', $current_time_stamp - 60 * $minutes)->count();
        } else if($status == LoginAttempt::LOGIN_FAILED ){
            $count = LoginAttempt::where('login_status_id', LoginAttempt::LOGIN_FAILED)
            ->where('time','>', $current_time_stamp - 60 * $minutes)->count();
        }
        return $count;
    }
}
