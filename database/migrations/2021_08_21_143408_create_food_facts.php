<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodFacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_facts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_id');
            $table->unsignedBigInteger('blood_type_id');
            $table->unsignedBigInteger('allergy_name_id');
            $table->timestamps();
            $table->foreign('food_id')->references('id')->on('foods')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('blood_type_id')->references('id')->on('bloods_fact')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('allergy_name_id')->references('id')->on('allergies_fact') ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_facts');
    }
}
