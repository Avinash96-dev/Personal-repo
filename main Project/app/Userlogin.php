<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userlogin extends Model
{
    protected $table = 'userlogins';
    protected $fillable =['name','email','password' ];
}
