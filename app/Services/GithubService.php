<?php
/**
 * Created by Malik Abiola.
 * Date: 07/02/2017
 * Time: 14:55
 * IDE: PhpStorm
 */

namespace App\Services;


use App\Factory\GuzzleClient;

class GithubService
{
    public function getDevs()
    {
        $guzzleClient = GuzzleClient::make();

        $response = $guzzleClient->get("/search/users?q=location:lagos+language:php");

        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        }

        return [];
    }
}
