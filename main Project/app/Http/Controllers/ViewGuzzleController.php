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
use Illuminate\Support\Arr;


class ViewGuzzleController extends Controller
{
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
                'base_uri' => 'http://emoindia.com/'
            ]);
            
            $readbusinessinfo = $client->get('read/businessinfo/'.$id);
            $res3 = $readbusinessinfo->getBody()->getContents();
            $decode_res3 =json_decode($res3);
            $id = $decode_res3[0]->personal_id;
        
        
            $readpersonalinfo = $client->get('read/customerinfo/'.$id);
            $res= $readpersonalinfo->getBody()->getContents();

            $readaffiliateinfo = $client->get('read/affiliateinfo/'.$id);
            $res2 = $readaffiliateinfo->getBody()->getContents();

            $readbankinfo = $client->get('read/bankinfo/'.$id);
            $res4 = $readbankinfo->getBody()->getContents();

            $readassetinfo = $client->get('fleetinfo/'.$id);
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

    public function patchView($id)
    {
        try{   
            $client= new \GuzzleHttp\Client([    
                'base_uri' => 'http://emoindia.com/'
            ]);
            
            $readbusiness = $client->get('read/getBusiness/'.$id);
            $res= $readbusiness->getBody()->getContents();

            $readbank = $client->get('read/getbank/'.$id);
            $res2 = $readbank->getBody()->getContents();

             return response()->json([
                'businessvalue' => json_decode($res),
                 'bankvalue' => json_decode($res2),
            ],200);
        } catch(ClientErrorResponseException $exception) {

            $responseBody = $exception->getResponse()->getBody(true);
        }
    }

}
