<?php

namespace App\Http\Controllers;

use App\Mail\SignupEmail;
use App\Mail\ResetPassEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSignupEmail($first_name,$last_name, $email, $verification_code){
        $data = [
            'name' => $first_name.' '.$last_name,
            'verification_code' => $verification_code
        ];
        
        Mail::to($email)->send(new SignupEmail($data));
    }

    public static function sendResetPassEmail($first_name,$last_name, $email, $PasswordResets_code){

        $data = [
            'name' => $first_name.' '.$last_name,
            'PasswordResets_code' => $PasswordResets_code
        ];

        Mail::to($email)->send(new ResetPassEmail($data));

    }
}