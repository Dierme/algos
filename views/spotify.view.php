<?php
/**
 * Created by PhpStorm.
 * User: dierme
 * Date: 03.11.17
 * Time: 20:29
 */
//

//print_r($body);
//print_r($response);

if (isset($_GET['code'])) {
    print_r($api->me());
}