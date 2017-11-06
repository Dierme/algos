<?php

require 'core/bootstrap.php';


//$res = $app->client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
//echo $res->getStatusCode();
//// 200

require Router::load('routes.php')
    ->direct(Request::uri(), Request::method());
