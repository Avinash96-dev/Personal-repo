<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Emo_asset;
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
       

        $businessassets = Emo_asset::create([
            'personal_id' => $request->personal_id,
            'business_id' => $request->business_id,
            'fleet_category' => $request->fleet_category,
            'brand' => $request->brand,
            'model' => $request->model,
            'year_of_mfg' => $request->year_of_mfg,
            'finance' => $request->finance,
            'insurance_name' => $request->insurance_name,
            'remarks' => $request->remarks,
           
        ]);
        return $businessassets;
        
    }


    public function readBusinessAsset($id,Request $request)
    {
        $personal_id = $request->input('personal_id');
        $readbusinessasset[] = Emo_asset::where('personal_id',$id)->get();
        return $readbusinessasset;
        
    }
   
  


    public function updateBusinessAsset(Request $request , $id)
    {
        $updatebusinessasset = Emo_asset::where('id', $id)->first();
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
        $deletebusinessasset = Emo_asset::where('id' , $id)->delete();
        return response()->json([ 'deleted successfully'],200);
    }

    public function getcategory(Request $request)
    {
        $Category=DB::select("select * from fleetcategory");
        return response()->json(['category'=>$Category],200);
    }

    public function patchfleet($id)
    {
        $patchfleet=Emo_asset::where('id',$id)->get();
        return response()->json(['fleetget'=>$patchfleet]);
    }
    
    public function getFleetInformation($id)
    { 
        $getAllAsset = \App\Emo_asset::where('business_id',$id)->get();
        $fleetNameAttached = [];
        foreach($getAllAsset as $key =>$value) {
            $getFleetId = $value['fleet_category'];
            $getFleetName = \App\Fleetcategory::where('id',$getFleetId)->get('fleetcategory');
            $value['FleetName'] = $getFleetName[0]['fleetcategory'];
            $fleetNameAttached[] = $value;
        }
        return response()->json(['fleetget'=>$fleetNameAttached ]);

    }

    public function FleetInformation($id)
    { 

        $getBusinessId = \App\ Emo_business::where('personal_id',$id)-> get('id');
        $final = [];
        foreach($getBusinessId as $keypair => $valuepair){
            $getAllAsset = \App\Emo_asset::where('business_id',$valuepair['id'])->get();
            $fleetNameAttached = [];
            foreach($getAllAsset as $key =>$value) {
                $getFleetId = $value['fleet_category'];
                $getFleetName = \App\Fleetcategory::where('id',$getFleetId)->get('fleetcategory');
                $value['FleetName'] = $getFleetName[0]['fleetcategory'];
                $fleetNameAttached[] = $value;
        }
        $final[]= $fleetNameAttached;
    } 
        return response()->json(['fleetget'=>$final ]);
    }

   

    public function Fleet($id)
    {
        
         $fleetcategory = DB::table('fleetcategory as cat')->get();
         $fleetInformation = [];
        $i = 0;
        foreach ($fleetcategory  as $cat) {
            $fleetInformationData  = array();
            $fleetInformationData  =   DB::table('emo_assets as fllet')
                ->select('fllet.id', 'fllet.business_id','fllet.fleet_category','fllet.brand', 'fllet.model', 'fllet.year_of_mfg', 'fllet.finance', 'fllet.insurance_name', 'fllet.remarks')
                ->distinct('fllet.id')
                ->leftJoin('fleetcategory as flletcat', 'fllet.fleet_category', '=',  'flletcat.id')
                ->where('fllet.personal_id', $id)
                ->where('fllet.fleet_category', $cat->id)
                ->get();
            if (!$fleetInformationData->isEmpty()) {
                $fleetInformation[$i]['name'] = $cat->fleetcategory;
                $fleetInformation[$i]['id'] = $cat->id;
                $fleetInformation[$i]['data'] = $fleetInformationData;
                $fleetInformation[$i]['business_id'] = $fleetInformationData[0]->business_id;
                $i++;   
            }
        }
        return $fleetInformation;
        
    }
  
    

}
