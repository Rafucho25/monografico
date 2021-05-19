<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToMonograficoAutor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monografico_autor', function (Blueprint $table) {
            $table->foreign('autor_id')->references('id')->on('autores');
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
        Schema::table('monografico_autor', function (Blueprint $table) {
            $table->dropForeign('autor_id')->references('id')->on('autores');
            $table->dropForeign('monografico_id')->references('id')->on('monograficos');
        });
    }
}
