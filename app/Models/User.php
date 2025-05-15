<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios'; 

    public $timestamps = false;

    // Llave primaria, si no es 'id' ajusta aquí
    protected $primaryKey = 'id'; 

    // Llave primaria auto-incremental
    public $incrementing = true;

    // Tipo de la llave primaria
    protected $keyType = 'int';

    protected $fillable = [
        'nombre',
        'apellido',
        'usuario',
        'email',
        'password',
    ];

    // Oculta estos campos al convertir el modelo a array o JSON
    protected $hidden = [
        'password',
    ];

    // Relación: un usuario tiene muchas notas
    public function notas()
    {
        return $this->hasMany(Nota::class, 'usuario_id', 'id');
    }

}
