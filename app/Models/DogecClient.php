<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Http;

class DogecClient extends Model
{
    public function client($method, $parameters = [])
    {
        try{
            $baseUrl = env('DOGEC_URL');
            $port = env('DOGEC_PORT');
            $username = env('DOGEC_USERNAME');
            $password = env('DOGEC_PASSWORD');

            $params = [
                'method' => $method
            ];
            
            if( count($parameters) )
            {
                $params['params'] = $parameters;
            }

            $request = Http::post("http://$username:$password@$baseUrl:$port", $params);

            if( $request['error'] )
            {  
                throw new \Exception($request['error']['message']);
            }

            return $request['result'];
        }
        catch(\Throwable $e)
        {
            throw $e;
        }
    }

    public function getmasternodecount()
    {
        return $this->client('getmasternodecount');
    }

    public function moneysupply()
    {
        return $this->client('getinfo')['moneysupply'];
    }

    public function blockcount()
    {
        return $this->client('getinfo')['blocks'];
    }

    public function getproposals()
    {
        return $this->client('getbudgetinfo');
    }

    public function getmasternodes($filter = "")
    {
        return $this->client('listmasternodes', [$filter]);
    }

    public function getpeers()
    {
        $peers = $this->client('getpeerinfo');
        $filtered_peers = [];
        foreach($peers as $peer)
        {
            unset($peer['addrlocal']);
            unset($peer['services']);
            unset($peer['inflight']);
            unset($peer['whitelisted']);
            array_push($filtered_peers, $peer);
        }
        return $filtered_peers;
    }
    
}
