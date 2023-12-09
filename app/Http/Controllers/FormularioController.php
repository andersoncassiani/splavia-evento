<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario;
use App\Models\FormularioExpo;

class FormularioController extends Controller
{
    public function guardarformulario(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email',
            'numero' => 'required|numeric',
            'evento_id' => 'required|exists:eventos,id',
        ], [
            'nombres.required' => 'El nombre es obligatorio.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'numero.required' => 'El número de telefono es obligatorio.',
            'numero.numeric' => 'El número debe ser un valor numérico.',
            'evento_id.required' => 'El ID del evento es obligatorio.',
            'evento_id.exists' => 'El ID del evento no es válido.',
        ]);

        $formulario = new Formulario();
        $formulario->fill($request->all());
        $formulario->save();

        // Luego de guardar los datos, redirecciona o muestra una vista de confirmación
        return redirect()->back()->with('success', 'Usted se registró como público del evento.');
    }



    public function guardarFormularioExpo(Request $request, $evento_id)
    {
        
        $formulario = new FormularioExpo();
        $formulario->nombres = $request->input('nombres');
        $formulario->apellidos = $request->input('apellidos');
        $formulario->email = $request->input('email');
        $formulario->numero = $request->input('numero');
        $formulario->evento_id = $evento_id; // Usar el valor pasado como parámetro
        $formulario->save();

        // Luego de guardar los datos, redirecciona o muestra una vista de confirmación
        return redirect()->back()->with('success', 'Usted se registro como exponente del evento.');
    }

   

}