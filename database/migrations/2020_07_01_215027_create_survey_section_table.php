<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveySectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_survey', function (Blueprint $table) {
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('survey_id');

            $table->unique(['survey_id', 'section_id']);
            $table->foreign('survey_id')->references('id')->on('survey');
            $table->foreign('section_id')->references('id')->on('section');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('section_survey');
    }
}
