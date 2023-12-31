<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'direccion',
        'codigopostal',
        'telefono',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The validation rules for the model attributes.
     *
     * @var array<string, string>
     */

     //definicion de las variables estaticas para el ingreso desde el crud

    public static $rules = [
        'name' => 'required|string',
        'username' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string|min:8',
        'direccion' => 'required|string',
        'codigopostal' => 'required|string',
        'telefono' => 'required|string',
    ];

    //clave encriptada
    
    public function setPasswordAttribute(string $password){
        $this->attributes['password'] = bcrypt($password);
    }
}

