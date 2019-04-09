<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use Carbon\Carbon;

class CommentsController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }

    public function storeComment()
    {
        // $recipe = Recipe::findOrFail(request()->recipe_id);
 
        // Comment::create([
        //     'body' => request()->body,
        //     'user_id' => Auth::id(),
        //     'recipe_id' => $recipe->id
        // ]);
    	request()->validate(

	    	[
	            'body' => 'required|min:5|max:1000',
	        ],

	        [
	            'body.required' => 'Escribí tu comentario.',
	            'body.min' => 'Tenés que escribir mas de 5 caracteres.',
	            'body.max' => 'El comentario es demasiado largo, podes contactarnos por mail por cualquier duda que tengas y te la respondemos a la brevedad.',
	        ]
	    );

    	$data = request()->all();
    	$body = $data['body'];
    	$recetaIdString = $data['recipe_id'];
    	$data['recipe_id'] = (int)$recetaIdString;
    	$data['user_id'] = auth()->user()->id;
    	// $datos = ['body', 'recipe_id'];

    	// dd($data);
    	$guardoComentario = Comment::create($data);

    	// dd($recipe->agregarComentario($body, $recetaId));

        return back();
	}

	public function editComment($id, $idComment)
	{
		$comentario = Comment::find($idComment);

		$data = request()->all();

		$body = ['body' => $data['bodyViejo']];

		$actualiar = $comentario->update($body);
		
		return back();
	}
	
	public function destroyComment($id, $idComment)
	{
		$comentario = Comment::find($idComment);

		$borrarComentario = $comentario->delete();
		
		return back();
	}
}
