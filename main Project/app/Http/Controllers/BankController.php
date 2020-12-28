<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emo_bank;

class BankController extends Controller
{
    public function index()
    {
        $allBankData = Emo_bank::all();
        return response()->json(['All Bank details:' => $allBankData],200);
    }


    public function createCustomerBankInfo(Request $request,$id)
    {

        $businessBank= Emo_bank::create([            
            'personal_id'=>$id,
            'business_id'=>$request->business_id,
            'bank_name'=>$request->bank_name,  
            'branch_name'=>$request->branch_name,  
            'account_type'=>$request->account_type,  
            'account_no'=>$request->account_no,  
            'ifsc_code'=>$request->ifsc_code,  
            'od_cc_details'=>$request->od_cc_details,  
            'loan_details'=>$request->loan_details
        ]);
        return $businessBank;
    }


    public function readCustomerBankInfo($id,Request $request)
    {
        
        $getBusinessId = \App\ Emo_business::where('personal_id',$id)-> get('id');
        $final = [];
        foreach($getBusinessId as $keypair => $valuepair){
            $getAllBank = \App\Emo_bank::where('business_id',$valuepair['id'])->get();
            $BankArray = [];
            foreach($getAllBank as $key =>$value) {
               $BankArray[] = $value;
            }
            $final[]= $BankArray;
        }
        return $final;
    }

    public function getBank($id)
    {
        $bankvalue=emo_bank::where('business_id',$id)->get();
        return $bankvalue;
    }




    public function updateBankInfo(Request $request)
    {   
       
        $business_id= $request->input('business_id');
        $updatebankinfo = Emo_bank::where('business_id', $business_id)->first();
        $updatebankinfo->bank_name = $request->bank_name;
        $updatebankinfo->branch_name = $request->branch_name;
        $updatebankinfo->account_type = $request->account_type;
        $updatebankinfo->account_no = $request->account_no;
        $updatebankinfo->ifsc_code = $request->ifsc_code;
        $updatebankinfo->od_cc_details = $request->od_cc_details;
        $updatebankinfo->loan_details = $request->loan_details;
        $updatebankinfo->save();

        return response()->json(['Updated Bank Details' => $updatebankinfo],200); 
    }


    public function deleteBankInfo($id)
    {
        $deletebankinfo = Emo_bank::where('business_id', $id)->delete();
        return response()->json(['Bank details deleted succesfully'],200);
    }
}
