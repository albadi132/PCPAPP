<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Verification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MailController;


class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.register');
    }






    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' =>[ 'required','string','unique:users','alpha_dash','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();
        $verification = new Verification();
        $verification->email = $request->email;
        $verification->token = sha1(time().env('APP_SECRET'));
        $verification->timestamps = false;
        $verification->created_at = now();
        $verification->save();


        if($user != null){
            MailController::sendSignupEmail($user->first_name ,$user->last_name, $user->email, $verification->token);
            //return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.'));
            return redirect()->route('verify')->with(session()->flash('alert-creat', 'Your account has been created. Please check email for verification link.'));

        }

        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
    }


}
