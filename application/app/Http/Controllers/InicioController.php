<?php

namespace App\Http\Controllers;

class InicioController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
}
