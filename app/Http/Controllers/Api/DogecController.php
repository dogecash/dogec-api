<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DogecClient;

class DogecController extends Controller
{
    public function masternodecount()
    {
        $client = new DogecClient();
        return $client->getmasternodecount();
    }

    public function moneysupply()
    {
        $client = new DogecClient();
        return $client->moneysupply();
    }

    public function difficulty()
    {
        $client = new DogecClient();
        return $client->moneysupply();
    }

    public function blockcount()
    {
        $client = new DogecClient();
        return $client->blockcount();
    }

    public function proposals()
    {
        $client = new DogecClient();
        return $client->getproposals();
    }

    public function masternodes()
    {
        $client = new DogecClient();
        return $client->getmasternodes();
    }

    public function masternode(Request $request)
    {
        $client = new DogecClient();
        return $client->getmasternodes($request['filter']);
    }

    public function peers()
    {
        $client = new DogecClient();
        return $client->getpeers();
    }
}
