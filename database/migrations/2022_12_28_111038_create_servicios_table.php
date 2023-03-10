<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string("servicio");
            $table->bigInteger('plan_id')->nullable();
            $table->bigInteger('tipo_id');
            $table->bigInteger("distribuidor_id")->nullable();
            $table->boolean("factura_distribuidor");
            $table->boolean("comision_distribuidor");
            $table->bigInteger('proveedor_id')->nullable(); //Puesto nullable
            $table->bigInteger('cliente_id');
            $table->date('fecha_alta')->nullable();
            $table->date('fecha_expiracion');
            $table->date('fecha_baja')->nullable();
            $table->text('notas')->nullable();
            $table->bigInteger("estado_id");
            $table->string("mail_administrativo");
            $table->text('observaciones')->nullable();
            $table->text('observaciones_migracion')->nullable();
            $table->decimal('precio')->nullable();
            $table->enum("periodificacion_cliente",['mensual','trimestral','semestral','anual']);
            $table->enum("periodificacion_proveedor",['mensual','trimestral','semestral','anual']);
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
        Schema::dropIfExists('servicios');
    }
}
