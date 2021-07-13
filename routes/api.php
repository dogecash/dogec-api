<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix("/v1")->group(function(){

    Route::prefix("/network")->group(function(){
        Route::get('/masternodecount', [App\Http\Controllers\Api\DogecController::class, 'masternodecount']);
    
        Route::get('/moneysupply', [App\Http\Controllers\Api\DogecController::class, 'moneysupply']);
        
        Route::get('/difficulty', [App\Http\Controllers\Api\DogecController::class, 'difficulty']);
        
        Route::get('/blockcount', [App\Http\Controllers\Api\DogecController::class, 'blockcount']);

        Route::get('/proposals', [App\Http\Controllers\Api\DogecController::class, 'proposals']);    
        
        Route::get('/masternodes', [App\Http\Controllers\Api\DogecController::class, 'masternodes']);    

        Route::get('/masternodes/{filter}', [App\Http\Controllers\Api\DogecController::class, 'masternode']);  
        
        Route::get('/peers', [App\Http\Controllers\Api\DogecController::class, 'peers']); 
    });

    Route::get('/wallet/latest', [App\Http\Controllers\Api\ReleaseController::class, 'latestRelease']);

    Route::get('/stats', [App\Http\Controllers\Api\StatsController::class, 'stats']); 

    Route::get('/announcements', [App\Http\Controllers\Api\AnnouncementsController::class, 'announcements']); 
});



