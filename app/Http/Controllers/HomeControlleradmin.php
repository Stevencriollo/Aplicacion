<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeControlleradmin extends Controller
{
    //

    public function index() 
    {
        return view('homeadmin.index');
    }
}
