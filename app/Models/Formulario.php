<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;

    protected $fillable = ['nombres', 'apellidos', 'email', 'numero', 'evento_id'];

    // Relación con el modelo Evento
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}