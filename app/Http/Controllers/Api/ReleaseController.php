<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\GithubClient;
use App\Models\CacheClient;

class ReleaseController extends ApiController
{
    public function latestRelease()
    {
        try{
            $response = CacheClient::getCache('latestRelease');
            return $this->successResponse($response);
        }
        catch(\Throwable $e)
        {
            return $this->errorResponse(400, $e->getMessage());
        }
    }
}