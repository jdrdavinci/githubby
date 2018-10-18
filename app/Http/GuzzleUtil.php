<?php
namespace App\Http;

use GuzzleHttp\Client;

/**
 * Class GuzzleUtil
 * @package App\Http
 */
class GuzzleUtil
{
    const URI = 'https://api.github.com/';
    const TOKEN = '01eaf5a3433ffc2673b754af8be95e1a90746fe9';

    public static function doRequest($url) {
        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/vnd.github.v3+json',
                'Authorization' => 'token '.self::TOKEN
            ]
        ]);

        $res = $client->request('GET', self::URI.$url, [
            'query' => ['affiliation' => 'owner']
        ]);
        return $res->getBody();
    }

}