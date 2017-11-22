<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showResetPasswordForm($email, $token){
        $user = User::where('email', $email)->first();
        if($user->user_activation ==null || $user->user_activation->token != $token){
            flash('Invalid activation code.Check your email and mobile phone for activation code. Or resend activation code')->error();
            return redirect()->route('auth.passwords.email');
        }
        return view('auth.passwords.reset', ['email' => $email, 'token' => $token]);
    }

}
