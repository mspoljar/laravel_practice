<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $session=$request->session()->all();
        return view('session',['session'=>$session]);
    }
}
