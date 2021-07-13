<?php

namespace App\Http\Controllers\Api;

use App\Models\CacheClient;
use Illuminate\Http\Request;

class AnnouncementsController extends ApiController
{
    public function announcements()
    {
        try{
            $response = CacheClient::getCache('announcements');
            return $this->successResponse($response);
        }
        catch(\Throwable $e)
        {
            return $this->errorResponse(400, $e->getMessage());
        }
    }
}
