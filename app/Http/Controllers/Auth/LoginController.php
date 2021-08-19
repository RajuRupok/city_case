<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check() && Auth::user()->role == 'city_corporation') {
            $this->redirectTo = route('city_corporation.dashboard.index');

        } elseif (Auth::check() && Auth::user()->role == 'service_manager') {
            $this->redirectTo = route('service_manager.dashboard.index');

        } elseif (Auth::check() && Auth::user()->role == 'support_staff') {
            $this->redirectTo = route('support_staff.dashboard.index');

        } else {
            $this->redirectTo = route('citizen.profile.index');
        }
        $this->middleware('guest')->except('logout');

    }


    

    // After login where to go
    public function redirectAuth()
    {
        if (Auth::check() && Auth::user()->role == 'city_corporation') {
            $redirectTo = route('city_corporation.dashboard.index');

        } elseif (Auth::check() && Auth::user()->role == 'service_manager') {
            $redirectTo = route('service_manager.dashboard.index');

        } elseif (Auth::check() && Auth::user()->role == 'support_staff') {
            $redirectTo = route('support_staff.dashboard.index');

        } else {
            $redirectTo = route('citizen.profile.index');
        }

        $this->middleware('guest')->except('logout');
        return $redirectTo;
    }

    // Login with Mobile or email
    public function loginWithEmail(Request $request)
    {
        $this->validate($request, array(
            "email" => 'required|string|email|max:255',
            "password" => 'required|string'
        ));
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect($this->redirectAuth());
        }  else {
            toast('Some Problem to login!!!', 'error')->autoClose(2000)->timerProgressBar();
            return redirect()->route($this->redirectAuth());
        }
    }
}
