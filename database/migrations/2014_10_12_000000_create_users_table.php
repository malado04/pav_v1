<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); 
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('prenom')->nullable();
            $table->bigInteger('cni')->nullable();
            $table->string('genre')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->bigInteger('age')->nullable();
            $table->bigInteger('telfixe')->nullable();
            $table->bigInteger('telpor')->nullable();
            $table->string('ville')->nullable();
            $table->string('typemedcine')->nullable();
            $table->string('specialite')->nullable();
            $table->integer('valide')->nullable();
            $table->string('adresse')->nullable();
            $table->string('situa_matrim')->nullable();
            $table->integer('nmbr_epouse')->nullable();
            $table->integer('nmbr_enfant')->nullable();
            $table->string('nom_cntct')->nullable();
            $table->string('prenom_cntct')->nullable();
            $table->integer('tel_cntct')->nullable();
            $table->string('adresse_cntct')->nullable();
            $table->string('code_client')->nullable();
            $table->string('nationalite')->default('Sénégalaise');
            $table->string('email')->nullable();
            $table->string('email_pro')->nullable();
            $table->string('password');
            $table->bigInteger('admin')->nullable();
            $table->bigInteger('fk_user_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('fk_service_id')->nullable();
            $table->integer('fk_up_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');    
    }
}
