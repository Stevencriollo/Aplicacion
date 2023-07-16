<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Periodo
 *
 * @property $id
 * @property $nombre
 * @property $fechainicio
 * @property $fechafin
 * @property $estado
 * @property $created_at
 * @property $updated_at
 * @property $usuariomodifica
 *
 * @property Empleadocarrera[] $empleadocarreras
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Periodo extends Model
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
    protected $fillable = ['nombre','fechainicio','fechafin','estado','usuariomodifica'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleadocarreras()
    {
        return $this->hasMany('App\Models\Empleadocarrera', 'periodo_id', 'id');
    }
    

}
