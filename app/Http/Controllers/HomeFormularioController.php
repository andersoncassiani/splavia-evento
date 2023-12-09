<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class HomeFormularioController extends Controller
{
    public function index($id){
        $evento = Evento::find($id);
    
        return view('layouts.formulario', compact('evento'));

    }


    
}
