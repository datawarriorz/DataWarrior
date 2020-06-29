<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_qualifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->unsignedBigInteger('qualtype_id');
            $table->foreign('qualtype_id')->references('qualtype_id')->on('qualification_types');
            $table->string('course_name');
            $table->string('college_name');
            $table->string('University');
            $table->date('start_date');
            $table->date('end_date');
            $table->Integer('percentage');
            $table->string('grade');
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
        Schema::dropIfExists('user_qualifications');
    }
}
