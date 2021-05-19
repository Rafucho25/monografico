<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexsToMonograficoAutor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monografico_autor', function (Blueprint $table) {
            $table->index('monografico_id');
            $table->index('autor_id');
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
            $table->dropIndex('monografico_id');
            $table->dropIndex('autor_id');
        });
    }
}
