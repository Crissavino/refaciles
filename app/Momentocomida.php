<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Momentocomida extends Model
{
    public function getNombre()
    {
    	return $this->nombre;
    }

    public function getId()
    {
    	return $this->id;
    }

    public function recipes()
    {
    	return $this->belongsToMany('\App\Recipe');
    }
}
