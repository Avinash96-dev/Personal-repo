<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\emo_personalinfo;
use App\Uploadfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;



class UploadGuzzleController extends Controller
{
    public function guzzletry(Request $request,$id)   
    {
      
        $file = $request->file('filename');
        $name = time() . '_' . $file->getClientOriginalName();
        $client= new \GuzzleHttp\Client([    
            'base_uri' => 'http://emoindia.com/'
        ]);
        $res = $client->request('POST','upload/'.$id, [
            'multipart' => [           
                   [ 'name'     => 'filename',
                    'contents' => fopen($file,'r'),
                    'filename' => $name                                                                                                                                                                                         
            ]]
        ]);
        
        $res5 = $res->getBody()->getContents();
        return $res5;
   
    }




    public function updateguzzletry(Request $request , $id)   // for update image
    {
        
        
        $file = $request->file('filename');
        $name = time() . '_' . $file->getClientOriginalName();
      
        $client= new \GuzzleHttp\Client([    
            'base_uri' => 'http://emoindia.com/'
        ]);
            $res = $client->request('POST','fileupdate/'.$id , [

            'multipart' => [           
                   [ 'name'     => 'filename',
                    'contents' => fopen($file,'r'),
                    'filename' => $name]
            ]
        ]);
        
        $res5 = $res->getBody()->getContents();
        return $res5;
    
    }

}
