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


/**
     * @OA\Info(
     *   title="EmoIndia",
     *   version="1.0",
     *   @OA\Contact(
     *     email="support@emoindia.com",
     *     name="Support Team"
     *   )
     * )
     */
class RegistrationFormController extends Controller
{    
    /**
    * @OA\post(
    *     path="/formOne",
    *     operationId="/formOne",
    *     tags={"Emo_registration"},
    *    @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/FormOne")
    *      ),
    *  @OA\Response(
    *         response="200",
    *         description="Success",
    *         @OA\JsonContent()
    *     ),
    *     @OA\Response(
    *         response="400",
    *         description="Error: Bad request.",
    *     ),
    * )
    */
    public function formOne(Request $request)
    {
        $data = $request->all();
        $validatepersonalinfo = Validator::make($data,Emo_personalinfo::$rules); 
        $validateaffiliateinfo = Validator::make($data,Emo_affiliate::$rules); 
            foreach($request->input('addmorebusiness') as $key => $value) {
                $businessdata[] = $value; 
            $validatebusinessinfo = Validator::make($businessdata,Emo_business::$rules);
            }
        
        if($validatepersonalinfo->fails()||$validateaffiliateinfo->fails() || $validatebusinessinfo->fails()) { 
            $error1 = $validatepersonalinfo->errors();
            $error2 = $validateaffiliateinfo->errors();
            $error3 = $validatebusinessinfo->errors();
            return response()->json([
                'error message' => array($error1,$error2, $error3)
            ],400);
        } else {
        
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
            $addmorebusiness = $request ->input('addmorebusiness');

            try{
                $client= new \GuzzleHttp\Client([    
                'base_uri' => 'http://emoindia:3000/'
                ]);

                $personalinfo = $client->post('create/customerinfo',
                ['form_params' => 
                    [    
                        'headers' => [ 'Content-Type' => 'application/json'],
                        'title'  => $title,'fullname' => $fullname,'birthDate'  => $birthDate,'pan' => $pan,
                        'aadhaar'  => $aadhaar,'address1' => $address1,'address2'  => $address2,'landmark' => $landmark,
                        'city'  => $city,'state' => $state,'pincode'  => $pincode,'email' => $email,
                        'phoneNumber'  => $phoneNumber,'alternatenumber' => $alternatenumber,
                    ],
                ]);
                $res= $personalinfo->getBody()->getContents();   
                $personal_id = json_decode($res)->id; 

                $affiliateinfo = $client->post('create/affiliateinfo',

                ['form_params' => 
                    [    
                        'headers' => [ 'Content-Type' => 'application/json'],
                        'personal_id'=> $personal_id,
                        'insurance_detail'  => $insurance_detail,'car_details' => $car_details,
                        'bike_details'  => $bike_details,'insurance_name'  => $insurance_name,
                    ],
                ]);
                $res2 = $affiliateinfo->getBody()->getContents();
                        
                  
                $businessinfo = $client->post('create/businessinfo',
                ['form_params' => 
                    [    
                        'headers' => [ 'Content-Type' => 'application/json'],
                        'personal_id'=> $personal_id,
                        'addmorebusiness'  => $addmorebusiness
                    ],
                ]);
            
                $res3 = $businessinfo->getBody()->getContents();

                return response()->json([
                    'personalinfo' => json_decode($res),
                    'affiliateinfo' => json_decode($res2),
                    'businessinfo' => json_decode($res3)
                ],201);
                
            } catch (ClientErrorResponseException $exception) {

                $responseBody = $exception->getResponse()->getBody(true);
            }
        } 
    }

