<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $primaryKey = 'id_grupo';

    protected $fillable = 
    [
        'id_clase', 
        'id_turno', 
        'id_semestre'
    ];

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'id_grupo', 'id_grupo');
    }

    public function clase()
    {
        return $this->belongsTo(Clase::class, 'id_clase', 'id_clase');
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class, 'id_turno', 'id_turno');
    }

    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'id_semestre', 'id_semestre');
    }
}
