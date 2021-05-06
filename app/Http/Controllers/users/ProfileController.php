<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile($username)
    {
        
        if(User::where('username', $username)->firstOrFail())
        {
            $user = User::select('id','username','first_name','last_name','email','about','gender','role','avatar','is_verified','created_at')
            ->where('username' , $username)->first();
            
            return view('users.profile')->with('user',$user);

        }

        else{
            abort(404);
        }

        
    }
}
