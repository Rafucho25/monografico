<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexsToMonograficoSustentante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monografico_sustentante', function (Blueprint $table) {
            $table->index('monografico_id');
            $table->index('sustentante_id');
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
            $table->dropIndex('monografico_id');
            $table->dropIndex('sustentante_id');
        });
    }
}
