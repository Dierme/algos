<?php
/**
 * Created by PhpStorm.
 * User: dierme
 * Date: 31.10.17
 * Time: 17:41
 */

$router->get('', 'controllers/home.php');
$router->get('align', 'controllers/align.php');
$router->get('spotify-auth', 'controllers/spotify-auth.php');
$router->get('tokens', 'controllers/tokens.php');
$router->post('align', 'controllers/align.php');