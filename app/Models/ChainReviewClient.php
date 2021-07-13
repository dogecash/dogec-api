<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Http;

class ChainReviewClient extends Model
{
    public function client($request){
        try{
            $requestUrl = "https://chain.review/api/db/$request";
            $request = Http::get($requestUrl);
            return $request;
        }
        catch(\Throwable $e)
        {
            Throw $e;
        }
    }

    public function walletCount()
    {
        $request = $this->client('dogecash/getstats');
        return $request['total_wallets_count'];
    }
}