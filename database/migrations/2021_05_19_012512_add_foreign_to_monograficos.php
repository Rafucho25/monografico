<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToMonograficos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monograficos', function (Blueprint $table) {
            $table->foreign('recinto_id')->references('id')->on('recintos');
            $table->foreign('universidad_id')->references('id')->on('universidades');
            $table->foreign('facultad_id')->references('id')->on('facultades');
            $table->foreign('escuela_id')->references('id')->on('escuelas');
            $table->foreign('carrera_id')->references('id')->on('carreras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monograficos', function (Blueprint $table) {
            $table->dropForeign('recinto_id')->references('id')->on('recintos');
            $table->dropForeign('universidad_id')->references('id')->on('universidades');
            $table->dropForeign('facultad_id')->references('id')->on('facultades');
            $table->dropForeign('escuela_id')->references('id')->on('escuelas');
            $table->dropForeign('carrera_id')->references('id')->on('carreras');
        });
    }
}
