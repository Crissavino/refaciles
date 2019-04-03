<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingrediente extends Model
{
    use SoftDeletes;

	protected $fillable = ['recipe_id', 'cantidad','ingrediente'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    // public function recipes()
    // {
    // 	return $this->belongsToMany('\App\Recipe');
    // }
}
