<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_requirements', function (Blueprint $table) {
            $table->id('userreq_id');
            $table->unsignedBigInteger('reqtype_id');
            $table->foreign('reqtype_id')->references('reqtype_id')->on('requirement_types');
            $table->string('no_of_req');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id')->references('skill_id')->on('skills_masters');
            $table->string('experience');
            $table->date('start_date');
            $table->unsignedBigInteger('salary');
            $table->unsignedBigInteger('certtype_id');
            $table->foreign('certtype_id')->references('certtype_id')->on('certification_types');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->unsignedBigInteger('qualtype_id');
            $table->foreign('qualtype_id')->references('qualtype_id')->on('qualification_types');
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
        Schema::dropIfExists('user_requirements');
    }
}
