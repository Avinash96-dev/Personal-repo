<?php

namespace App\Http\Controllers;
use Exception;
use App\Uploadfile;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
// use GuzzleHttp\Psr7\AppendStream;
// use Psr\Http\Message\StreamInterface;

use Illuminate\Database\Eloquent\Model;
// use GuzzleHttp\Psr7;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Guzzle\Http\Exception\ClientErrorResponseException;


class UploadfileController extends Controller
{
    public function UploadFile(Request $request)
    {
        try{

            
             
            $file = $request->file('filename');
            $filename = $file->getClientOriginalName();
            $name=time().'.'.$filename;
            $store= Storage::disk('upload') ->put($name,file_get_contents($file -> getRealPath()));

            $fullpath=Storage::disk('upload')->path($name);
            $uploadname = Uploadfile::create([ 'uploadfile'=> $name,'uploadpath'=>$fullpath,]);

            return response()->json(['data'=> 'Sucessfully uploaded file for CustomerId: '.$uploadname->id],201);

        } catch(Exception $exception) {

                return $exception;
        }
    }


    
    public function fileupdate(Request $request,$id)
      {
            
       try {
            $user =  Uploadfile::find($id);
            $delete=Storage::disk('upload')->delete("{$user->uploadfile}");
           
           $file = $request->file('filename');
           $filename = $file->getClientOriginalName();
           $name=time().'.'.$filename;
           $store= Storage::disk('upload') ->put($name,file_get_contents($file -> getRealPath()));
           $fullpath=Storage::disk('upload')->path($name);
           $uploadname = Uploadfile::where('id',$id)->update(['uploadfile'=> $name,'uploadpath'=>$fullpath ]);

           return response()->json(['data'=>'Successfully updated file for CustomerId: '.$id],200);

        } catch(Exception $exception) {
            return $exception;

           return response()->json(['data'=>'unsuccessful'],400);
        }
    }    


    
    public function guzzletry(Request $request)   // for create image
    {
        $data = $request->all();
        // dd($data);
        // $validator = Validator::make($data,Uploadfile::$rules, Uploadfile::$messages);
        // if ($validator->fails())
        // {
        //     return response()->json(['error' => $validator->errors()->first()]);
        // }

        $file = $request->file('filename');
        $name = time() . '_' . $file->getClientOriginalName();
        $client= new \GuzzleHttp\Client([    
            'base_uri' => 'http://emoindia:3000/'
        ]);
        $res = $client->request('POST','uploadfile' , [
            'multipart' => [           
                   [ 'name'     => 'filename',
                    'contents' => fopen([$file],'r'),
                    'filename' => $name]    
            ]
        ]);
        
        $res5 = $res->getBody()->getContents();
        return $res5;
   
    }




    public function updateguzzletry(Request $request , $id)   // for update image
    {
        $data = $request->all();
        // $validator = Validator::make($data,Uploadfile::$rules, Uploadfile::$messages);
        // if ($validator->fails())
        // {
        //     return response()->json(['error' => $validator->errors()->first()]);
        // }
        
        $file = $request->file('filename');
        $name = time() . '_' . $file->getClientOriginalName();
        $client= new \GuzzleHttp\Client([    
            'base_uri' => 'http://emoindia:3000/'
        ]);
            $res = $client->request('POST','updateuploadfile/'.$id , [

            'multipart' => [           
                    ['name'     => 'filename',
                    'contents' => fopen($file,'r'),
                    'filename' => $name]
            ]
        ]);
        
        $res5 = $res->getBody()->getContents();
        return $res5;
    
    }
}
