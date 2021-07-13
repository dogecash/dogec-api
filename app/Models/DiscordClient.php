<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Http;

class DiscordClient extends Model
{
    public function client($params)
    {
        try{
            $requestUrl = "https://discord.com/api/v9/$params";
            $response = Http::withHeaders([
                'Authorization' => 'Bot '.env('DISCORD_TOKEN'),
            ])->get($requestUrl);

            return $response;
        }
        catch(\Throwable $e)
        {
            throw $e;
        }
    }

    public function getMembers()
    {
        $request = $this->client('guilds/479050479330918410/preview');
        return $request['approximate_member_count'];
    }
}
