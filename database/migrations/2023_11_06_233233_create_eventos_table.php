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
            $table->string('nombre');
            $table->string('lugar');
            $table->dateTime('fecha_hora');
            $table->text('descripcion');
            $table->string('imagen')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('creador_id');

            // Relación con la tabla de personas (asumiendo que se llama 'personas')
            $table->foreign('creador_id')->references('id')->on('users')->onDelete('cascade');
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
