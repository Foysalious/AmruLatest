<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Socialite\Facades\Socialite;


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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'dashboard/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if( Gate::denies('customer') ){
            return back();
        }
        $this->middleware('guest')->except('logout');
    }

    public function loginCustomer(Request $request){


        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user = User::where('email', $request->email)->first();
        if(!$user){
            $request->session()->flash('login', 'Please enter correct information!');
            return redirect()->route('customerlogin'); 
        }


        if($user->hasRoles('customer')){
            $credentials = $request->only('email', 'password');
            if(Auth::attempt($credentials, $request->remember)){
                return redirect()->route('index');
            }else{
            
                $request->session()->flash('login', 'Please enter correct information!');
                return redirect()->route('customerlogin');
            }
        }else{
            
            $request->session()->flash('login', 'Please enter correct information!');
            return redirect()->route('customerlogin');
        }

        

    }

    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        dd($user);


        // $user->token;
    }

    
}
