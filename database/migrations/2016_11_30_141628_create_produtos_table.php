<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('categorias_id')->unsigned();                      
            $table->string('nome');
            $table->string('valor');
            $table->timestamps();
        });

        Schema::table('produtos', function (Blueprint $table){
            $table->foreign('categorias_id')->references('id')->on('categorias');    
           
        });
        Schema::table('produtos', function ($table) {
            $table->integer('marcas_id')->unsigned();
            $table->foreign('marcas_id')->references('id')->on('marcas');
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
