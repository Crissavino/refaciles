<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instruccion extends Model
{

	use SoftDeletes;

	protected $fillable = ['recipe_id', 'numeroInstruccion', 'instruccion'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
