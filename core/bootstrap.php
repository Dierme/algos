<?php
/**
 * Created by PhpStorm.
 * User: dierme
 * Date: 31.10.17
 * Time: 17:39
 */
require 'Request.php';
require 'Router.php';
require 'vendor/autoload.php';

$app = (object)[
    'client' => $client = new \GuzzleHttp\Client(),
    'config' => require 'core/config.php'
];