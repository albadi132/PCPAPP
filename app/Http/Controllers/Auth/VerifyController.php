<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerifyController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    
    public function index(Request $request)
    {
        if(session()->has('alert-creat') || session()->has('alert-success') || session()->has('alert-danger'))
        {
            return view('auth.verify');
        }
        elseif($request->has('code')) {
            $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where(['verification_code' => $verification_code])->first();
        if($user != null){
            $user->is_verified = 1;
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route('verify')->with('alert-success', 'Your account is verified. Please login!');
           
        }

        return redirect()->route('verify')->with('alert-danger', 'Invalid verification code!');
        }
        else
        {
            return redirect()->route('login');
        }
  
    }
}
