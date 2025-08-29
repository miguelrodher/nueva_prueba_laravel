<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $primaryKey = 'id_semestre';

    protected $fillable = 
    [
        'semestre'
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_semestre', 'id_semestre');
    }
}
