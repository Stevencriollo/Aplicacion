<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrera
 *
 * @property $id
 * @property $nombrecarrera
 * @property $estado
 * @property $facultad
 * @property $created_at
 * @property $updated_at
 * @property $usuariomodifica
 *
 * @property Empleadocarrera[] $empleadocarreras
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Carrera extends Model
{
    
    static $rules = [
		'estado' => '',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombrecarrera','estado','facultad','usuariomodifica'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleadocarreras()
    {
        return $this->hasMany('App\Models\Empleadocarrera', 'carrera_id', 'id');
    }
    

}
