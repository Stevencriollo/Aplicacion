<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpleadoActividad extends Model
{
    protected $table = 'empleadoactividad'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'idEmpActivid'; // Nombre de la clave primaria en la tabla

    protected $fillable = [
        'idempleado',
        'nombreEmpleado',
        'actividad',
        'fechaInicio',
        'fechafin',
        'estado',
    ];

    
}