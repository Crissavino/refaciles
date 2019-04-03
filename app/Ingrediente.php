<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingrediente extends Model
{
    use SoftDeletes;

	protected $fillable = ['recipe_id', 'recipe_id','ingredienteYcantidad'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
