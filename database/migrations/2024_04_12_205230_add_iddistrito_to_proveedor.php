<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIddistritoToProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proveedor', function (Blueprint $table) {
            $table->unsignedBigInteger('dtId')->after('pvId');
            $table->foreign('dtId')->references('IdDistrito')->on('distrito');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proveedor', function (Blueprint $table) {
            $table->dropForeign('proveedor_distrito_id_foreign');
        });
    }
}
