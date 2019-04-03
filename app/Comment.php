<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = ['body', 'user_id', 'recipe_id'];

    protected $dates = ['created_at', 'deleted_at', 'updated_at', 'done_at'];

    public function recipe()
    {
    	return $this->belongsTo('App\Recipe');
    }

    public function user()
  {
    return $this->belongsTo('App\User');
  }
}
