<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Persona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';
            $table->bigIncrements('idPersona')->unique();
            $table->unsignedBigInteger('idUser')->nullable();
            $table->unsignedBigInteger('idDistrito');
            $table->string('pNombre')->nullable();
            $table->string('sNombre')->nullable();
            $table->string('apPaterno')->nullable();
            $table->string('telefono')->nullable();
            $table->string('apMaterno')->nullable();
            $table->string('numeroDoc')->nullable();
            $table->string('tipoDoc')->nullable();
            $table->string('direccion')->nullable();
            $table->string('referencia')->nullable();
            $table->date('fecNac')->nullable();
            $table->dateTime('fecActualiza');
            $table->integer('usuActuali');
            $table->integer('usuReg');
            $table->timestamp('fecCreacion');
            $table->integer('estado')->default(1);
        }
        );
        Schema::table('persona', function ($table) {
            $table->foreign('idDistrito')->references('idDistrito')->on('distrito');
            $table->foreign('idUser')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
}
