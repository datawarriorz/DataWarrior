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
            $table->binary('ex_image')->nullable();
            $table->date('ex_dateofbirth')->nullable();
            $table->string('ex_aboutme')->nullable();
            $table->longText('ex_description')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('ex_contactcode')->nullable();
            $table->string('ex_contactno')->nullable();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('admin_id')->on('admins');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE experts Modify ex_image MEDIUMBLOB");
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
