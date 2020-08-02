<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExQualificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_qualification', function (Blueprint $table) {
            $table->id('qua_id');
            $table->unsignedBigInteger('qualtype_id');
            $table->foreign('qualtype_id')->references('qualtype_id')->on('qualification_types');
            $table->string('qua_degree');
            $table->string('qua_univerity');
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
        Schema::dropIfExists('ex_qualification');
    }
}
