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
        /*Schema::create('persona', function (Blueprint $table) {
            $table->collate = 'latin1_spanish_ci';
            $table->bigIncrements('peId')->unique();
            $table->unsignedBigInteger('idUser')->nullable();
            $table->unsignedBigInteger('idDistrito');
            $table->unsignedBigInteger('cPDId')->nullable();
            $table->string('pePNombre')->nullable();
            $table->string('peSNombre')->nullable();
            $table->string('peAPPaterno')->nullable();
            $table->string('peAPMaterno')->nullable();
            $table->string('peTelefono')->nullable();
            $table->string('peNumeroDoc')->nullable();
            $table->unsignedBigInteger('idTD');
            $table->string('peDireccion')->nullable();
            $table->string('peReferencia')->nullable();
            $table->date('peFecNac')->nullable();
            $table->dateTime('peFecActualiza');
            $table->integer('peUsuActuali');
            $table->integer('peUsuReg');
            $table->timestamp('peFecCreacion');
            $table->integer('peEstado')->default(1);
        }
        );
        Schema::table('persona', function ($table) {
            $table->foreign('idDistrito')->references('idDistrito')->on('distrito');
            $table->foreign('idTD')->references('tdId')->on('tipo_doc');
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('cPDId')->references('cPDId')->on('centropoblado_distrito');

        });*/
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
