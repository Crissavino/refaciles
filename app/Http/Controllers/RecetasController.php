<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class RecetasController extends Controller
{
    public function show($id)
    {
        $usuario = \App\User::all();
    	$receta = \App\Recipe::find($id);
    	$ingredientes = DB::table('ingredientes')
											->WHERE('recipe_id', '=', $id)
											->get();
    	$instrucciones = DB::table('instruccions')
											->WHERE('recipe_id', '=', $id)
											->get();
        $numeroComentarios = DB::table('comments')
                                            ->WHERE('recipe_id', '=', $id)
                                            ->ORDERBY('created_at', 'des')
                                            ->get();
        $numeroComentarios = count($numeroComentarios) ;
                                             
        $comentarios =  \App\Comment::all();    
                                   
    	$dificultads =  \App\Dificultad::all();   

    	return view('recetas', ['receta' => $receta,
					    		'ingredientes' => $ingredientes,
                                'instrucciones' => $instrucciones,
                                'comentarios' => $comentarios,
                                'usuario' => $usuario,
					    		'numeroComentarios' => $numeroComentarios,
    							'dificultads' => $dificultads]);
    }
}
