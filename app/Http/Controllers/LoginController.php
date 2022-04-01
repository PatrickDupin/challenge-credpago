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
            toastr()->error('Usuário e/ou senha incorretos!');
            return redirect()
                ->back();
//                ->withErrors('Usuário e/ou senhas incorretos!');
        }

        $request->session()->put('user', Auth::user());
        return redirect()->route('inicio');
    }

    public function sair(Request $request)
    {
        Auth::logout();
        $request->session()->flush();

        return redirect('/entrar');
    }
}
