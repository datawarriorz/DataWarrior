<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounselorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counselor', function (Blueprint $table) {
            $table->id('co_id');
            $table->string('co_firstname')->nullable();
            $table->string('co_lastname')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('referral_code')->nullable();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('admin_id')->on('admins');
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
        Schema::dropIfExists('counselor');
    }
}
