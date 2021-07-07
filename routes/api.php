<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\DogecClient;

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
    Route::get('/masternodecount', function (Request $request) {
        $client = new DogecClient();
        return $client->getmasternodecount();
    });
    
    Route::get('/moneysupply', function (Request $request) {
        $client = new DogecClient();
        return $client->moneysupply();
    });
    
    Route::get('/difficulty', function (Request $request) {
        $client = new DogecClient();
        return $client->difficulty();
    });
    
    Route::get('/blockcount', function (Request $request) {
        $client = new DogecClient();
        return $client->blockcount();
    });

    Route::get('/proposals', function (Request $request) {
        $client = new DogecClient();
        return $client->getproposals();
    });    
    
    Route::get('/masternodes', function (Request $request) {
        $client = new DogecClient();
        return $client->getmasternodes();
    });    

    Route::get('/masternodes/{filter}', function (Request $request) {
        $client = new DogecClient();
        return $client->getmasternodes($request['filter']);
    });    
});



