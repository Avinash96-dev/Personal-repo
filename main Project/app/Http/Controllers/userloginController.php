<?php

namespace App\Http\Controllers;
use DB;
use App\Userlogin;

use Illuminate\Http\Request;

class userloginController extends Controller
{
      public function access(Request $request)
      {
        $name = $request->input('name');
        $password= $request->input('password');

        $check = DB::select("select name,email,password,Role_id  from userlogins where (name='$name' or email='$name')   and password='$password'");
        if(count($check)){
            return response()->json(['data'=>$check[0]->Role_id,'message'=>'Login Success'],200);
         }
        else{
            return response()->json(['message'=>'login denied'],401);
         }
      }

      // $data = Userlogin::all();
      // return $data ;
      
}

