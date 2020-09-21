<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('article_id');
            $table->string('title');
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->string('creator_flag')->nullable();
            $table->string('author')->nullable();
            $table->longText('description');
            $table->binary('content')->nullable();
            $table->binary('article_image')->nullable();
            $table->string('status')->nullable();


            $table->timestamps();
        });
        DB::statement("ALTER TABLE articles Modify article_image MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
