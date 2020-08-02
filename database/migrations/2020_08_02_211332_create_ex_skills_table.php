<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_skills', function (Blueprint $table) {
            $table->id('sk_id');
            $table->string('sk_name');
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
        Schema::dropIfExists('ex_skills');
    }
}
