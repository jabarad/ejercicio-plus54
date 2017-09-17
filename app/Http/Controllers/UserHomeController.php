<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    /**
     * Show the User Section application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('userHome');
    }
}
