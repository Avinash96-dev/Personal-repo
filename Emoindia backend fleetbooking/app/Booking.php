<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'emo_fleet_bookings';
    protected $guarded = []; 

    public static $fleetRules = array(
        '*.fleet_category' => 'required',
        '*.brand' => 'required',
        '*.model' => 'required',
        '*.bookings_required' => 'required|numeric',
        '*.business_id' => 'required|numeric',
        '*.BusinessName' => 'required|regex:/^[a-z A-Z.]+$/',
        '*.PhoneNumber' => 'required|numeric|digits:10'
    );

    public static $generalRules= array(
        'firstName' => 'required|regex:/^[a-z A-Z.]+$/',
        'location' => 'required|regex:/^[a-z A-Z.]+$/',
        'contactNumber' => 'required|numeric|digits:10',
        'alternateContactNumber' => 'numeric|digits:10',
        // 'email' => 'required|email',
        'fromDate' => 'required',
        'toDate' => 'required'
        );


}


