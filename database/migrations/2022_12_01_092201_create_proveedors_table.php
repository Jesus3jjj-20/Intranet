<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->bigInteger("id")->primary();
            $table->string("nombre")->nullable();
            $table->string("nom_contac_prov")->nullable();
            $table->string("telf_prov")->nullable();
            $table->string("fax_prov")->nullable();
            $table->string("form_pago_prov")->nullable();
            $table->string("banco_prov")->nullable();
            $table->string("cuenta_corrient_prov")->nullable();
            $table->string("e_mail_prov")->nullable();
            $table->string("e_mail_contac_prov")->nullable();
            $table->string("login_servicio")->nullable();
            $table->string("password_servicio")->nullable();
            $table->string("url_intranet")->nullable();
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
        Schema::dropIfExists('proveedors');
    }
}
