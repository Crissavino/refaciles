<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefacilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('imagen');
            // $table->integer('momentocomida_id')->unsigned();
            $table->integer('timpoPreparacion');
            $table->integer('timpoCoccion');
            $table->string('listaEn');
            $table->integer('dificultad_id')->unsigned();
            $table->string('portada');
            $table->text('breveDescripcion')->nullable();
            // $table->string('instrucciones');
            $table->text('descripcion')->nullable();
            // $table->integer('tag_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        // Schema::create('tags', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('nombre');
        //     $table->softDeletes();
        //     $table->timestamps();
        // });

        Schema::create('momentocomidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('dificultads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        // Schema::create('tag_recipe', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->integer('tag_id')->unsigned();
        //     $table->integer('recipe_id')->unsigned();
        //     $table->softDeletes();
        //     $table->timestamps();
        // });

        Schema::create('momentocomida_recipe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('momentocomida_id')->unsigned();
            $table->integer('recipe_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('ingredientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ingredienteYcantidad');
            $table->integer('recipe_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        // Schema::create('ingrediente_recipe', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('ingrediente_id')->unsigned();
        //     $table->integer('recipe_id')->unsigned();
        //     $table->softDeletes();
        //     $table->timestamps();
        // });

        Schema::create('instruccions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numeroInstruccion');
            $table->string('instruccion');
            $table->integer('recipe_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        // Schema::create('instruccions_recipe', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->integer('instruccion_id')->unsigned();
        //     $table->integer('recipe_id')->unsigned();
        //     $table->softDeletes();
        //     $table->timestamps();
        // });
        
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('body');
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('contactos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreContacto');
            $table->string('emailContacto');
            $table->string('paisContacto');
            $table->text('mensajeContacto');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
        Schema::dropIfExists('momentocomidas');
        Schema::dropIfExists('dificultads');
        Schema::dropIfExists('momentocomida_recipe');
        Schema::dropIfExists('ingredientes');
        Schema::dropIfExists('ingrediente_recipe');
        Schema::dropIfExists('instruccions');
        Schema::dropIfExists('instruccions_recipe');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('contactos');
    }
}
