<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'index']);
Route::prefix('users')->group(function () {
    Route::get('/',[UserController::class,'index']);
});
Route::prefix('api')->group(function () {
    Route::prefix('user')->group(function (){
        Route::fallback(function () {
            return "You cannot get a user like this !";
        });

        Route::get('/',function () {
            global $users;
            return $users;
        });

        Route::get('/{index}',[UserController::class,'getUserByIndex'])
        ->where('index','[0-9]+');   

        Route::get('/{name}',[UserController::class,'getUserByName'])
        ->where('name','[a-zA-Z]+'); 

        Route::get('/{UserIndex}/post/{postIndex}',[UserController::class,'getPostByUser'])
        ->where(['index' => '[0-9]+', 'postIndex' => '[0-9]+']);
        
    });
    
});