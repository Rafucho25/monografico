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
            $table->unsignedBigInteger('recinto_id');
            $table->unsignedBigInteger('universidad_id');
            $table->unsignedBigInteger('facultad_id');
            $table->unsignedBigInteger('escuela_id');
            $table->unsignedBigInteger('carrera_id');
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
