<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function create()
    {
        return view('registro.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        toastr()->success('Usuário cadastrado com sucesso!');
        return redirect()->route('entrar');
    }
}
