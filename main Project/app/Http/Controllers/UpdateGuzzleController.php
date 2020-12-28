<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;
use App\Emo_personalinfo;
use App\Emo_affiliate;
use App\Emo_business;
use App\Emo_bank;
use App\Emo_asset;
use Illuminate\Support\Facades\Validator;

class UpdateGuzzleController extends Controller
{
    public function updatePage(Request $request,$id)
    {
        $title= $request->input('title');
        $fullname= $request->input('fullname');
        $birthDate = $request ->input('birthDate');
        $pan = $request ->input('pan');
        $aadhaar = $request ->input('aadhaar');
        $address1 = $request ->input('address1');
        $address2 = $request ->input('address2');
        $landmark = $request ->input('landmark');
        $city = $request ->input('city');
        $state = $request ->input('state');
        $pincode = $request ->input('pincode');
        $email = $request ->input('email');
        $phoneNumber = $request ->input('phoneNumber');
        $alternatenumber = $request ->input('alternatenumber');
        $insurance_detail = $request ->input('insurance_detail');
        $insurance_name = $request ->input('insurance_name');
        $car_details = $request ->input('car_details');
        $bike_details = $request ->input('bike_details');
        $addmorebusiness = $request ->input('addmore');
        try{   
            $client= new \GuzzleHttp\Client([    
                'base_uri' => 'http://emoindia.com/'
            ]);
            
            $updatepersonalinfo = $client->put('update/customerinfo/'.$id,
            ['form_params' => 
                    [    
                        'headers' => [ 'Content-Type' => 'application/json'],
                        'title'  => $title,'fullname' => $fullname,'birthDate'  => $birthDate,'pan' => $pan,
                        'aadhaar'  => $aadhaar,'address1' => $address1,'address2'  => $address2,'landmark' => $landmark,
                        'city'  => $city,'state' => $state,'pincode'  => $pincode,'email' => $email,
                        'phoneNumber'  => $phoneNumber,'alternatenumber' => $alternatenumber,
                    ],
                ]);
        
    
            $res= $updatepersonalinfo->getBody()->getContents();
            if($request->file('filename') !=null) {
            $file = $request->file('filename');

            $name = time() . '_' . $file->getClientOriginalName();
            $upload = $client->request('POST','fileupdate/'.$id, [
                'multipart' => [           
                       [ 'name'     => 'filename',
                        'contents' => fopen($file,'r'),
                        'filename' => $name                                                                                                                                                                                         
                ]]
            ]);
            
            $res5 = $upload->getBody()->getContents();
                } 


            $updateaffiliateinfo = $client->put('update/affiliateinfo/'.$id,
            ['form_params' => 
            [    
                'headers' => [ 'Content-Type' => 'application/json'],
                'insurance_detail'  => $insurance_detail,'car_details' => $car_details,
                'bike_details'  => $bike_details,'insurance_name'  => $insurance_name,
            ],
        ]);
    
            $res2 = $updateaffiliateinfo->getBody()->getContents();

            $updatebusinessinfo = $client->post('create/createandupdatebusinessinfo/'.$id,
            ['form_params' => 
            [    
                'headers' => [ 'Content-Type' => 'application/json'],
                'addmorebusiness'  => $addmorebusiness
            ],
        ]);
            $res3 = $updatebusinessinfo->getBody()->getContents();

         

            return response()->json([
                'Message'=>'Data Updated'
               
            ],200);
        } catch(ClientErrorResponseException $exception) {

            $responseBody = $exception->getResponse()->getBody(true);
        }
    }

    public function EditBuisnessTwo(Request $request ,$id)
    {
           
            $gst = $request->input('gst');
            $pan = $request->input('pan');
            $it_status = $request->input('it_status');
            $it_others = $request->input('it_others');
            $contactperson = $request->input('contactperson');
            $designation = $request->input('designation');
            $businessAddress1 = $request->input('businessAddress1');
            $businessAddress2 = $request->input('businessAddress2');
            $landmark = $request->input('landmark');
            $City = $request->input('City');
            $State = $request->input('State');
            $pincode = $request->input('pincode');
            $Email = $request->input('Email');
            $PhoneNumber = $request->input('PhoneNumber');
            $Alternatenumber = $request->input('Alternatenumber');
            $bank_name = $request->input('bank_name');
            $branch_name = $request->input('branch_name');
            $account_type = $request->input('account_type');
            $account_no = $request->input('account_no');
            $ifsc_code = $request->input('ifsc_code');
            $od_cc_details = $request->input('od_cc_details');
            $loan_details = $request->input('loan_details');
            $business_id=$request->input('business_id');
             
            try{
                $client= new \GuzzleHttp\Client([    
                    'base_uri' => 'http://emoindia.com/'
                ]);
                
                $addbusinessinfo = $client->put('update/businessinfo/'.$id,
                ['form_params' => 
                    [    
                        'headers' => [ 'Content-Type' => 'application/json'],
                        'gst'  => $gst,
                        'pan'  => $pan,'it_status' => $it_status,'it_others'  => $it_others,'contactperson' => $contactperson,
                        'designation'  => $designation,'businessAddress1' => $businessAddress1,'landmark'  => $landmark,
                        'businessAddress2'  => $businessAddress2,'City' => $City,'State'  => $State,'pincode' => $pincode,
                        'Email'  => $Email,'PhoneNumber' => $PhoneNumber,'Alternatenumber' => $Alternatenumber,
                    ],
                ]);
                $res= $addbusinessinfo->getBody()->getContents();
            
                $addbankinfo = $client->put('update/bankinfo',
                ['form_params' => 
                    [    
                        'headers' => [ 'Content-Type' => 'application/json'],
                        'business_id'  => $business_id,'bank_name'  => $bank_name,'branch_name' => $branch_name,
                        'account_type'  => $account_type,'account_no'  => $account_no,
                        'ifsc_code'  => $ifsc_code,'od_cc_details' => $od_cc_details,'loan_details'  => $loan_details
                    ],
                ]);
                $res2= $addbankinfo->getBody()->getContents();

                    return response()->json([
                        'Businessinfo' => json_decode($res),
                        'Bankinfo' => json_decode($res2),
                    ],201);
                // }
            } catch(ClientErrorResponseException $exception) {

                $responseBody = $exception->getResponse()->getBody(true);
            }   
        // }
    }

}
