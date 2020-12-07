<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_Category;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
   function list()
   {
       return Product::all();
   }
 
   
function add(Request $req)
{
    $products= new Product;
    $products->name=$req->input('name'); 
    $products->description=$req->input('description');
    $products->image=$req->input('image');
    $products->prix=$req->input('prix');
    $products->stock=$req->input('stock');
    $result=$products->save();
   
    $prodcat= new Product_Category;
    $prodcat->product_id=$products->id;
    $prodcat->category_id=$req->input('cat_id');
    $result=$prodcat->save();
 
    if($result)
    {
    return ["Result"=>"Data has been saved"];
    }
    else
    {
        return ["Result"=>"operation failed"];
    }
}
function update(Request $req)
{
    $products= Product::find($req->id);
    $products->name=$req->input('name'); 
    $products->description=$req->input('description');
    $products->image=$req->input('image');
    $products->prix=$req->input('prix');
    $products->stock=$req->input('stock');
 
    $result=$products->save();
    if($result)
    {
        return ["Result"=>"Data has been updated"];
    }
    else
    {
        return ["Result"=>"updated operation has been failed"];
    }
}
function delete($id)
{
    $products= Product::find($id);
    $result=$products->delete();
    if($result)
    {
    return ["Result"=>"Data has been updated"];
    }
    else
    {
        return ["Result"=>"delete operation has been failed"];
    }
}
function search($name)
{
    return Product::where("name","like","%".$name."%")->get();
}
function testData(Request $req)
{
    $rules=array(
        "member_id"=>"required|min:2|max:4"
    );
    $validator= Validator::make($req->all(),$rules);
    if($validator->fails())
    {
        return response()->json($validator->errors(),401);
    }
    else
    {
    $products= new Product;
    $products->name=$req->input('name'); 
    $products->description=$req->input('description');
    $products->image=$req->input('image');
    $products->prix=$req->input('prix');
    $products->stock=$req->input('stock');
 
    $result=$products->save();
    if($result)
    {
    return ["Result"=>"Data has been saved"];
    }
    else
    {
        return ["Result"=>"operation failed"];
    }
 
    }
}
}

