<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AuthServiceProvider extends ServiceProvider
{
    const ALPHABET = '0123456789ACDEFGHKMNPQRTVWXY';
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }

    /**
     * Function used to create an user
     * Used in the register function & installer process.
     *
     * @param $data
     * @return mixed
     */
    public static function createUser($data)
    {
        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'userid' => 'u'.time(),
            'password' => isset($data['password']) ? Hash::make($data['password']) : Hash::make("password"),
        ];
        if (isset($data['role_id'])) {
            $userData['role_id'] = $data['role_id'];
        }
        if (isset($data['email_verified_at'])) {
            $userData['email_verified_at'] = $data['email_verified_at'];
            $userData['status_id'] = User::ENABLED;
        } else{
            $userData['status_id'] = User::WAITING_EMAIL_CONFIRM;
        }

        if (isset($data['status_id'])) {
            $userData['status_id'] = $data['status_id'];
        } else{
            $userData['status_id'] = User::WAITING_EMAIL_CONFIRM;
        }
        $userData['date_last_password_set'] = Carbon::now()->toDateTimeString();

        $user = User::create($userData);
        try {
            $code = $user->id.self::generateReferralCode(5);
            $user->userid = $code;
            $user->save();
        } catch (\Exception $exception){

        }
        return $user;
    }

    /**
     * @param $length
     * @return string
     * @throws \Exception
     */
    public static function generateReferralCode($length, $prefix = null) {
        $code = '';
        // while (strlen($code) < $length || User::query()->where('referral_code', $code)->first() != null) {
        while (strlen($code) < $length) {
            $code .= substr(self::ALPHABET, (random_int(1, 28) - 1), 1);
        }

        if (!empty($prefix)) {
            $code = $prefix . $code;
        }

        return $code;
    }
}
