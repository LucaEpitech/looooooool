<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    //
    function list()
   {
       return User::all();
   }
 
   


function update(Request $req)
{
    $products= User::find($req->id);
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
    $products= User::find($id);
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
    return User::where("name","like","%".$name."%")->get();
}

  

}
