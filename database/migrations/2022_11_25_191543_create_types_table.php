<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->float('precio_noche')->unsigned()->default(0);
            $table->string('descripcion');
            $table->integer('numero_personas')->unsigned()->default(1);
            $table->integer('numero_camas')->unsigned()->default(1);
            $table->string('tipo_cama');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
};
