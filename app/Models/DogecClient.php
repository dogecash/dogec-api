<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Http;

class DogecClient extends Model
{
    public function client($method, $parameters = [])
    {
        try {
            $baseUrl = env('DOGEC_URL');
            $port = env('DOGEC_PORT');
            $username = env('DOGEC_USERNAME');
            $password = env('DOGEC_PASSWORD');

            $params = [
                'method' => $method
            ];

            if (count($parameters)) {
                $params['params'] = $parameters;
            }

            $request = Http::post("http://$username:$password@$baseUrl:$port", $params);

            if ($request['error']) {
                throw new \Exception($request['error']['message']);
            }

            return $request['result'];
        } catch (\Throwable $e) {
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

    public function difficulty()
    {
        return $this->client('getinfo')['difficulty'];
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

        $proto = 70925;
        $currentBlock = $this->blockcount();

        $filtered_peers = [];
        foreach ($peers as $peer) {
            if ($peer['synced_headers'] >= $currentBlock && $peer['synced_blocks'] != '-1' && $peer['version'] == $proto && strpos($peer['addr'], '56740') !== false) {
                array_push($filtered_peers, $peer['addr']);
            }
        }
        return $filtered_peers;
    }
}
