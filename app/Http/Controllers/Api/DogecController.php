<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\DogecClient;

class DogecController extends ApiController
{
    public function masternodecount()
    {
        try{
            $client = new DogecClient();
            $response = $client->getmasternodecount();
            return $this->successResponse($response);
        }
        catch(\Throwable $e)
        {
            return $this->errorResponse(400, $e->getMessage());
        }
        
    }

    public function moneysupply()
    {
        try{
            $client = new DogecClient();
            $response = $client->moneysupply();
            return $this->successResponse($response);
        }
        catch(\Throwable $e)
        {
            return $this->errorResponse(400, $e->getMessage());
        }
    }

    public function difficulty()
    {
        try{
            $client = new DogecClient();
            $response = $client->difficulty();
            return $this->successResponse($response);
        }
        catch(\Throwable $e)
        {
            return $this->errorResponse(400, $e->getMessage());
        }
    }

    public function blockcount()
    {
        try{
            $client = new DogecClient();
            $response = $client->blockcount();
            return $this->successResponse($response);
        }
        catch(\Throwable $e)
        {
            return $this->errorResponse(400, $e->getMessage());
        }
    }

    public function proposals()
    {
        try{
            $client = new DogecClient();
            $response = $client->getproposals();
            return $this->successResponse($response);
        }
        catch(\Throwable $e)
        {
            return $this->errorResponse(400, $e->getMessage());
        }
    }

    public function masternodes()
    {
        try{
            $client = new DogecClient();
            $response = $client->getmasternodes();
            return $this->successResponse($response);
        }
        catch(\Throwable $e)
        {
            return $this->errorResponse(400, $e->getMessage());
        }
    }

    public function masternode(Request $request)
    {
        try{
            $client = new DogecClient();
            $response = $client->getmasternodes($request['filter']);
            return $this->successResponse($response);
        }
        catch(\Throwable $e)
        {
            return $this->errorResponse(400, $e->getMessage());
        }
    }

    public function peers()
    {
        try{
            $client = new DogecClient();
            $response = $client->getpeers();
            return $this->successResponse($response);
        }
        catch(\Throwable $e)
        {
            return $this->errorResponse(400, $e->getMessage());
        }
    }
}
