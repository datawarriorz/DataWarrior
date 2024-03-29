<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->binary('u_image')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('password')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            
            $table->string('provider_id')->nullable();
            $table->string('provider_name')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE users Modify u_image MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
