<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmoFleetBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emo_fleet_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_name');
            $table->string('location');
            $table->string('customer_contactNo');
            $table->string('customer_alternateNo')->nullable();
            $table->string('email')->nullable();
            $table->string('from_date');
            $table->string('to_date');
            $table->string('fleet_category');
            $table->string('fleet_brand');
            $table->string('fleet_model');
            $table->string('booked_quantity');
            $table->string('business_id');
            $table->string('business_name');
            $table->string('business_contactNo');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('emo_fleet_bookings');
    }
}
