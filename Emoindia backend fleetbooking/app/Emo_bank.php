<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emo_bank extends Model
{
    protected $table ='emo_banks';

    protected $fillable = [
        'personal_id','business_id',
        'bank_name',
        'branch_name',
        'account_type',
        'account_no',
        'ifsc_code',
        'od_cc_details',
        'loan_details'
        ];

    public static $rules= array(
        
        'bank_name' => 'required|regex:/^[a-z A-Z.]+$/',
        'branch_name' => 'required|regex:/^[a-z A-Z.]+$/',
        'account_type' => 'required|regex:/^[a-z A-Z.]+$/',
        'account_no'=>'required|regex:/^[0-9]{8,20}$/',
        'ifsc_code' => 'required|regex:/^[A-Za-z]{4}\d{7}$/'  
    ); 

}
