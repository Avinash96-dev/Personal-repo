<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emo_personalinfo;

class PersonalinfoController extends Controller
{
    public function index()  
    {
        $data = Emo_personalinfo::all();
        return response()->json(['Total customers' => $data],200);
    }


    public function createCustomerinfo(Request $request)
    {
        $addpersonalinfo =Emo_personalinfo::create([
            'title'=>$request->title,
            'fullname'=>$request->fullname,
            'birthDate'=>$request->birthDate,
            'pan'=>$request->pan,
            'aadhaar'=>$request->aadhaar,
            'address1'=>$request->address1,
            'address2'=>$request->address2,
            'landmark'=>$request->landmark,
            'city'=>$request->city,
            'state'=>$request->state,
            'pincode'=>$request->pincode,
            'email'=>$request->email,
            'phoneNumber'=>$request->phoneNumber,
            'alternatenumber'=>$request->alternatenumber,
        ]);
        
        return $addpersonalinfo;
    }


    public function readCustomerinfo($id)
    {
        $readcustomerinfo = Emo_personalinfo::find($id)->first();
        return $readcustomerinfo;
    }


    public function updateCustomerinfo(Request $request , $id)
    {
        $updatecustomerinfo = Emo_personalinfo::where('id',$id)->first();

        $updatecustomerinfo->title = $request->title; 
        $updatecustomerinfo->fullname = $request->fullname; 
        $updatecustomerinfo->birthDate = $request->birthDate; 
        $updatecustomerinfo->pan = $request->pan; 
        $updatecustomerinfo->aadhaar = $request->aadhaar; 
        $updatecustomerinfo->address1 = $request->address1; 
        $updatecustomerinfo->address2 = $request->address2; 
        $updatecustomerinfo->landmark = $request->landmark; 
        $updatecustomerinfo->city = $request->city; 
        $updatecustomerinfo->state = $request->state; 
        $updatecustomerinfo->pincode = $request->pincode; 
        $updatecustomerinfo->email = $request->email; 
        $updatecustomerinfo->phoneNumber = $request->phoneNumber; 
        $updatecustomerinfo->alternatenumber = $request->alternatenumber; 
        $updatecustomerinfo->save();

        return response()->json(['updated' => $updatecustomerinfo],200);
       
    }

    public function deleteCustomerinfo($id)
    {
        $deletecustomerinfo = Emo_personalinfo::find($id)->delete();
        return response()->json(['message' =>'Id :'. $id.'  '.'deleted successfully'],200);
    }

}
