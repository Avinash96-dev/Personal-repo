<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Database\Eloquent\Model;
use App\Emo_personalinfo;
use App\Uploadfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;


class UploadfileController extends Controller
{
    public function UploadFile(Request $request,$id)
    {
        try{
            $file = $request->file('filename');
            $filename = $file->getClientOriginalName();
            $name=time().'.'.$filename;
            $store= Storage::disk('upload') ->put($name,file_get_contents($file -> getRealPath()));
            $fullpath=Storage::disk('upload')->path($name);
            $uploadname = Emo_personalinfo::where('id',$id)->update([ 'uploadfile'=> $name,'filename'=>$fullpath,]);
            return response()->json(['name'=>$name],201);
        } 
        catch(Exception $exception)
         {
            return $exception;
        }
    }


    
    public function fileupdate(Request $request,$id)
      {
           try {
            $user =  emo_personalinfo::find($id);
            // dd($user);
            $delete=Storage::disk('upload')->delete("{$user->uploadfile}");
           
           $file = $request->file('filename');
           $filename = $file->getClientOriginalName();
           $name=time().'.'.$filename;
           $store= Storage::disk('upload') ->put($name,file_get_contents($file -> getRealPath()));
           $fullpath=Storage::disk('upload')->path($name);
           $uploadname = emo_personalinfo::where('id',$id)->update(['uploadfile'=> $name,'filename'=>$fullpath ]);

           return response()->json(['data'=>'Successfully updated file for CustomerId: '.$id],200);

        } catch(Exception $exception) {
            return $exception;

           return response()->json(['data'=>'unsuccessful'],400);
        }
    }    


    
  


   
}
