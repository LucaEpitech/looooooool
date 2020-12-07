<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function add(Request $req)
    {
   
            $categories= new Category;
            $categories->name=$req->name;
            $result=$categories->save();
        
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
