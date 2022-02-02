<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordResets;
use App\Http\Controllers\MailController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ResetController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.passwords.reset');
    }


    public function resetPass(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
       // dd( $user);
        if ($user) {
            $OldPasswordResets = PasswordResets::where('email', $request->email)->first();
            if (!$OldPasswordResets) {
                $PasswordResets = new PasswordResets;
                $PasswordResets->email = $request->email;
                $PasswordResets->token = sha1(random_bytes(20).env('APP_SECRET'));
                $PasswordResets->timestamps = false;
                $PasswordResets->created_at = now();
                $PasswordResets->save();


                MailController::sendResetPassEmail($user->first_name, $user->last_name, $user->email, $PasswordResets->token);
                
                return redirect()->route('login')->with(session()->flash('alert-success', 'An email has been sent to reset the password'));
            } else {

                $to = $OldPasswordResets->created_at;

                $from = now();

                $diff_in_Hours = $to->diffInHours($from);

                

                if($diff_in_Hours >= 24)
                {
                    
                    PasswordResets::where('email', $request->email)->delete();
                   // $OldPasswordResets->delete();
                    $PasswordResets = new PasswordResets;
                $PasswordResets->email = $request->email;
                $PasswordResets->token = sha1(random_bytes(20).env('APP_SECRET'));
                $PasswordResets->timestamps = false;
                $PasswordResets->created_at = now();
                $PasswordResets->save();


                MailController::sendResetPassEmail($user->first_name, $user->last_name, $user->email, $PasswordResets->token);
                return redirect()->route('login')->with(session()->flash('alert-success', 'An email has been sent to reset the password'));

                }
                else{
                return back()->with(session()->flash('alert-danger', 'An email has already been sent to you, check your spam box'));
                }
            }
        } else {


            return back()->with(session()->flash('alert-danger', 'There is no user with this email'));
        }
    }


    public function checkcode(Request $request)
    {
        
        if($request->has('code')) {
            $PasswordResets_token = \Illuminate\Support\Facades\Request::get('code');
        $user = PasswordResets::where(['token' => $PasswordResets_token])->first();
      

        if($user){
            
            $to = $user->created_at;

                $from = now();

                $diff_in_Hours = $to->diffInHours($from);

                if($diff_in_Hours < 24)
                {
                    return view('auth.passwords.confirm')
                    ->with('token', $PasswordResets_token);
                    
                }
                else{
                    return redirect()->route('login')->with(session()->flash('alert-danger', 'The password recovery link has expired'));
                }
        }
        else{
        return redirect()->route('login')->with('alert-danger', 'Invalid verification code!');
        }
        }
        else
        {
            return redirect()->route('login');
        }
        

    }

    public function resetcode(Request $request){

        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'token' => ['required']
        ]);

        $userreset = PasswordResets::where(['token' => $request->token])->first();

        if( $userreset)
        {

            $user = User::where(['email' => $userreset->email])->first();

            if($user)
            {
               if( Hash::check($request->password, $user->password))
               {
                return back()->with(session()->flash('alert-danger', 'The password cannot be same previous one'));
               }
               else
               {

                $user->password = Hash::make($request->password);
                PasswordResets::where(['token' => $request->token])->delete();
                $user->save();
                return redirect()->route('login')->with(session()->flash('alert-success', 'Password changed successfully'));

               }


            }
            else{
                return back()->with(session()->flash('alert-danger', 'Something went wrong!'));
            }

            

        }
        else
        {
            return back()->with(session()->flash('alert-danger', 'Something went wrong!'));
        }


    }
}
