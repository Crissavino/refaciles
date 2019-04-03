<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show()
    {
    	$recetas = \App\Recipe::latest()
                                ->take(12)
                                ->get();
    	$dificultads = \App\Dificultad::all();

    	// $cover = $recetas->cover;

    	// dd($cover);

    	// $img = Image::make($pathCover)->resize(200,222);

    	return view('index', ['recetas' => $recetas,
    						  'dificultads' => $dificultads]);
    }

}
