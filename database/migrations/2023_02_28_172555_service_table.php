<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('services', function (Blueprint $table) {
            $table->id(); 
            $table->string('libelleservice')->unique();
            // $table->string('chapitre')->nullable();
            // $table->string('categorie')->nullable();
            $table->string('codeserv')->unique();
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
        Schema::dropIfExists('services');
    }
}
