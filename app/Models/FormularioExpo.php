<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioExpo extends Model
{
    use HasFactory;
    protected $table = 'formularioexpos'; // Nombre correcto de la tabla en la base de datos
    protected $fillable = ['nombres', 'apellidos', 'email', 'numero', 'evento_id'];

    // Relación con el modelo Evento
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}

