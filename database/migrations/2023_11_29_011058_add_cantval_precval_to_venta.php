<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCantvalPrecvalToVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('venta', function (Blueprint $table) {
            $table->integer('vCantVal')->default(0)->after('idCl');
            $table->double('vPrecioVal')->default(0)->after('vCantVal');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('venta', function (Blueprint $table) {
            $table->dropColumn('vCantVal');
            $table->dropColumn('vPrecioVal');
        });
    }
}
