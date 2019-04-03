<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function show()
    {
    	return view('nosotros');
    }

    public function showContacto()
    {
    	return view('contacto');
    }

    public function insertContacto()
    {

    	request()->validate(
    		[

    			'nombreContacto' => 'required',
				'emailContacto' => 'required|email',
				'paisContacto' => 'required',
				'mensajeContacto' => 'required|min:10|max:1000',

    		],
    		[

    			'nombreContacto.required' => 'Por favor, decinos cual es tu nombre.',
				'emailContacto.required' => 'Por favor, dejanos tu mail asi nos podemos poner en contacto.',
				'paisContacto.required' => 'Por favor, decinos de donde nos estas escribiendo.',
				'mensajeContacto.required' => 'Por favor, escribí tu mensaje',
				'mensajeContacto.min' => 'Tenes que escribir un poco mas :P!',
				'mensajeContacto.max' => 'Solo podes escribir hasta 1000 caracteres, si te quedaste con ganas de decirnos algo este es nuestro mail: reefaciles@gmail.com',
    		]);

    	$data = request()->all();

    	$guardoContacto = \App\Contacto::create($data);

    	return redirect('index');
    }

    public function showReceta()
    {
    	$recetas = \App\Recipe::all();
		$dificultads = \App\Dificultad::all();
		$momentoComidas = \App\Momentocomida::all();

		return view('recetasNav', ['recetas' => $recetas,
							  'momentoComidas' => $momentoComidas,
    						  'dificultads' => $dificultads]);
    }


    public function insertReceta()
    {
    	# code...
    }

    

}
