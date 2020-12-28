<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class InventoryController extends Controller
{
    public function GetBrand(Request $request)
    {
     $brand=\App\Brand::all();
       return $brand;
    }

    public function GetCategory(Request $request)
    {
     $Category=\App\Category::all();
       return $Category;
    }

     public function getSeparateCategory($id)
    { 
        $getAllAsset = \App\Products::where('Product_brand_id',$id)->get();
        $fleetNameAttached = [];
        foreach($getAllAsset as $key =>$value) {
            $getFleetId = $value['Product_category_id'];
            $getFleetName = \App\Category::where('Category_id',$getFleetId)->get('Caetegory_name');
            $value['Category_name'] = $getFleetName[0]['Caetegory_name'];
            $fleetNameAttached[] = $value;
        }
        return response()->json(['categoryget'=>$fleetNameAttached ]);

    }

    public function getProductCode(Request $request)
    {
        $brand = $request->input('brand');
        $category = $request->input('category');
        $Getproductcode = \App\Products::where('Product_brand_id',$brand )->where('Product_category_id',$category)->get();
        return $Getproductcode;
    }
    public function getBrandName(Request $request)
    {
        $getAllAsset = \App\Products::all();
        $fleetNameAttached = [];
        foreach($getAllAsset as $key =>$value) {
            $getBrandId= $value['Product_brand_id'];
            $getFleetName = \App\Brand::where('Brand_id',$getBrandId)->get('Brand_name');
            $value['Brand_name'] = $getFleetName[0]['Brand_name'];
            $getCategoryId= $value['Product_category_id'];
            $getCategoryName = \App\Category::where('Category_id',$getCategoryId)->get('Caetegory_name');
            $value['Caetegory_name'] = $getCategoryName[0]['Caetegory_name'];
            $fleetNameAttached[] = $value;
        }
        return response()->json(['products'=>$fleetNameAttached ]);  
    }
    public function AddBrand(Request $request)
    {
        $addBrand = \App\Brand::create([
            'Brand_name' => $request->brand,
            'Brand_id' => $request->brandcode,
            ]);
        return $addBrand;
    }

    public function AddCategory(Request $request)
    { 
        $addBrand = \App\Category::create([
            'Caetegory_name' => $request->category,
            'Category_id' => $request->categoryCode,
            ]);
         return $addBrand;
        
    }
    public function AddProduct(Request $request)
    {
        $brand= $request->input('brand');
        $getBrandId=\App\Brand::where('Brand_name',$brand)->get('Brand_id');
        $addproduct = \App\Products::create([
            'Product_brand_id' => $getBrandId[0]->Brand_id,
            'Product_category_id' => $request->category,
            'Product_id' => $request->productcode,
            'Product_name' => $request->productname,
            ]);
        return $addproduct;
    }
}
