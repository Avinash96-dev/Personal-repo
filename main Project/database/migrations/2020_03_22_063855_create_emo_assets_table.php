<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmoAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emo_assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personal_id');
            $table->foreign('personal_id')->references('id')->on('emo_personalinfos')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('business_id')->unsigned();
            $table->foreign('business_id')->references('id')->on('emo_businesses')->onUpdate('cascade')->onDelete('cascade');
            
            $table->string('fleet_category')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('year_of_mfg')->nullable();
            $table->string('finance')->nullable();
            $table->string('insurance_name')->nullable();
            $table->string('remarks')->nullable();

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
        Schema::dropIfExists('emo_assets');
    }
}
