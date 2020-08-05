<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Emo_asset;
use App\Emo_fleet;
use App\FleetTransaction;
use App\Emo_business;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;




class BookingController extends Controller
{

    public function sendData(){
        $readAllAssets = Emo_asset::all();
    foreach($readAllAssets as $key => $value) {
        $getBusinessId = $value['business_id'];
        $getAssetId = $value['id'];
        $getBusinessDetails = Emo_business::where('id',$getBusinessId)->get();
        $getAvailableFleet = FleetTransaction::where('asset_id',$getAssetId)->get('available_fleets');
        $value['BusinessName'] = $getBusinessDetails[0]['businessName'];
        $value['PhoneNumber'] = $getBusinessDetails[0]['PhoneNumber'];
        $value['AvailableFleets'] = $getAvailableFleet[0]['available_fleets'];
        $array[] =$value;
        }

        foreach($array as $key =>$value){
            if($value['AvailableFleets'] > 0){
            $filtered[] = $value;
            } 
        }

    return response()->json(['result' => $filtered],200);

    }


    public function book(Request $request){
        
        $fleet = $request->datum['fleet'];
        $general = $request->datum['general'];

        $validateGeneral = Validator::make($general,Booking::$generalRules); 
            foreach($fleet as $key => $value) {
                $fleetData[] = $value; 
            $validateFleet = Validator::make($fleetData,Booking::$fleetRules);
            }
        
        if($validateGeneral->fails()||$validateFleet->fails()) { 
            $error1 = $validateGeneral->errors();
            $error2 = $validateFleet->errors();
            return response()->json([
                'error message' => array($error1,$error2)
            ],400);
        } else {

            foreach($fleet as $key => $value){
                $book[] = Booking::create([

                    'customer_name' =>$request->datum['general']['firstName'],
                    'location' => $request->datum['general']['location'],
                    'customer_contactNo' => $request->datum['general']['contactNumber'],
                    'customer_alternateNo' => $request->datum['general']['alternateContactNumber'],
                    'email' => $request->datum['general']['email'],
                    'from_date' => $request->datum['general']['fromDate'],
                    'to_date' => $request->datum['general']['toDate'],

                    'fleet_category' => $fleet[$key]['fleet_category'],
                    'fleet_brand' => $fleet[$key]['brand'],
                    'fleet_model' => $fleet[$key]['model'],
                    'booked_quantity' =>$fleet[$key]['bookings_required'],
                    'business_id' => $fleet[$key]['business_id'],
                    'business_name' => $fleet[$key]['BusinessName'],
                    'business_contactNo' => $fleet[$key]['PhoneNumber']
                ]);
                $UpdateAvailableFleet =FleetTransaction::where('asset_id',$fleet[$key]['id'])->decrement('available_fleets',$fleet[$key]['bookings_required']);
                // return $decrement;
            }
            return response()->json(['booked' => $book],201);
        }
    }

    public function getBookings($id){
        $data = Booking::where('id',$id)->get();
        return response()->json(['bookings'=> $data],200);
    }





//---pratheesh---------view page- fleet category fetching-----------
    public function trial($id) {
        $getAllAssets = Emo_asset::where('business_id' , $id)->get(); 
        $array =[];
        foreach ($getAllAssets as $key => $eachAsset) {
            $brand = $eachAsset['fleet_category_id'];
            $getCategoryName = Emo_fleet::where('fleet',$brand)->get('fleet');
            $eachAsset['fleetName'] =$getCategoryName[0]['fleet'];
            $array[] =$eachAsset;        
        }
        return $array;
        }

}
