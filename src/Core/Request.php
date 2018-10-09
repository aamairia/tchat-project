<?php
/**
 * Created by PhpStorm.
 * UserModel: air
 * Date: 08/10/2018
 * Time: 16:21
 */

namespace Core\Message;


class Request
{

    public function getMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }
    public function getUri(){

        return $_SERVER['REQUEST_URI'];

    }

    public static function generateResponse(){

        $uri = $_SERVER['REQUEST_URI'];

        return new static($uri, $_COOKIE, $_GET, $_POST);
    }

}