<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VehiculeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('vehicules', function (Blueprint $table) {
            $table->id(); 
            $table->string('file')->nullable();
            $table->string('fileduc')->nullable();
            $table->string('filemine')->nullable();
            $table->string('fileimpot')->nullable();
            $table->string('type')->nullable();
            $table->integer('puissances')->nullable();
            $table->string('essence')->nullable();
            $table->string('numerocartegrise')->nullable();
            $table->integer('fk_client_id')->nullable();
            $table->integer('fk_marque_id')->nullable();
            $table->integer('fk_modele_id')->nullable();
            $table->integer('douane')->nullable();
            $table->integer('duc')->nullable();
            $table->integer('mine')->nullable();
            $table->integer('impot')->nullable();
            $table->integer('fk_user_id');
            $table->integer('fk_up_id')->nullable();
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
        Schema::dropIfExists('vehicules');
    }
}
