<?php
/**
 * Created by PhpStorm.
 * UserModel: air
 * Date: 08/10/2018
 * Time: 16:00
 */

namespace App\Core;


class Controller
{

    protected $data = [];

    public function render($view, array $data = [])
    {
        $this->data = array_merge($this->data, $data);
        extract($this->data);

        require_once __DIR__ . '/../Views/' . $view . '.php';

    }


    public function redirectTo($uri)
    {
        if (!$uri) {
            return;
        }
        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $uri;

        header("Location: $url");
        exit;
    }


    public function isLoggedIn()
    {
        if (!isset($_SESSION['user_id'])) {
            $this->redirectTo('/login');
        }
    }
}