<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerAuthController as BaseVoyagerAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\LoginAttempt;
use App\Models\LoginStatus;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;


class VoyagerAuthController extends BaseVoyagerAuthController
{
    //
    public function login()
    {
        if ($this->guard()->user()) {
            return redirect()->route('voyager.dashboard');
        }

        return view('voyager::login');
    }

    public function postLogin(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);

        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $ret_msg = $this->incrementLoginAttempts($request);

        $this->sendFailedLoginResponse($request, $ret_msg);    }

    function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            // 'last_login_ip' => $request->getClientIp()
        ]);
    }

    function incrementLoginAttempts(Request $request)
    {
        $email = $request->input('email');
        LoginAttempt::create(array(
            'email' => $email,
            'login_status_id' => LoginStatus::LOGIN_FAILD,
            'time' => time(),
        ));

        $ret_msg = "";
        $try_user = User::where('email', $email)->first();

        $total_available_attempts = 10;

        if($try_user && $try_user->role_id != 1){
            $last_success = LoginAttempt::where([
                'email'=> $email,
            ])
            ->where(function($query){
                $query->where('login_status_id', LoginStatus::LOGIN_SUCCESS)
                ->orWhere('login_status_id', LoginStatus::LOGOUT);
            })->orderBy('created_at','DESC')->first();

            if($last_success){
                $try_count = LoginAttempt::where(['email'=> $email,'login_status_id'=> LoginStatus::LOGIN_FAILD ])
                ->where('id', '>', $last_success->id)->count();
            }else{
                $try_count = LoginAttempt::where(['email'=> $email,'login_status_id'=> LoginStatus::LOGIN_FAILD ])
                ->count();
            }

            if($try_count >= $total_available_attempts){
                $try_user->status_id = User::DISABLED;
                $try_user->save();
                $ret_msg = "Your account has been locked! Please reset your password!";
            }else if($try_count > 0){
                $left_count = 10  - $try_count;
                $ret_msg = "Incorrect Password, ".$left_count." Attempts remaining!";
            }else{
                $ret_msg = "Incorrect Password!";
            }
        }

        $this->limiter()->hit(
            $this->throttleKey($request), $this->decayMinutes() * 60
        );
        
        return $ret_msg;
    }

    public function sendFailedLoginResponse(Request $request, $message = "")
    {
        throw ValidationException::withMessages([
            $this->username() => ($message ? $message : [trans('auth.failed')]),
        ]);
    }

    public function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        $email = $request->input('email');
        LoginAttempt::create(array(
            'email' => $email,
            'login_status_id' => LoginStatus::LOGIN_SUCCESS,
            'time' => time(),
        ));

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());
    }

    public function logout(Request $request)
    {
        LoginAttempt::create(array(
            'email' => $this->guard()->user()->email,
            'login_status_id' => LoginStatus::LOGOUT,
            'time' => time(),
        ));

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }    
}
