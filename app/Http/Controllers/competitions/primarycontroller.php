<?php

namespace App\Http\Controllers\competitions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class primarycontroller extends Controller
{
    public function competitions()
    {
        
        return view('competitions.view');
        
    }

}
