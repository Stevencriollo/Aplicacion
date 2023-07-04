<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @property $id
 * @property $descripcion
 * @property $rol
 * @property $estado
 *
 * @property UsuariosRole[] $usuariosRoles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Role extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'rol' => 'required',
		'estado' => '',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','rol','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuariosRoles()
    {
        return $this->hasMany('App\Models\UsuariosRole', 'role_id', 'id');
    }
    

}
