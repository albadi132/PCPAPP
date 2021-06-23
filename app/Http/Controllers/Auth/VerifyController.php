<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Verification;

class VerifyController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }


    public function index(Request $request)
    {
        if ( session()->has('alert-creat') || session()->has('alert-success') || session()->has('alert-danger') ) {
            return view('auth.verify');
        } elseif( $request->has('code') ) {
            $token = \Illuminate\Support\Facades\Request::get('code');
            $verification = Verification::where(['token' => $token])->first();
            if($verification != null){
                $user = User::where(['email' => $verification->email])->first();
                if ($user != null) {
                    $user->is_verified = 1;
                    $user->status = 1;
                    $user->email_verified_at = now();
                    $user->save();

                    return redirect()->route('verify')->with('alert-success', 'Your account is verified. Please login!');
                }
                return redirect()->route('verify')->with('alert-danger', 'Something went wrong');
            }
            return redirect()->route('verify')->with('alert-danger', 'Invalid verification code!');
        } else {
            return redirect()->route('login');
        }
    }
}
