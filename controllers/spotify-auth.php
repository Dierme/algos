<?php
/**
 * Created by PhpStorm.
 * User: dierme
 * Date: 03.11.17
 * Time: 20:25
 */

//require 'core/SpotifyClient.php';

//$spotifyClient = new SpotifyClient($app->client, $app->config['spotify']);
//
//$scope = 'user-read-private user-read-email';
//$response = $spotifyClient->authorise($scope);
//
//$code = $response->getStatusCode();
//$body = $response->getBody()->getContents();

$session = new SpotifyWebAPI\Session(
    'ae83e40cdfd94111a2afe6a88230469c',
    '3bbf658af4c24826a57e4f6b3adf471e',
    'http://algos/spotify-auth'
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());

} else {
    $options = [
        'scope' => [
            'user-read-email',
        ],
    ];

    header('Location: ' . $session->getAuthorizeUrl($options));
}

require 'views/spotify.view.php';