<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToMonograficoSustentante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monografico_sustentante', function (Blueprint $table) {
            $table->foreign('sustentante_id')->references('id')->on('sustentantes');
            $table->foreign('monografico_id')->references('id')->on('monograficos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monografico_sustentante', function (Blueprint $table) {
            $table->dropForeign('sustentante_id')->references('id')->on('sustentantes');
            $table->dropForeign('monografico_id')->references('id')->on('monograficos');
        });
    }
}
