<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("color");
            $table->date("fecha_inicio");
            $table->integer("dia_inicio");
            $table->integer("mes_inicio");
            $table->integer("annio_inicio");
            $table->date("fecha_fin");
            $table->integer("dia_fin");
            $table->integer("mes_fin");
            $table->integer("annio_fin");
            $table->string("todo_dia");
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
        Schema::dropIfExists('eventos');
    }
}