     /**
    * @OA\post(
    *     path="/formTwo/{id}",
    *     operationId="/formTwo/{id}",
    *     tags={"Emo_registration"},
    *     @OA\Parameter(
    *         name="id",
    *         in="path",
    *         description="Some optional other parameter",
    *         required=false,
    *         @OA\Schema(type="integer")
    *     ),
    *     @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/FormTwo")
    *      ),
    *     @OA\Response(
    *         response="200",
    *         description="Success",
    *         @OA\JsonContent()
    *     ),
    *     @OA\Response(
    *         response="400",
    *         description="Error: Bad request",
    *     ),
    * )
    */
    public function formTwo(Request $request ,$id)
    {
        $data = $request->all();
        $validatebusinessinfo = Validator::make($data,Emo_business::$rules1); 
        $validatebankinfo = Validator::make($data,Emo_bank::$rules); 

        if($validatebusinessinfo->fails() || $validatebankinfo ->fails()) { 
            $error1 = $validatebusinessinfo->errors();
            $error2 = $validatebankinfo->errors();
            return response()->json([
                'error message' => array($error1,$error2)
            ],400);
        } else {
   
            $businessName = $request->input('businessName');
            $gst = $request->input('gst');
            $pan = $request->input('pan');
            $it_status = $request->input('it_status');
            $it_others = $request->input('it_others');
            $contact_person = $request->input('contact_person');
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
            $addmoreasset = $request->input('addmoreasset');
           
            try{
                $client= new \GuzzleHttp\Client([    
                    'base_uri' => 'http://emoindia:3000/'
                ]);
                
                $addbusinessinfo = $client->put('update/businessinfo/'.$id,
                ['form_params' => 
                    [    
                        'headers' => [ 'Content-Type' => 'application/json'],
                        'businessName'  => $businessName,
                        'pan'  => $pan,'it_status' => $it_status,'it_others'  => $it_others,'contact_person' => $contact_person,
                        'designation'  => $designation,'businessAddress1' => $businessAddress1,'landmark'  => $landmark,
                        'businessAddress2'  => $businessAddress2,'City' => $City,'State'  => $State,'pincode' => $pincode,
                        'Email'  => $Email,'PhoneNumber' => $PhoneNumber,'Alternatenumber' => $Alternatenumber,
                    ],
                ]);
                $res= $addbusinessinfo->getBody()->getContents();
                $business_id = json_decode($res)->id;    

                $addbankinfo = $client->post('create/bankinfo',
                ['form_params' => 
                    [    
                        'headers' => [ 'Content-Type' => 'application/json'],
                        'personal_id'  => $id,'business_id'  => $business_id,'bank_name'  => $bank_name,'branch_name' => $branch_name,
                        'account_type'  => $account_type,'account_no'  => $account_no,
                        'ifsc_code'  => $ifsc_code,'od_cc_details' => $od_cc_details,'loan_details'  => $loan_details
                    ],
                ]);
                $res2= $addbankinfo->getBody()->getContents();

                if($request->has('addmoreasset')) {
                    foreach($addmoreasset as $key => $value){
                        $data[] = $value;
                        // dd($data);
                    $validator = Validator::make($data['addmoreasset'],Emo_asset::$rules);
                    }
                    if ($validator->fails()) {
                      return response()->json(['error' => $validator->errors()->first()]);

                    } else {
                 
                        $addassetinfo = $client->post('create/assetinfo',
                        ['form_params' => 
                            [    
                                'headers' => [ 'Content-Type' => 'application/json'],
                                'personal_id'  => $id,'business_id'  => $business_id,
                                'addmoreasset' => $addmoreasset
                            ],
                        ]);
                        $res3= $addassetinfo->getBody()->getContents();
                        return response()->json([
                            'Businessinfo' => json_decode($res),
                            'Bankinfo' => json_decode($res2),
                            'Assetinfo' => json_decode($res3)
                        ],201);
                    }
                } else {
                    return response()->json([
                        'Businessinfo' => json_decode($res),
                        'Bankinfo' => json_decode($res2),
                    ],201);
                }
            } catch(ClientErrorResponseException $exception) {

                $responseBody = $exception->getResponse()->getBody(true);
            }   
        }
    }

      /**
         * @OA\get(
         *     path="/viewpage/{id}",
         *     operationId="/viewpage/{id}",
         *     tags={"Emo_registration"},
         *    
         *     @OA\Parameter(
         *         name="id",
         *         in="path",
         *         description="Some optional other parameter",
         *         required=true,
         *         @OA\Schema(type="integer")
         *     ),
         *     @OA\Response(
         *         response="200",
         *         description="success",
         *         @OA\JsonContent()
         *     ),
         *     @OA\Response(
         *         response="400",
         *         description="Error: Bad request. .",
         *     ),
         * )
         */
    public function viewPage($id)
    {
        try{   
            $client= new \GuzzleHttp\Client([    
                'base_uri' => 'http://emoindia:3000/'
            ]);
            
            $readpersonalinfo = $client->get('read/customerinfo/'.$id);
            $res= $readpersonalinfo->getBody()->getContents();

            $readaffiliateinfo = $client->get('read/affiliateinfo/'.$id);
            $res2 = $readaffiliateinfo->getBody()->getContents();

            $readbusinessinfo = $client->get('read/businessinfo/'.$id);
            $res3 = $readbusinessinfo->getBody()->getContents();

            $readbankinfo = $client->get('read/bankinfo/'.$id);
            $res4 = $readbankinfo->getBody()->getContents();

            $readassetinfo = $client->get('read/assetinfo/'.$id);
            $res5 = $readassetinfo->getBody()->getContents();

            return response()->json([
                'personalinfo' => json_decode($res),
                'affiliateinfo' => json_decode($res2),
                'businessinfo' => json_decode($res3),
                'bankinfo' => json_decode($res4),
                'assetinfo' =>json_decode($res5)
            ],200);
        } catch(ClientErrorResponseException $exception) {

            $responseBody = $exception->getResponse()->getBody(true);
        }
    }


}