<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploadfile extends Model
{
    protected $table = 'uploadfiles';

    protected $fillable = ['uploadfile','uploadpath'];

    public static $rules = array(
        'document'  =>  'required|mimes:jpeg,png,jpg,doc,docx|max:3072',
          
         );

    public static $messages = array(
    'document.required' => 'The value is required.',
   'document.mimes' => 'The file must be a file of type: jpeg,png,jpg,doc,docx.',
   'document.max' => 'Maximum file size to upload is 2MB.'
    );
}
