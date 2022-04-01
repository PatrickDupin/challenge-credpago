<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if (!Auth::attempt($request->only(['email', 'password']))) {
            if (empty(User::where('email', $request->email)->first())) {
                toastr()->info('Usuário não registrado.<br/>Faça seu cadastro!');
                return redirect()->route('registrar');
            }
            toastr()->error('Usuário e/ou senha incorretos!');
            return redirect()
                ->back();
        }

        $request->session()->put('user', Auth::user());
        toastr()->success('Usuário autenticado com sucesso!');
        return redirect()->route('inicio');
    }

    public function sair(Request $request)
    {
        Auth::logout();
        $request->session()->flush();

        return redirect('entrar');
    }
}
