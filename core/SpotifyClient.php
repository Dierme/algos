<?php

/**
 * Created by PhpStorm.
 * User: dierme
 * Date: 03.11.17
 * Time: 20:02
 */
class SpotifyClient
{
    private $client;

    private $clientID;

    private $clientSecret;

    public function __construct(\GuzzleHttp\Client $client, array $config)
    {
        $this->client = $client;

        $this->clientID = $config['clientID'];
        $this->clientSecret = $config['clientSecret'];
    }

    public function authorise($scope){
        $response = $this->client->get('https://accounts.spotify.com/authorize', [
            'query' => [
                'client_id' => $this->clientID,
                'response_type' => 'code',
                'redirect_uri' => 'http://127.0.0.1',
                'state' => 'STATE',
                'scope' => $scope,
            ],
            'allow_redirects' => true
        ]);

        return $response;
    }
}