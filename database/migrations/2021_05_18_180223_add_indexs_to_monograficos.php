<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexsToMonograficos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monograficos', function (Blueprint $table) {
            $table->index('recinto_id');
            $table->index('universidad_id');
            $table->index('facultad_id');
            $table->index('escuela_id');
            $table->index('carrera_id');
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
            $table->dropIndex('recinto_id');
            $table->dropIndex('universidad_id');
            $table->dropIndex('facultad_id');
            $table->dropIndex('escuela_id');
            $table->dropIndex('carrera_id');
        });
    }
}
