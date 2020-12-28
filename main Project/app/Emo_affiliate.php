<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emo_affiliate extends Model
{
    protected $table ='emo_affiliates';

    protected $fillable = [
        'personal_id','insurance_detail','insurance_name',
        'car_details','bike_details'
    ];

    public static $rules = array(
    
        'insurance_detail' => 'required',
        'insurance_name' => 'required',
        'car_details' => 'required',
        'bike_details' => 'required'
    );
    
}
