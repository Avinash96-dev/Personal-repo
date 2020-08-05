<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;


class LoginController extends Controller
{
 

    //create new admin
    public function createadmin(Request $request) 
    {
        $request['api_token'] = Str::random(60);
        $createAdmin =Login::create([
            'name'=>$request->name,    
            'email'=>$request->email,    
            'password'=>$request->password,
            'api_token'=>$request->api_token 
        ]);
        return response()->json($createAdmin,201);
    }
    



     //checklogin
    public function allowlogin(Request $request)  
    {
        $name = $request->input('name');
        $password= $request->input('password');

        $check = DB::select("select name,email,password,api_token from users where (name='$name' or email='$name')   and password='$password'");
        if(count($check)){
            return response()->json(['data'=>$check,'message'=>'Login Success'],200);
         }
        else{
            return response()->json(['message'=>'Login denied'],401);
         }

    }
   

    public function createFleetLogin()
    {
        $name = $request->input('name');
        $password= $request->input('password');

        $check = DB::select("select name,email,password  from users where (name='$name' or email='$name')   and password='$password'");
        if(count($check)){
            return response()->json(['data'=>$check,'message'=>'Login Success'],200);
         }
        else{
            return response()->json(['message'=>'Login denied'],401);
         }
    
    }
}

    