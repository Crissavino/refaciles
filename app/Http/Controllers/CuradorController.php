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

    	request()->validate(
    		[	
				// 'titulo' => 'required',
				// 'imagen' => 'required|file|mimes:jpeg,jpg,png',
				// 'momentocomida_id' => 'required',
				// 'timpoPreparacion' => 'required',
				// 'timpoCoccion' => 'required',
				// 'listaEn' => 'required',
				// 'dificultad_id' => 'required',
				'portada' => 'required|file|mimes:jpeg,jpg,png|max:6000',
				// 'breveDescripcion' => 'required',
				// 'descripcion' => 'required',
    		],
    		[
    			// 'titulo.required' => 'Tenes que ponerle un título a la receta!',
    			// 'imagen.required' => 'Tenes que agregarle una foto a la receta!',
				// 'imagen.mimes' => 'Solo son válidas las extensiones .jpeg, .jpg o .png!',
				// 'momentocomida_id.required' => 'Tenes que especificar si es para el almuerzo, cena, desayuno, etc!',
				// 'timpoPreparacion.required' => 'Tenes que decir cuanto tiempo, aproximado, se demora en preparar la receta!',
				// 'timpoCoccion.required' => 'Tenes que decir cuanto tiempo, aproximado, se demora en cocinar la receta!',
				// 'listaEn.required' => 'Tenes que decir cuanto tiempo, aproximado, esta lista la receta!',
				// 'dificultad_id.required' => 'Tenes que seleccionar un nivel de dificultad!',
				'portada.required' => 'Tenes que poner una foto de portada para la receta!',
				'portada.mimes' => 'Solo son válidas las extensiones .jpeg, .jpg o .png!',
				// 'breveDescripcion.required' => 'Tenes que describir brevemente algunos beneficios o porque hacer esta receta!',
				// 'descripcion.required' => 'Tenes que contar como hacer la receta!',
    		]);


    	$data = request()->all();

        if (isset($data['portada'])) {

                $nombreArchivoCliente = pathinfo(request()->file('portada')->getClientOriginalName(), PATHINFO_FILENAME);

                $portada = $nombreArchivoCliente.'.'.request()->file('portada')->extension();

                $pathPortada = request()->file('portada')->storeAs('public/images/covers', $portada);

                $pathPortada = str_replace('public', 'storage', $pathPortada);

                $data['portada'] = $pathPortada;

        }

        if (isset($data['imagen'])) {

                $nombreArchivoCliente = pathinfo(request()->file('imagen')->getClientOriginalName(), PATHINFO_FILENAME);

                $image = $nombreArchivoCliente.'.'.request()->file('imagen')->extension();

                $pathImage = request()->file('imagen')->storeAs('public/images/image', $image);

                $pathImage = str_replace('public', 'storage', $pathImage);

                $data['imagen'] = $pathImage;

        }

		$guardoReceta = \App\Recipe::create($data);

		$idUltimaReceta = $guardoReceta->id;

		$receta = \App\Recipe::find($idUltimaReceta);

		$guardoMomentoComida = $receta->momentocomidas()->sync($data['momentocomida_id']);

        $ingredientesYcantidades = $data['ingredienteYcantidad'];

        if (isset($ingredientesYcantidades[0])) {
            foreach ($ingredientesYcantidades as $ingredienteYcantidad) {
                $guardoIngredienteYcantidad = \App\Ingrediente::create(['ingredienteYcantidad' => $ingredienteYcantidad, 'recipe_id' => $idUltimaReceta]);
            }
        }

        $numeroInstrucciones = $data['numeroInstruccion'];
        $instrucciones = $data['instruccion'];

        $cantidadInstrucciones = count($instrucciones);

        if (isset($numeroInstrucciones[0])) {
            for ($i=0; $i < $cantidadInstrucciones; $i++) { 
                $datosInstrucciones = ['recipe_id' => $idUltimaReceta, 'numeroInstruccion' => $numeroInstrucciones[$i], 'instruccion' => $instrucciones[$i]];
                $guardoInstrucciones = \App\Instruccion::create($datosInstrucciones);
            }
        }
        // dd('se guardo');
    	return redirect('index');
    }



    public function show()
    {
        $recetas = DB::table('recipes')
                                    ->ORDERBY('updated_at', 'desc')
                                    ->get();

        return view('recetasTodas', ['recetas' => $recetas]);
    }

    public function edit($id)
    {
        $receta = \App\Recipe::find($id);
        $tipoDificultad = \App\Dificultad::all();
        $momentosComidas = \App\Momentocomida::all();
        $ingredientes = \App\Ingrediente::all();
        $instrucciones = \App\Instruccion::all();

        return view('curador_edicion', ['receta' => $receta,
                                        'momentosComidas' => $momentosComidas,
                                        'ingredientes' => $ingredientes,
                                        'instrucciones' => $instrucciones,
                                        'tipoDificultad' => $tipoDificultad]);
    }

    public function update($id)
    {
        $receta = \App\Recipe::find($id);

        request()->validate(
            [   
                // 'titulo' => 'required',
                // 'imagen' => 'required|file|mimes:jpeg,jpg,png',
                // 'momentocomida_id' => 'required',
                // 'timpoPreparacion' => 'required',
                // 'timpoCoccion' => 'required',
                // 'listaEn' => 'required',
                // 'dificultad_id' => 'required',
                // // 'portada' => 'required|file|mimes:jpeg,jpg,png',
                // 'breveDescripcion' => 'required',
                // 'descripcion' => 'required',
            ],
            [
                // 'titulo.required' => 'Tenes que ponerle un título a la receta!',
                // // 'imagen.required' => 'Tenes que agregarle una foto a la receta!',
                // // 'imagen.mimes' => 'Solo son válidas las extensiones .jpeg, .jpg o .png!',
                // 'momentocomida_id.required' => 'Tenes que especificar si es para el almuerzo, cena, desayuno, etc!',
                // 'timpoPreparacion.required' => 'Tenes que decir cuanto tiempo, aproximado, se demora en preparar la receta!',
                // 'timpoCoccion.required' => 'Tenes que decir cuanto tiempo, aproximado, se demora en cocinar la receta!',
                // 'listaEn.required' => 'Tenes que decir cuanto tiempo, aproximado, esta lista la receta!',
                // 'dificultad_id.required' => 'Tenes que seleccionar un nivel de dificultad!',
                // // 'portada.required' => 'Tenes que poner una foto de portada para la receta!',
                // // 'portada.mimes' => 'Solo son válidas las extensiones .jpeg, .jpg o .png!',
                // 'breveDescripcion.required' => 'Tenes que describir brevemente algunos beneficios o porque hacer esta receta!',
                // 'descripcion.required' => 'Tenes que contar como hacer la receta!',
            ]);

        $data = request()->all();

        if (isset($data['portada'])) {
            $cover = str_slug($data['titulo']);
            $cover .= '-cover';
            $cover = $cover.'.'.request()->file('portada')->extension();
            $pathCover = request()->file('portada')->storeAs('public/images/covers', $cover);
            $pathCover = str_replace('public', 'storage', $pathCover);
            $data['portada'] = $pathCover;
        }

        if (isset($data['imagen'])) {
            $image = str_slug($data['titulo']);
            $image .= '-image';
            $image = $image.'.'.request()->file('imagen')->extension();
            $pathImage = request()->file('imagen')->storeAs('public/images/image', $image);
            $pathImage = str_replace('public', 'storage', $pathImage);
            $data['imagen'] = $pathImage;
        }

        $receta->update($data);

        $guardoMomentoComida = $receta->momentocomidas()->sync($data['momentocomida_id']);

        $ingredientes = $receta->ingredientes;
        $ingredienteYcantidadDatosActualizado = $data['ingredienteYcantidad'];

        if (isset($ingredienteYcantidadDatosActualizado[0])) {
            if(count($ingredienteYcantidadDatosActualizado) === count($receta->ingredientes)) {
                for ($i=0; $i < count($receta->ingredientes); $i++) { 
                    $ingredientes[$i]->update(['ingredienteYcantidad' => $ingredienteYcantidadDatosActualizado[$i], 'recipe_id' => $id]);
                }
            }elseif (count($ingredienteYcantidadDatosActualizado) <= count($receta->ingredientes)) {
                for ($i=0; $i < count($receta->ingredientes); $i++) { 
                    // dd($ingredientes[2]);
                    if (isset($ingredientes[$i])) {
                       var_dump('entro');
                       $ingredientes[$i]->update(['ingredienteYcantidad' => $ingredienteYcantidadDatosActualizado[$i], 'recipe_id' => $id]);
                    }
                    
                }
                dd('Hasta aca');
            }else{
                $a = 0;
                do {
                    for ($i=0; $i < count($receta->ingredientes); $i++) { 
                        $ingredientes[$i]->update(['ingredienteYcantidad' => $ingredienteYcantidadDatosActualizado[$i], 'recipe_id' => $id]);
                    }
                    $a++;
                } while ($a < count($receta->ingredientes));
                for ($i=count($receta->ingredientes); $i < count($ingredienteYcantidadDatosActualizado); $i++) { 
                    $guardoingredienteYcantidadDatosActualizadoNuevo = \App\FormF\Ingrediente::create(['ingredienteYcantidad' => $ingredienteYcantidadDatosActualizado[$i], 'recipe_id' => $id]);
                }
            }
        }


        $instrucciones = $receta->instruccions;
        $numeroInstruciconesDatosActualizado = $data['numeroInstruccion'];
        $instruccionesDatosActualizado = $data['instruccion'];

        if (isset($numeroInstruciconesDatosActualizado[0])) {
            if(count($numeroInstruciconesDatosActualizado) === count($receta->instruccions)) {
                for ($i=0; $i < count($receta->instruccions); $i++) { 
                    $instrucciones[$i]->update(['numeroInstruccion' => $numeroInstruciconesDatosActualizado[$i], 'instruccion' => $instruccionesDatosActualizado[$i], 'recipe_id' => $id]);
                }
            }else{
                $a = 0;
                do {
                    for ($i=0; $i < count($receta->instruccions); $i++) { 
                        $instrucciones[$i]->update(['numeroInstruccion' => $numeroInstruciconesDatosActualizado[$i], 'instruccion' => $instruccionesDatosActualizado[$i], 'recipe_id' => $id]);
                    }
                    $a++;
                } while ($a < count($receta->instruccions));
                for ($i=count($receta->instruccions); $i < count($numeroInstruciconesDatosActualizado); $i++) { 
                    $guardonumeroInstruciconesDatosActualizadoNuevo = \App\FormF\Instruccion::create(['numeroInstruccion' => $numeroInstruciconesDatosActualizado[$i], 'instruccion' => $instruccionesDatosActualizado[$i], 'recipe_id' => $id]);
                }
            }
        }






        // foreach ($data['ingredienteYcantidad'] as $ingrediente) {
            
        //     $datosIngredientes = ['recipe_id' => $id, 'ingredienteYcantidad' => $ingrediente];

        //     $guardoIngrediente = \App\Ingrediente::update($datosIngredientes);
        // }

        // $numeroInstrucicones = $data['numeroInstruccion'];
        // $instrucciones = $data['instruccion'];
        // // dd($instrucciones[0]);
        // $cantidadInstrucciones = count($instrucciones);

        // for ($i=0; $i < $cantidadInstrucciones; $i++) { 
            
        //     $datosInstrucciones = ['recipe_id' => $id, 'numeroInstruccion' => $numeroInstrucicones[$i], 'instruccion' => $instrucciones[$i]];
            
        //     $guardoInstrucciones = \App\Instruccion::update($datosInstrucciones);
        // }

        return redirect('index');
    }

    public function destroy($id)
    {
        $recetas = \App\Recipe::find($id);

        $recetas->delete();

        session()->flash('message', 'La receta se eliminó con éxito.');

        return redirect('recetasTodas');
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
                'ingredienteYcantidad' => 'required',
                // 'cantidad' => 'required'
            ],
            [
                'recipe_id.required' => 'Debes seleccionar una receta a la que agregarle ingredientes',
                'ingredienteYcantidad.required' => 'Tenes que ingresar un ingrediente',
                // 'cantidad.required' => 'Tenes que ingresar la cantidad necesaria de este ingrediente'
            ]);

        $datos = request()->all();
        dd($datos);

        $guardoIngrediente = \App\Ingrediente::create($datos);

        return redirect('curador/ingredientes');
    }

    public function createInstrucciones()
    {
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
