<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('job_title');
            $table->binary('job_description');
            $table->string('job_status')->default('Open');//close open
            $table->string('job_company')->nullable();
            $table->string('job_domain');
            $table->string('job_shift');
            $table->string('job_location');
            $table->string('job_designation');
            $table->unsignedBigInteger('job_type_id');
            $table->foreign('job_type_id')->references('job_type_id')->on('job_type');
            $table->string('job_skills_required')->nullable();
            $table->string('job_duration')->nullable();
            $table->string('job_salary');
            $table->string('job_starttime');
            $table->date('job_apply_by');
            $table->unsignedInteger('job_openings')->nullable();
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->string('creator_flag')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE jobs Modify job_description MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
