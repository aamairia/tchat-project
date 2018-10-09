<?php
/**
 * Created by PhpStorm.
 * UserModel: air
 * Date: 08/10/2018
 * Time: 17:07
 */

namespace App\Core;


class Router
{


    public function register(){

        $routes = require __DIR__ . '/../../app/routes.php';

        foreach($routes as $uri => $action){
            yield $uri => $action;
        }

    }
}