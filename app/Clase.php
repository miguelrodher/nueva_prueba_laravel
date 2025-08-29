<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $primaryKey = 'id_clase';

    protected $fillable = 
    [
        'clase'
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_clase', 'id_clase');
    }
}
