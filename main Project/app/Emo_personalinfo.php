<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emo_personalinfo extends Model
{
    protected $table ='emo_personalinfos';

    protected $fillable =[
        'title','fullname','birthDate','pan','aadhaar','uploadfile','filename',
        'address1','address2','landmark','city',
        'state','pincode','email','phoneNumber','alternatenumber'
    ];
    
    public static $rules = array(
        'title' => 'required',
        'fullname' => 'required|regex:/^[a-z A-Z.]+$/',
        'birthDate' => 'required',
        'pan' => 'required|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/',
        'aadhaar' => 'required|regex:/^[0-9]{12}$/',
        'address1' => 'required',
        'landmark' => 'required',
        'city' => 'required|regex:/^[a-z A-Z.]+$/',
        'state' => 'required',
        'pincode' => 'required|numeric|digits:6',
        'email' => 'required|email',
        'phoneNumber' => 'required|numeric|digits:10',
        'alternatenumber' => 'numeric|digits:10'
    );
 
}
 