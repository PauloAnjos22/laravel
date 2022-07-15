<?php

namespace App\Http\Controllers\Admin;

class HomeController
{
    public function index()
    {
        $user = \Auth::user()->name;
        $acesso = \Auth::user()->last_login_at;
        $acesso = date("d/m/Y H:i", strtotime($acesso));
        return view('home', ['nome' => $user, 'login' => $acesso]);
        
    }
}
