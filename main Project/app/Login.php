<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    //
    // use Authenticatable, Authorizable;

    protected $table = 'users';
    protected $fillable =['name','email','password' ,'api_token'];
}
