<?php
/**
 * Created by Malik Abiola.
 * Date: 07/02/2017
 * Time: 14:58
 * IDE: PhpStorm
 */

namespace App\Factory;

use GuzzleHttp\Client;

class GuzzleClient
{
    /**
     * @param array $config
     * @return Client
     */
    public static function make($config = [])
    {
        return new Client(
            array_merge(
                [
                    'base_uri' => 'https://api.github.com/'
                ],
                $config
            )
        );
    }
}
