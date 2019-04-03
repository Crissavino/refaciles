<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Recipe extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo', 'imagen', 'timpoPreparacion', 'timpoCoccion', 'listaEn', 'dificultad_id', 'ingredientes', 'portada', 'breveDescripcion', 'instrucciones', 'descripcion'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function getId()
    {
    	return $this->id;
    }

    public function getTitulo()
    {
    	return $this->title;
    }

    public function getSubTitulo()
    {
    	return $this->subtitle;
    }

    public function getCover()
    {
    	return $this->cover;
    }

    public function getShortDesctiption()
    {
    	return $this->shorDesciption;
    }

    public function getDesctiption()
    {
    	return $this->description;
    }

    public function getImage()
    {
    	return $this->image;
    }

    public function momentocomidas()
    {
        return $this->belongsToMany('\App\Momentocomida');
    }

    // public function ingredientes()
    // {
    //     return $this->belongsToMany('\App\Ingrediente');
    // }

    public function instruccions()
    {
        return $this->belongsToMany('\App\Instruccion');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // public function agregarComentario($body, $recipeId)
    // {
    //     $this->comments()->create([

    //         'body' => $body,
            
    //         'recipe_id' => $recipeId,
            
    //         'user_id' => auth()->user()->id,
            
    //     ]);
    //     //es lo mismo
    //     // $this->comments()->create(compact('body'));
    // }

    // public function getTag()
    // {
    // 	return $this->tag_id;
    // }
}
