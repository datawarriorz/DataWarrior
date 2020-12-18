<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->string('project_name');
            $table->longText('project_description');
            $table->string('project_domain');
            $table->BigInteger('project_price')->nullable();
            $table->longText('project_link')->nullable();
            $table->binary('project_image')->nullable();
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->string('creator_flag')->nullable();
            $table->string('project_status')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
