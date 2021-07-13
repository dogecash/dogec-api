<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ChainReviewClient;
use App\Models\CacheClient;

class StatsController extends ApiController
{
    public function stats()
    {
        try{
            $response = [
                "DaysWithoutActivityGithub" => number_format(CacheClient::getCache('daysWithoutActivity')),
                "DiscordMembers" => number_format(CacheClient::getCache('DiscordMembers')),
                "ActiveWallets" => number_format(CacheClient::getCache('wallets')),
            ];
            return $this->successResponse($response);
        }
        catch(\Throwable $e)
        {
            return $this->errorResponse(400, $e->getMessage());
        }
    }
}
