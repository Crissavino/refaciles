<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dificultad extends Model
{
    public function getNombre()
    {
    	return $this->nombre;
    }

    public function getId()
    {
    	return $this->id;
    }
}
