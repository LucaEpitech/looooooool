<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's

    });


Route::get("produits",[ProductController::class,'list']);
 
Route::post("produit",[ProductController::class,'add']);
 
Route::put("produit",[ProductController::class,'update']);
 
Route::delete("produit",[ProductController::class,'delete']);
 
Route::get("produit/{name}",[ProductController::class,'search']);
 
Route::post("categorie",[CategoryController::class,'add']);

Route::post("users",[UserController::class,'list']);
 
 
//auth
Route::post("save",[ProductController::class,'testData']);



//Oauth2
Route::post("register",[AuthController::class,'register']);
Route::post("login",[AuthController::class,'login']);