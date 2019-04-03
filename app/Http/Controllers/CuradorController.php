<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class CuradorController extends Controller
{
	public function create()
    {
    	$tipoDificultad = \App\Dificultad::all();
    	$momentosComidas = \App\Momentocomida::all();

    	return view('curador', ['tipoDificultad' => $tipoDificultad,
    							'momentosComidas' => $momentosComidas]);
    }


    public function insert()
    {
    	// $userId = auth()->user()->id;

    	request()->validate(
    		[	
				'titulo' => 'required',
				'imagen' => 'required|file|mimes:jpeg,jpg,png',
				'momentocomida_id' => 'required',
				'timpoPreparacion' => 'required',
				'timpoCoccion' => 'required',
				'listaEn' => 'required',
				'dificultad_id' => 'required',
				'portada' => 'required|file|mimes:jpeg,jpg,png',
				'breveDescripcion' => 'required',
				'descripcion' => 'required',
    		],
    		[
    			'titulo.required' => 'Tenes que ponerle un título a la receta!',
    			'imagen.required' => 'Tenes que agregarle una foto a la receta!',
				'imagen.mimes' => 'Solo son válidas las extensiones .jpeg, .jpg o .png!',
				'momentocomida_id.required' => 'Tenes que especificar si es para el almuerzo, cena, desayuno, etc!',
				'timpoPreparacion.required' => 'Tenes que decir cuanto tiempo, aproximado, se demora en preparar la receta!',
				'timpoCoccion.required' => 'Tenes que decir cuanto tiempo, aproximado, se demora en cocinar la receta!',
				'listaEn.required' => 'Tenes que decir cuanto tiempo, aproximado, esta lista la receta!',
				'dificultad_id.required' => 'Tenes que seleccionar un nivel de dificultad!',
				'portada.required' => 'Tenes que poner una foto de portada para la receta!',
				'portada.mimes' => 'Solo son válidas las extensiones .jpeg, .jpg o .png!',
				'breveDescripcion.required' => 'Tenes que describir brevemente algunos beneficios o porque hacer esta receta!',
				'descripcion.required' => 'Tenes que contar como hacer la receta!',
    		]);

    	$data = request()->all();
    	// $data['user_id'] = $userId;
        // dd($data);

		$cover = str_slug($data['titulo']);
		$cover .= '-cover';
		$cover = $cover.'.'.request()->file('portada')->extension();
		$pathCover = request()->file('portada')->storeAs('public/images/covers', $cover);
		$pathCover = str_replace('public', 'storage', $pathCover);
		$data['portada'] = $pathCover;

		$image = str_slug($data['titulo']);
		$image .= '-image';
		$image = $image.'.'.request()->file('imagen')->extension();
		$pathImage = request()->file('imagen')->storeAs('public/images/image', $image);
		$pathImage = str_replace('public', 'storage', $pathImage);
		$data['imagen'] = $pathImage;

		$guardoReceta = \App\Recipe::create($data);

		$idUltimaReceta = $guardoReceta->id;

		$receta = \App\Recipe::find($idUltimaReceta);

		$guardoMomentoComida = $receta->momentocomidas()->sync($data['momentocomida_id']);


    	return redirect('index');
    }

    public function createIngredientes()
    {
    	// $recetas = \App\Recipes::all();
    	$recetas = DB::table('recipes')
									// ->WHERE('user_id', '=', $userId)
									->ORDERBY('updated_at')
									->get();
        $ingredientes = DB::table('ingredientes')
                                    // ->WHERE('user_id', '=', $userId)
                                    ->ORDERBY('updated_at')
                                    ->get();

    	return view('ingredientes', ['recetas' => $recetas,
                                     'ingredientes' => $ingredientes]);
    }

    public function insertIngredientes()
    {
    	request()->validate(
    		[
    			'recipe_id' => 'required',
    			'ingrediente' => 'required',
    			'cantidad' => 'required'
    		],
    		[
    			'recipe_id.required' => 'Debes seleccionar una receta a la que agregarle ingredientes',
    			'ingrediente.required' => 'Tenes que ingresar un ingrediente',
    			'cantidad.required' => 'Tenes que ingresar la cantidad necesaria de este ingrediente'
    		]);

    	$datos = request()->all();

    	$guardoIngrediente = \App\Ingrediente::create($datos);

    	return redirect('curador/ingredientes');
    }

    public function createInstrucciones()
    {
    	// $recetas = \App\Recipes::all();
    	$recetas = DB::table('recipes')
									// ->WHERE('user_id', '=', $userId)
									->ORDERBY('updated_at')
									->get();
        $instrucciones = DB::table('instruccions')
                                    // ->WHERE('user_id', '=', $userId)
                                    ->ORDERBY('updated_at')
                                    ->get();

    	return view('instrucciones', ['recetas' => $recetas,
                                      'instrucciones' => $instrucciones]);
    }

    public function insertInstrucciones()
    {
    	request()->validate(
    		[
    			'recipe_id' => 'required',
    			'numeroInstruccion' => 'required',
    			'instruccion' => 'required'
    		],
    		[
    			'recipe_id.required' => 'Debes seleccionar una receta a la que agregarle ingredientes',
    			'numeroInstruccion.required' => 'Que numero de instruccion es?',
    			'instruccion.required' => 'Que instruccion queres dar?'
    		]);

    	$datos = request()->all();

    	// dd($datos);

    	$guardoInstruccion= \App\Instruccion::create($datos);

    	return redirect('curador/instrucciones');
    }
}
