<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_experience', function (Blueprint $table) {
            $table->id('exp_id');
            $table->string('exp_profile');
            $table->string('exp_organisation');
            $table->string('exp_location');
            $table->string('exp_description')->nullable();
            $table->string('exp_currentjob')->nullable();
            $table->date('exp_startdate')->nullable();
            $table->date('exp_enddate')->nullable();
            $table->unsignedBigInteger('ex_id');
            $table->foreign('ex_id')->references('ex_id')->on('experts');
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
        Schema::dropIfExists('ex_experience');
    }
}
