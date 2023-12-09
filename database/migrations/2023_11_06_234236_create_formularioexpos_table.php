<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormularioexposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularioexpos', function (Blueprint $table) {
            $table->id();
                $table->string('nombres');
                $table->string('apellidos');
                $table->string('email');
                $table->string('numero');
                $table->string('cargo')->nullable();
                $table->string('charla')->nullable();
                $table->string('horario')->nullable();
                $table->string('foto')->nullable();
                $table->unsignedBigInteger('evento_id');
                $table->timestamps();
    
                $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formularioexpos');
    }
}
