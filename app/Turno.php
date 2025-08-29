<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $primaryKey = 'id_turno';

    protected $fillable = 
    [
        'turno'
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_turno', 'id_turno');
    }
}
