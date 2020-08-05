<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmoAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emo_affiliates', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('personal_id')->nullable();
            $table->foreign('personal_id')->references('id')->on('emo_personalinfos')->onUpdate('cascade')->onDelete('cascade');
            $table->string('insurance_detail');
            $table->string('insurance_name');
            $table->string('car_details');
            $table->string('bike_details');
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
        Schema::dropIfExists('emo_affiliates');
    }
}
