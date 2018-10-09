<?php
/**
 * Created by PhpStorm.
 * UserModel: air
 * Date: 08/10/2018
 * Time: 16:26
 */

namespace Core\Message;


use App\Core\Router;

class Response
{

    private $content;

    public function __construct()
    {
    }

    public function handel(Request $request)
    {

        $this->uri = $request->getUri();


        $router = new Router();

        foreach($router->register() as $path => $action):


        if($path === $this->uri) {
            $controller = explode(':',$action)[0];
            $action = explode(':',$action)[1];


            $controller = '\App\Controllers\\'.$controller.'Controller';

            $object = new $controller();

            $this->setContent($object->$action());
        }
        endforeach;
    }

    public function render()
    {

        echo $this->getContent();

    }

    public function setContent($content)
    {
        $this->content = (string)$content;
    }

    public function getContent()
    {
        return $this->content;
    }

}