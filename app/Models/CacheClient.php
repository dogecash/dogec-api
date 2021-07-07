<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cache;

class CacheClient extends Model
{
    public function saveCache($name, $value, $seconds = 600)
    {
        try{
            Cache::forever($name, $value, $seconds);
            return true;
        }
        catch(\Throable $e)
        {
            throw $e;
        }
    }

    public static function getCache($name)
    {
        try{
            return Cache::get($name);
        }
        catch(\Throable $e)
        {
            throw $e;
        }
    }

    public function cronCache()
    {
        try{
            $client = new DogecClient();

            $masternodecount = $client->getmasternodecount();
            $moneysupply = $client->moneysupply();
            $difficulty = $client->difficulty();
            $blockcount = $client->blockcount();
            $getproposals = $client->getproposals();

            $this->saveCache('masternodecount', $masternodecount);
            $this->saveCache('moneysupply', $moneysupply);
            $this->saveCache('difficulty', $difficulty);
            $this->saveCache('blockcount', $blockcount);
            $this->saveCache('proposals', $getproposals);
        }
        catch(\Throable $e)
        {
            throw $e;
        }
    }
}
