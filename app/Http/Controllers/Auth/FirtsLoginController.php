<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirtsLoginController extends Controller
{
    public function index() 
    {
        return view('login');
    }
}
