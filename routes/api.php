<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function (){

    Route::post('register',[\App\Http\Controllers\UserController::class,'register'])->name('auth.register');
    Route::post('login',[\App\Http\Controllers\UserController::class,'login'])->name('auth.login');



});


Route::group(['middleware' => "auth:api", "prefix" => "admin"], function () {


    Route::apiResource('brands', \App\Http\Controllers\BrandController::class)->middleware("generate_fetch_query_params");
    Route::apiResource('categories',\App\Http\Controllers\CategoryController::class)->middleware("generate_fetch_query_params");
    Route::apiResource('products', \App\Http\Controllers\ProductController::class)->middleware("generate_fetch_query_params");
    Route::prefix('products')->as('products.')->group(function () {
        Route::get('change/activation/{product}',[\App\Http\Controllers\ProductController::class,'change_activation'])->name('change_activation');
    });
});

Route::group(['middleware' => "auth:api"], function () {

    //Route::get();
});

?>
