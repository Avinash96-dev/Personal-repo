<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emo_asset extends Model
{
    protected $table ='emo_assets';

    protected $fillable = ['personal_id','business_id',
        'fleet_category','brand','model','year_of_mfg','finance','insurance_name','remarks'
    ];
    
     public static $rules= array(
        
        '*.fleet_category' => 'required',
        '*.brand' => 'required',
        '*.model' => 'required',
        '*.year_of_mfg' => 'required|numeric|digits:4',
        '*.finance' => 'required',
        '*.insurance_name' => 'required'
    );

}

