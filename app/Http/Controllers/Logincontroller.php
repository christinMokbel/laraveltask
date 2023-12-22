<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Logincontroller extends Controller
{
    //session3
    public function login(){
        return view('login');
    }

    public function logged(){
        return view('logged');
    }
}
