<?php
/**
 * Created by PhpStorm.
 * UserModel: air
 * Date: 08/10/2018
 * Time: 15:43
 */

if (!isset($_SESSION)) {
    session_start();
}
require_once '../vendor/autoload.php';


$request = \Core\Message\Request::generateResponse();
$response = new \Core\Message\Response();


$response->handel($request);
$response->render();


