<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmoBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emo_banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personal_id');
            $table->foreign('personal_id')->references('id')->on('emo_personalinfos')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('business_id')->unsigned();
            $table->foreign('business_id')->references('id')->on('emo_businesses')->onUpdate('cascade')->onDelete('cascade');
            $table->string('bank_name');
            $table->string('branch_name');
            $table->string('account_type');
            $table->string('account_no');
            $table->string('ifsc_code');
            $table->string('od_cc_details');
            $table->string('loan_details');
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
        Schema::dropIfExists('emo_banks');
    }
}
