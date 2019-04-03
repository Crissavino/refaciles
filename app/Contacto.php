<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Contacto extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombreContacto', 'emailContacto', 'paisContacto', 'mensajeContacto'];

    protected $dates = ['created_at', 'deleted_at', 'updated_at', 'done_at'];
}
