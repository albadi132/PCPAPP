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
            return view('users.profile');
        }
        else{
            abort(404);
        }

        
    }
}
