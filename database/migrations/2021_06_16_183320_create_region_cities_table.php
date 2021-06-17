<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_cities', function (Blueprint $table) {
            $table->integer('region_id')->unsigned()->index();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->integer('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('region_cities');
    }
}
