<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
     * override login method for loggin with username.
     *
     * @return void
     */
    public function login(Request $request)
    {

        $credentials = $request->only(['username','password']);
        $remember=false;
        if($request->only(['remember'])=='on')
            {$remember= true;}

        // $credentials['password']=Hash::make($credentials['password']);
        if(Auth::attempt($credentials,$remember))
        {
            return redirect()->route('login_home');
        }else{
            return back()->with('error','Combinazione Username e Password errata');
        }

    }
}
