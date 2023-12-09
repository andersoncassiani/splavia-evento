<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Formulario;
use App\Models\FormularioExpo;

class EventoController extends Controller
{
    public function index()
    {
        // Obtener todos los eventos creados por el usuario actual (asumiendo que hay un usuario autenticado)
        $eventos = Evento::where('creador_id', auth()->id())->get();

        return view('events.verEventos', compact('eventos'));
    }
    
    public function showAllEvents(FormularioExpo $id)
{
    // Obtener todos los eventos de la base de datos
    $eventos = Evento::all();
    $expositores = FormularioExpo::all();
    foreach ($eventos as $evento) {
        // Convertir el formato de "Y-m-d H:i:s" a "Y-m-d\TH:i:s" para JavaScript
        $fechaHoraJavaScript = date("Y-m-d\TH:i:s", strtotime($evento->fecha_hora));
        $evento->fecha_hora_javascript = $fechaHoraJavaScript;
    }

    // Pasar los eventos a la vista y mostrarlos en una tabla
    return view('layouts.plantilla', compact('eventos'), ['expositores' => $expositores]);
}

    public function create()
    {
        // Mostrar el formulario de creación de eventos
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        // Validar la solicitud y guardar el evento en la base de datos
        $request->validate([
            'nombre' => 'required|string',
            'lugar' => 'required|string',
            'fecha_hora' => 'required|date_format:"d/m/Y H:i"',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Subir la imagen al servidor y obtener su nombre
        $imagenNombre = $request->file('imagen')->store('public/images'); // Almacenar la imagen en el directorio storage
        $imagenRuta = str_replace('public/', 'storage/', $imagenNombre); // Actualizar la ruta para almacenar en la base de datos
    
        // Crear el evento y guardar su información en la base de datos
        $evento = new Evento();
        $evento->nombre = $request->nombre;
        $evento->lugar = $request->lugar;
        $evento->fecha_hora = \Carbon\Carbon::createFromFormat('d/m/Y H:i', $request->fecha_hora);
        $evento->descripcion = $request->descripcion;
        $evento->imagen = $imagenRuta;
        $evento->creador_id = auth()->id();
        $evento->save();
    
        return redirect()->route('VerEventos')->with('success', 'El evento se ha creado correctamente.');
    }
    

    public function show($id)
    {
        // Mostrar la información de un evento específico
        $evento = Evento::findOrFail($id);

        return view('eventos.show', compact('evento'));
    }

    public function edit($id)
    {
        // Mostrar el formulario de edición para un evento específico
        $evento = Evento::findOrFail($id);

        return view('events.verUnSoloEvento', compact('evento'));
    }

    public function update(Request $request)
    {

        $evento = Evento::findOrFail($request->id);

        // Actualizar los campos del evento
        $evento->nombre = $request->nombre;
        $evento->lugar = $request->lugar;
        $evento->fecha_hora = \Carbon\Carbon::createFromFormat('d/m/Y H:i', $request->fecha_hora);
        $evento->descripcion = $request->descripcion;

        // Si se proporcionó una nueva imagen, guardarla en el servidor y actualizar el nombre en la base de datos
        if ($request->hasFile('imagen')) {
            $imagenNombre = $request->file('imagen')->getClientOriginalName(); // Nombre original del archivo
            $imagenRuta = $request->file('imagen')->storeAs('public/images', $imagenNombre); // Almacenar la imagen
            $evento->imagen = $imagenNombre;
        }

        $evento->save();

        return redirect()->route('VerEventos')->with('success', 'El evento se ha actualizado correctamente.');
    }

    public function destroy(Request $request)
    {
        // Borrar un evento específico de la base de datos
        $evento = Evento::findOrFail($request->id);
        $evento->delete();

        
        return redirect()->route('VerEventos')->with('success', 'El evento se ha eliminado correctamente.');
    }

    public function listarFormularios()
    {
            // Obtener los formularios relacionados al usuario logueado y cargar los eventos asociados
            $formularios = Formulario::with('evento')
            ->whereHas('evento', function ($query) {
                // Filtrar los formularios por el ID del creador (usuario logueado)
                $query->where('creador_id', auth()->id());
            })
            ->get();

        return view('splavia.index', compact('formularios'));
    }
    public function listarFormulariosExpo()
    {
            // Obtener los formularios relacionados al usuario logueado y cargar los eventos asociados
            $formularios = FormularioExpo::with('evento')
            ->whereHas('evento', function ($query) {
                // Filtrar los formularios por el ID del creador (usuario logueado)
                $query->where('creador_id', auth()->id());
            })
            ->get();

        return view('splavia.index2', compact('formularios'));
    }

    public function datosDelExponente($id) {
        
       $exponente = FormularioExpo::find($id);
    
        return view('events.exponente', compact('exponente'));
    }

    public function actualizarDatosDelExponente(Request $request, $id){

        $datosExpo = FormularioExpo::findOrFail($id);

        // Actualizar los camposdatosExpo
        $datosExpo->nombres = $request->nombres;
        $datosExpo->apellidos = $request->apellidos;
        $datosExpo->email = $request->email;
        $datosExpo->numero = $request->numero;
        $datosExpo->cargo = $request->cargo;
        $datosExpo->charla = $request->charla;
        $datosExpo->horario = \Carbon\Carbon::createFromFormat('d/m/Y H:i', $request->horario );
        $datosExpo->foto = $request->foto;

        

        // Si se proporcionó una nueva imagen, guardarla en el servidor y actualizar el nombre en la base de datos
        $imagenNombre = $request->file('foto')->store('public/images'); // Almacenar la imagen en el directorio storage
        $imagenRuta = str_replace('public/', 'storage/', $imagenNombre);

        $datosExpo->foto = $imagenRuta;
        $datosExpo->save();

        
        return redirect()->route('verExpo')->with('success', 'Los datos del exponente se han 
        actualizado correctamente.');
    
    }

    

}
