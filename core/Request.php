<?php

/**
 * Created by PhpStorm.
 * User: dierme
 * Date: 31.10.17
 * Time: 18:03
 */
class Request
{
    public static function uri(){
        return trim(
            parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH), '/'
        );
    }

    public static function method(){
        return $_SERVER['REQUEST_METHOD'];
    }
}