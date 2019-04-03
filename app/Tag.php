<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function getId()
    {
    	return $this->id;
    }

    public function getNombre()
    {
    	return $this->nombre;
    }
}
