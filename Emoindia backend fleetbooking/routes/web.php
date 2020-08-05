<?php
use Illuminate\Http\Request;

use App\Emo_asset;
use App\Emo_business;
use App\FleetTransaction;
/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('uploadfile','UploadfileController@UploadFile');
$router->post('updateuploadfile/{id}','UploadfileController@fileupdate');

//login
$router->group(['middleware' => 'auth'], function($router){
$router->post('/login','LoginController@allowlogin'); //check login
});
$router->post('/createadmin','LoginController@createadmin'); //create new admin



$router->group(['prefix' => 'index'], function ($router) {

    $router->get('allcustomerinfo','PersonalinfoController@index');
    $router->get('allbusinessinfo','BusinessController@index');
    $router->get('allaffiliateinfo','AffiliateController@index');
    $router->get('allbankinfo','BankController@index');
    $router->get('allassetinfo','AssetController@index');   
});


$router->group(['prefix' => 'create'], function ($router) {

    $router->post('customerinfo','PersonalinfoController@createCustomerinfo');
    $router->post('businessinfo','BusinessController@createBusinessdetails');
    $router->post('createandupdatebusinessinfo/{id}','BusinessController@CreateOrUpdateBusiness');
    $router->post('affiliateinfo','AffiliateController@createAffiliateinfo'); 
    $router->post('bankinfo','BankController@createCustomerBankInfo');
    $router->post('assetinfo','AssetController@createBusinessAsset');   
});


$router->group(['prefix' => 'read'], function ($router) {

    $router->get('customerinfo/{id}','PersonalinfoController@readCustomerinfo');
    $router->get('businessinfo/{id}','BusinessController@readBusinessdetails');
    $router->get('affiliateinfo/{id}','AffiliateController@readAffiliate');
    $router->get('bankinfo/{id}','BankController@readCustomerBankInfo');
    $router->get('assetinfo/{id}','AssetController@readBusinessAsset');
});


$router->group(['prefix' => 'update'], function ($router) {

    $router->put('customerinfo/{id}','PersonalinfoController@updateCustomerinfo');
    $router->put('businessinfo/{id}','BusinessController@updateBusiness');
    $router->put('affiliateinfo/{id}','AffiliateController@updateAffiliate'); 
    $router->put('bankinfo/{id}','BankController@updateBankInfo');
    $router->put('assetinfo/{id}','AssetController@updateBusinessAsset');   
});


$router->group(['prefix' => 'delete'], function ($router) {

    $router->delete('customerinfo/{id}','PersonalinfoController@deleteCustomerinfo');
    $router->delete('businessinfo/{id}','BusinessController@deleteBusiness');
    $router->delete('affiliateinfo/{id}','AffiliateController@deleteAffiliate');
    $router->delete('bankinfo/{id}','BankController@deleteBankInfo'); 
    $router->delete('assetinfo/{id}','AssetController@deleteBusinessAsset');   
});


$router->post('formOne','RegistrationFormController@formOne');
$router->post('formTwo/{id}','RegistrationFormController@formTwo');
$router->get('viewpage/{id}','RegistrationFormController@viewPage');

$router->post('uploadimage','UploadfileController@guzzletry');
$router->post('updatefileimage/{id}','UploadfileController@updateguzzletry');

$router->get('/readassets','BookingController@sendData'); 
$router->post('/book','BookingController@book');
$router->get('/getbookings/{id}','BookingController@getBookings');


$router->get('trial/{id}','BookingController@trial');







