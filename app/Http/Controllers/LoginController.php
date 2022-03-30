<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function entrar(Request $request)
    {
        if (!Auth::attempt($request->only(['email','password']))) {
            return redirect()->back()->withErrors('Usuário e/ou enhas incorretos!');
        }

        return redirect()->route('/inicio');
    }

    public function sair()
    {
        Auth::logout();
        return redirect('/entrar');
    }
}
