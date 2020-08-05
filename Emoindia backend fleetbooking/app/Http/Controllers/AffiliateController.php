<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emo_affiliate;

class AffiliateController extends Controller
{
    public function index()
    {
        $allAffiliatedetails = Emo_affiliate::all();
        return response()->json(['AllAffiliateDetails' => $allAffiliatedetails],200);
    }


    public function createAffiliateinfo(Request $request)
    {
        $addaffiliate= Emo_affiliate::create([
            'personal_id'=>$request->personal_id,
            'insurance_detail'=>$request->insurance_detail,
            'insurance_name'=>$request->insurance_name,
            'car_details'=>$request->car_details,
            'bike_details'=>$request->bike_details
        ]);
        return $addaffiliate;    
    }


    public function readAffiliate($id)
    {
        $customeraffiliate = Emo_affiliate::where('personal_id',$id)->first();
        return $customeraffiliate;
    }


    public function updateAffiliate(Request $request , $id)
    {
        $updatecustomeraffiliate= Emo_affiliate::where('personal_id', $id)->first();
        $updatecustomeraffiliate->insurance_detail = $request->insurance_detail;
        $updatecustomeraffiliate->insurance_name = $request->insurance_name;
        $updatecustomeraffiliate->car_details = $request->car_details;
        $updatecustomeraffiliate->bike_details = $request->bike_details;
        $updatecustomeraffiliate->save();

        return response()->json(['updatedaffiliateinfo' => $updatecustomeraffiliate],200);
    }


    public function deleteAffiliate($id)
    {
        $deleteAffiliate = Emo_affiliate::where('personal_id', $id)->delete();
        return response()->json(['Deleted Affiliateinfo of CustomerId: ' => $id],200);
    }

}
