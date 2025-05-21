<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = null;
    
    use HasFactory;

    protected $fillable = [
        'titulo',
        'contenido',
        'usuario_id',
        'categoria_id',
    ];

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con la categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function recordatorio()
    {
        return $this->hasOne(Recordatorio::class);
    }

    
}