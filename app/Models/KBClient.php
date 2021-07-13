<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Http;

class KBClient extends Model
{
    public function client($request){
        try{
            $requestUrl = "https://support.dogecash.org/wp-json/wp/v2/$request";
            $request = Http::get($requestUrl);
            return $request->json();
        }
        catch(\Throwable $e)
        {
            Throw $e;
        }
    }

    public function getAnnouncements()
    {
        $request = $this->client('knowledgebase?knowledgebase_category=2');
        $announcements = [];
        foreach($request as $announcement)
        {
            array_push($announcements, [
                "title" => $announcement['title']['rendered'],
                "description" => $announcement['yoast_head_json']['og_description'],
                "image" => $announcement['yoast_head_json']['og_image'][0]['url'],
                "link" => $announcement['yoast_head_json']['og_url']
            ]);
        }
        return $announcements;
    }
}