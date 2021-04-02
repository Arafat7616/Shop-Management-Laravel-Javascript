<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    //over write
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if($this->guard()->validate($this->credentials($request))) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
                Auth::user()->last_login_at = Carbon::now();
                Auth::user()->save();
                session()->flash('message', 'Login success.');
                session()->flash('type', 'success');
                 return redirect()->route('invoice.index');
            }  else {
                $this->incrementLoginAttempts($request);
                session()->flash('message', 'This account is not activated.');
                session()->flash('type', 'warning');
                return redirect()->back();
            }
        } else {
            $this->incrementLoginAttempts($request);
            session()->flash('message', 'Credentials do not match our database.');
            session()->flash('type', 'warning');
            return redirect()->back();
        }
    }
}
