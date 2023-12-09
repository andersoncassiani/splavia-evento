<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){
        return view('splavia.index');

    }

    public function create(){
        return"este es tu contantos";
    }

    public function show($curso){
        return"bienvenido al curso $curso";
    }
}
