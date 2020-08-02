<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->id('ex_id');
            $table->string('ex_firstname')->nullable();
            $table->string('ex_lastname')->nullable();
            $table->date('ex_dateofbirth')->nullable();
            $table->string('ex_aboutme')->nullable();
            $table->string('ex_description')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('ex_contactcode')->nullable();
            $table->string('ex_contactno')->nullable();
            
            $table->rememberToken();
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
        Schema::dropIfExists('experts');
    }
}
