<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Http;

class GithubClient extends Model
{
    public function client($request){
        try{
            $requestUrl = "https://api.github.com/$request";
            $request = Http::get($requestUrl);
            return $request;
        }
        catch(\Throwable $e)
        {
            Throw $e;
        }
    }

    public function latestRelease()
    {
        $request = $this->client('repos/dogecash/dogecash/releases/latest');
        $tag = $request['tag_name'];
        $linkBase = "https://github.com/dogecash/dogecash/releases/download/$tag/";
        $release = [
            "version" => $tag
        ];
        foreach($request['assets'] as $asset)
        {
            if(strpos($asset['name'], '.dmg') !== false)
            {
                $release['downloads']['mac'] = $linkBase . $asset['name'];
            }
            else if(strpos($asset['name'], '.exe') !== false)
            {
                $release['downloads']['windows'] = $linkBase . $asset['name'];
            }
            else if(strpos($asset['name'], 'linux-gnu.tar.gz') !== false)
            {
                $release['downloads']['linux'] = $linkBase . $asset['name'];
            }
        }
        return $release;
    }

    public function daysWithouActiviy()
    {
        try{
            $request = $this->client('orgs/dogecash/events');
            $dateSinceLastActivity = new Carbon($request[0]['created_at']);
            $daysWithoutActivity = $dateSinceLastActivity->diffInDays(new Carbon());
            return $daysWithoutActivity;
        }
        catch(\Throwable $e)
        {
            throw $e;
        }
    }
}
