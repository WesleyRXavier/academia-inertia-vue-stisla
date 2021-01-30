<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExerciciosSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercicios_series', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercicio_id')->nullable(false)->constrained('exercicios');
            $table->foreignId('serie_id')->nullable(false)->constrained('series');
        
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
        Schema::table('exercicios_series', function (Blueprint $table) {
            $table->dropForeign(['exercicio_id']);
            $table->dropColumn(['exercicio_id']);
            $table->dropForeign(['serie_id']);
            $table->dropColumn(['serie_id']);
        });
        Schema::dropIfExists('exercicios_series');
    }
}
