<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Clirol
 *
 * @property $id
 * @property $user_id
 * @property $role_id
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Role $role
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Clirol extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'role_id' => 'required',
		'estado' => '',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','role_id','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'role_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
