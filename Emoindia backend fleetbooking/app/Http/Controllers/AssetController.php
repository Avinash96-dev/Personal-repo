<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emo_asset;
use App\FleetTransaction;
use Illuminate\Support\Facades\Validator;


class AssetController extends Controller
{

    public function index()
    {
        $allfleetinfo = Emo_asset::all();
        return response()->json(['All fleet details' => $allfleetinfo],200);
    }


    public function createBusinessAsset(Request $request)
    {  
        $businessassets = $request->input('addmoreasset');
        foreach ($businessassets as $key => $value) {
            $businessasset[] = Emo_asset::create([
                'personal_id' => $request->personal_id,
                'business_id' => $request->business_id,
                'fleet_units' => $value['fleet_units'],
                'fleet_category' => $value['fleet_category'],
                'brand' => $value['brand'],
                'model' => $value['model'],
                'year_of_mfg' => $value['year_of_mfg'],
                'finance' => $value['finance'],
                'insurance_name' => $value['insurance_name'],
                'remarks' => $value['remarks'],
            ]);
            $createFleetTransaction = FleetTransaction::create([
                'asset_id' => $businessasset[$key]['id'],
                'total_fleets' => $value['fleet_units'],
                'available_fleets' => $value['fleet_units']
            ]);
        }
        return $businessasset;
        
    }


    public function readBusinessAsset($id)
    {
        // $readbusinessasset = Emo_asset::where('business_id' , $id)->first();
        // return response()->json(['Asset details of business_id '.$id => $readbusinessasset],200);

        $readbusinessasset[] = Emo_asset::where('personal_id',$id)->get();
        return $readbusinessasset;
    }


    public function updateBusinessAsset(Request $request , $id)
    {
        $updatebusinessasset = Emo_asset::where('business_id' , $id)->first();
        $updatebusinessasset->fleet_units = $request->fleet_units;
        $updatebusinessasset->fleet_category = $request->fleet_category;
        $updatebusinessasset->brand = $request->brand;
        $updatebusinessasset->model = $request->model;
        $updatebusinessasset->year_of_mfg = $request->year_of_mfg;
        $updatebusinessasset->finance = $request->finance;
        $updatebusinessasset->insurance_name = $request->insurance_name;
        $updatebusinessasset->remarks = $request->remarks;
        $updatebusinessasset->save();

        return response()->json(['Updated Asset for business_id '.$id => $updatebusinessasset],200);         
    }


    public function deleteBusinessAsset($id)
    {
        $deletebusinessasset = Emo_asset::where('business_id' , $id)->delete();
        return response()->json(['Asset of business_id: '.$id.' deleted successfully'],200);
    }
    
}
