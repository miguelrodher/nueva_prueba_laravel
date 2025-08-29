<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $primaryKey = 'id_estudiante';

    protected $fillable = 
    [
        'nombre', 
        'apellido_paterno', 
        'apellido_materno', 
        'edad', 'email', 
        'telefono', 
        'id_grupo'
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo', 'id_grupo');
    }
}
