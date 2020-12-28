<?php

namespace App\Http\Controllers;

use App\Emo_business;
use App\Emo_bank;
use App\Business_additional_contacts;
use Illuminate\Http\Request;
use DB;

class BusinessController extends AssetController
{

    public function index()
    {
        $allbusinessdetails = Emo_business::all();
        return response()->json(['All Business' => $allbusinessdetails],200);
    }


    public function createBusinessdetails(Request $request,$id)
    {
        // $businessdetail= $request->input('addmorebusiness');
        //     foreach ($businessdetail as $key=> $value) {
        //         $reverse = json_decode($value);
        //         $addbusinessgroup[] = Emo_business::create([
        //             'personal_id'=>$request->personal_id,
        //             'businessName'=>$reverse->businessName,
        //             'gst'=>$reverse->gst,
        //         ]);
        //     }    
        //     return $addbusinessgroup;

        $businessdetail= $request->input('addmorebusiness');
            foreach ($businessdetail as $key=> $value) {
                $addbusinessgroup[] = Emo_business::create([
                    'personal_id'=>$id,
                    'businessName'=>$value['businessName'],
                    'gst'=>$value['gst'],
                ]);
            }    
            return $addbusinessgroup;
    }


    public function CreateOrUpdateBusiness(Request $request,$id)
    {
        // $updateCustomerBusiness= Emo_business::where('personal_id',$id)->get();
        //     foreach($request->addmorebusiness as $key => $request_data){
        //         $reverse = json_decode($request_data);
        //         if(isset($updateCustomerBusiness[$key])){
        //             $business= $updateCustomerBusiness[$key];
        //         } else {
        //             $business= new Emo_business;
        //         }
        //             $business->personal_id = $id;
        //             $business->gst = $reverse->gst;
        //             $business->businessName = $reverse->businessName;
        //             $business->save();
        //     }
        // return response()->json(['UpdatedBusiness' => $business],200);   
        
        $updateCustomerBusiness= Emo_business::where('personal_id',$id)->get();
        foreach($request->addmorebusiness as $key => $request_data){
            if(isset($updateCustomerBusiness[$key])){
                $business= $updateCustomerBusiness[$key];
            } else {
                $business= new Emo_business;
            }
                $business->personal_id = $id;
                $business->gst = $request_data['gst'];
                $business->businessName = $request_data['businessName'];
                $business->save();
        }
    return response()->json(['UpdatedBusiness' => $business],200);       
    }

    public function readBusinessdetails($id)
    {
        $personalId = Emo_business::where('personal_id',$id)->orWhere('PhoneNumber',$id)->get();
        $count=$personalId->count();

        if($count==0) {
           $personalId= Business_additional_contacts::where('PhoneNumber',$id)->get();
        }
        $getId = $personalId[0]['personal_id'];
        $readBusiness[] = Emo_business::where('personal_id',$getId)->get(); 
        foreach($readBusiness[0] as $key => $value){
            $businessId = $value->id;
            $readContacts= Business_additional_contacts::where('business_id',$businessId)->get();
            $value['additional_contacts'] = $readContacts;
            $array[] = $value;
        }
        return $array;       
    }
    
   
    public function getBusiness($id)                                 //business patch value
    {
        $business=emo_business::where('id',$id)->get();
        return $business;
        
    }


    public function updateBusiness(Request $request, $id)
    {
            $businessdetailentry = $request->input('gst');
            $business_profile = Emo_business::where('personal_id',$id)->where('gst', $businessdetailentry)->first();
            // dd($business_profile);
            $business_profile->pan = $request->pan;
            $business_profile->it_status = $request->it_status;
            $business_profile->it_others = $request->it_others;
            $business_profile->contactperson = $request->contactperson;
            $business_profile->designation = $request->designation;
            $business_profile->businessAddress1 = $request->businessAddress1;
            $business_profile->businessAddress2 = $request->businessAddress2;
            $business_profile->landmark = $request->landmark;
            $business_profile->City = $request->City;
            $business_profile->State = $request->State;
            $business_profile->pincode = $request->pincode;
            $business_profile->Email = $request->Email;
            $business_profile->PhoneNumber = $request->PhoneNumber;
            $business_profile->Alternatenumber = $request->Alternatenumber;
            $business_profile->save();
            return $business_profile;
    }  
    
    
    public function deleteBusiness($id)
    {
        $deletebusiness = Emo_business::where('id',$id)->delete();
        return response()->json(['deletedBusiness Id:' => $id],200);
    } 
}    






