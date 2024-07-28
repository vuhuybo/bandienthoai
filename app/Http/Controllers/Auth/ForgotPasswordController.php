<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\Carts;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(){
        $cart = Carts::where('id_user',1)->get();

        return view('auth.passwords.email',compact('cart'));
    }

    public function showLinkRequestForm(){
        $cart = Carts::where('id_user',1)->get();

        return view('auth.passwords.email',compact('cart'));
    }
}
