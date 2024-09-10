<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function (){

    Route::post('register',[\App\Http\Controllers\UserController::class,'register'])->name('auth.register');
    Route::post('login',[\App\Http\Controllers\UserController::class,'login'])->name('auth.login');



});

Route::group(['middleware' => "auth:api", "prefix" => "admin"], function () {

    Route::apiResource('brands', \App\Http\Controllers\BrandController::class);
    Route::apiResource('categories',\App\Http\Controllers\CategoryController::class);
    Route::apiResource('products', \App\Http\Controllers\ProductController::class);

});


?>
