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
            $DogecClient = new DogecClient();

            $masternodecount = $DogecClient->getmasternodecount();
            $moneysupply = $DogecClient->moneysupply();
            $difficulty = $DogecClient->difficulty();
            $blockcount = $DogecClient->blockcount();
            $getproposals = $DogecClient->getproposals();

            $GithubClient = new GithubClient();
            $latestRelease = $GithubClient->latestRelease();
            $daysWithoutActivity = $GithubClient->daysWithouActiviy();

            $DiscordClient = new DiscordClient();
            $DiscordMembers = $DiscordClient->getMembers();

            $ChainReviewClient = new ChainReviewClient();
            $wallets = $ChainReviewClient->walletCount();

            $KBClient = new KBClient();
            $announcements = $KBClient->getAnnouncements();

            $this->saveCache('masternodecount', $masternodecount);
            $this->saveCache('moneysupply', $moneysupply);
            $this->saveCache('difficulty', $difficulty);
            $this->saveCache('blockcount', $blockcount);
            $this->saveCache('proposals', $getproposals);
            $this->saveCache('latestRelease', $latestRelease);
            $this->saveCache('daysWithoutActivity', $daysWithoutActivity);
            $this->saveCache('DiscordMembers', $DiscordMembers);
            $this->saveCache('wallets', $wallets);
            $this->saveCache('announcements', $announcements);
        }
        catch(\Throable $e)
        {
            throw $e;
        }
    }
}
