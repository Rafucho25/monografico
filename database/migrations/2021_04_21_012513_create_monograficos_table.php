<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonograficosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monograficos', function (Blueprint $table) {
            $table->id();
            $table->integer('recinto_id');
            $table->integer('universidad_id');
            $table->integer('facultad_id');
            $table->integer('escuela_id');
            $table->integer('carrera_id');
            $table->string('tema');
            $table->date('fecha');
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
        Schema::dropIfExists('monograficos');
    }
}
