<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginAttempt;
use App\Models\LoginStatus;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $ret_msg = $this->incrementLoginAttempts($request);

        $this->sendFailedLoginResponse($request, $ret_msg);
    }
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

        if($try_user){
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
