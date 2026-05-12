<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';

    protected $fillable = [
        'Num_Control',
        'Nombre',
        'Primer_Ap',
        'Segundo_Ap',
        'Fecha_Nac',
        'Semestre',
        'Carrera'
    ];
}
