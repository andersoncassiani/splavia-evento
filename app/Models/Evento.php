<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'lugar', 'fecha_hora', 'descripcion', 'imagen', 'creador_id',
    ];

    // Relación con el modelo Persona
    public function creador()
    {
        return $this->belongsTo(Persona::class, 'creador_id');
    }

        // Accesor para formatear la fecha y hora
        public function getFechaHoraAttribute($value)
        {
            // Formato ISO8601: 'Y-m-d\TH:i:s'
            return Carbon::parse($value)->format('d/m/Y H:i');
        }

}
