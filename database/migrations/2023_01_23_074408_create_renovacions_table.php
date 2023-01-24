<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenovacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renovacions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('servicio_id');
            $table->string("nPresupuesto")->nullable();
            $table->date("fecha_renovacion");
            $table->bigInteger('estado_renovacion_id')->default(1);
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
        Schema::dropIfExists('renovacions');
    }
}
