<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmoBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emo_businesses', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('personal_id');
            $table->foreign('personal_id')->references('id')->on('emo_personalinfos')->onUpdate('cascade')->onDelete('cascade');
            $table->string('businessName');
            $table->string('gst');
            $table->string('pan')->nullable();
            $table->string('it_status')->nullable();
            $table->string('it_others')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('designation')->nullable();
            $table->string('businessAddress1')->nullable();
            $table->string('businessAddress2')->nullable();
            $table->string('landmark')->nullable();
            $table->string('City')->nullable();
            $table->string('State')->nullable();
            $table->integer('pincode')->nullable();
            $table->string('Email')->nullable();
            $table->string('PhoneNumber')->nullable();
            $table->string('Alternatenumber')->nullable();
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
        Schema::dropIfExists('emo_businesses');
    }
}
