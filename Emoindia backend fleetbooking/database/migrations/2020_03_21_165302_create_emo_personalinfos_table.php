<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmoPersonalinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emo_personalinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('fullname');
            $table->string('uploadfile')->nullable();
            $table->string('uploadpath')->nullable();
            $table->string('birthDate');
            $table->string('pan');
            $table->string('aadhaar');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('landmark');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('alternatenumber')->nullable();
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
        Schema::dropIfExists('emo_personalinfos');
    }
}
