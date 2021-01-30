<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemanaSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semanas_series', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semana_id')->nullable(false)->constrained('semanas');
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
        Schema::table('semanas_series', function (Blueprint $table) {
            $table->dropForeign(['semana_id']);
            $table->dropColumn(['semana_id']);
            $table->dropForeign(['serie_id']);
            $table->dropColumn(['serie_id']);
        });
        Schema::dropIfExists('semanas_series');
    }
}
