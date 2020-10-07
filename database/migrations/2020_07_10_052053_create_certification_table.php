<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification', function (Blueprint $table) {
            $table->id('cert_id');
            $table->string('cert_title');
            $table->unsignedBigInteger('cert_price')->nullable();
            $table->binary('cert_description')->nullable();
            $table->binary('cert_image')->nullable();
            $table->string('cert_provider')->nullable();
            $table->string('cert_domain')->nullable();
            $table->string('cert_validationperiod')->nullable();
            $table->binary('cert_prerequisites')->nullable();
            $table->string('cert_status')->nullable();
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
        Schema::dropIfExists('certification');
    }
}
