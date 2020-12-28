<?php

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
    return 'success';
});

$router->post('upload','UploadfileController@UploadFile');
$router->post('updateuploadfile/{id}','UploadfileController@fileupdate');

//login
$router->group(['middleware' => 'auth'], function($router){
    $router->post('/login','LoginController@allowlogin');
 //check login
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
    $router->post('businessinfo/{id}','BusinessController@createBusinessdetails');
    $router->post('createandupdatebusinessinfo/{id}','BusinessController@CreateOrUpdateBusiness');
    $router->post('affiliateinfo/{id}','AffiliateController@createAffiliateinfo'); 
    $router->post('bankinfo/{id}','BankController@createCustomerBankInfo');
    $router->post('assetinfo','AssetController@createBusinessAsset');   //add fleet
});


$router->group(['prefix' => 'read'], function ($router) {

    $router->get('customerinfo/{id}','PersonalinfoController@readCustomerinfo');
    $router->get('businessinfo/{id}','BusinessController@readBusinessdetails');
    $router->get('getBusiness/{id}','BusinessController@getBusiness');
    $router->get('affiliateinfo/{id}','AffiliateController@readAffiliate');
    $router->get('bankinfo/{id}','BankController@readCustomerBankInfo');
    $router->get('getbank/{id}','BankController@getBank');
    $router->get('assetinfo/{id}','AssetController@readBusinessAsset');
});


$router->group(['prefix' => 'update'], function ($router) {

    $router->put('customerinfo/{id}','PersonalinfoController@updateCustomerinfo');
    $router->put('businessinfo/{id}','BusinessController@updateBusiness');
    $router->put('affiliateinfo/{id}','AffiliateController@updateAffiliate'); 
    $router->put('bankinfo','BankController@updateBankInfo');
    $router->put('assetinfo/{id}','AssetController@updateBusinessAsset');   //update fleet 
});


$router->group(['prefix' => 'delete'], function ($router) {

    $router->delete('customerinfo/{id}','PersonalinfoController@deleteCustomerinfo');
    $router->delete('businessinfo/{id}','BusinessController@deleteBusiness');
    $router->delete('affiliateinfo/{id}','AffiliateController@deleteAffiliate');
    $router->delete('bankinfo/{id}','BankController@deleteBankInfo'); 
    $router->delete('assetinfo/{id}','AssetController@deleteBusinessAsset');  //delete fleet 
});
$router->get('assetGet/{id}','BusinessController@readBusiness');
$router->get('fleetGet/{id}','AssetController@readAsset');
$router->post('guzzle','UploadfileController@guzzletry');
$router->get('bankbusiness/{id}','BusinessController@joinbusiness');
$router->post('upload/{id}','UploadfileController@UploadFile');     //post profile
$router->post('fileupdate/{id}','UploadfileController@fileupdate');   //update profile
$router->get('fleetinfo/{id}','AssetController@FleetInformation');
//trail
$router->get('fleet/{id}','AssetController@fleet');

//post
$router->post('formOne','RegistrationFormController@formOne');      //reg 1 post 
$router->post('formTwo/{id}','RegistrationFormController@formTwo');  //reg 2 post
//view
$router->get('viewpage/{id}','ViewGuzzleController@viewPage');      //reg 1 view  
$router->get('patchvalueBuisness/{id}','ViewGuzzleController@patchView'); 
//update
$router->post('updatepage/{id}','UpdateGuzzleController@updatePage');  //reg 1 update
$router->put('EditBuisness/{id}','UpdateGuzzleController@EditBuisnessTwo');
//login
$router->post('useraccess','userloginController@access');                 // reg 1 login
//fleet
$router->get('fleetpatch/{id}','AssetController@patchfleet');          //get fleet value
$router->get('fleet','AssetController@getcategory');                  //fleet category
$router->get('getassetinfi/{id}','AssetController@getFleetInformation');  

//upload file
$router->post('file/{id}','UploadGuzzleController@guzzletry');
$router->post('updatefile/{id}','UploadGuzzleController@updateguzzletry');

//..............................................................................
$router->get('userdetail','userloginController@userdetails'); 
//...........................inventry...........................................
$router->get('getbrand','InventoryController@GetBrand');
$router->get('getcategory','InventoryController@GetCategory');
$router->get('getbrandname','InventoryController@getBrandName');
$router->post('getprodcode','InventoryController@getProductCode');
$router->get('getsep/{id}','InventoryController@getSeparateCategory');
$router->post('addbrand','InventoryController@AddBrand');
$router->post('addcategory','InventoryController@AddCategory');
$router->post('addproduct','InventoryController@AddProduct');