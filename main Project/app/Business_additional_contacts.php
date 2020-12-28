<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business_additional_contacts extends Model
{
    protected $table ='business_additional_contacts';

    protected $fillable = [
        'personal_id','business_id','ContactPerson','PhoneNumber'
       ];
}
