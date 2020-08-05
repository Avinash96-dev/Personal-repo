<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emo_business extends Model
{
    protected $table ='emo_businesses';

    protected $fillable = [
        'personal_id','businessName','gst',
        'pan','it_status','it_others',
        'contact_person','designation','businessAddress1',
        'businessAddress2','landmark','City','State',
        'pincode','Email','PhoneNumber','Alternatenumber'
    ];
    

    public static $rules = array(
        '*.businessName' => 'required',
        '*.gst' => 'required|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
    );
    public static $rules1= array(
        'businessName' => 'required',
        'gst' => 'required|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
        'pan' => 'required|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/',
        'it_status' => 'required',
        'it_others' => 'required',
        'contact_person' => 'required',
        'designation' => 'required',
        'businessAddress1' => 'required',
        'landmark' => 'required',
        'City' => 'required',
        'State' => 'required',
        'pincode' => 'required|digits:6',
        'Email' => 'required|email',
        'PhoneNumber' => 'required|numeric|digits:10',
        'Alternatenumber' => 'numeric|digits:10'
        );

}
