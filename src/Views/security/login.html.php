<?php
/**
 * Created by PhpStorm.
 * UserModel: air
 * Date: 08/10/2018
 * Time: 16:05
 */


$content = (!empty($errors))? "<div class=\" container text-center alert alert-danger\">$errors</div>": '';
$content .= file_get_contents(__DIR__.'/login_content.html.php') ;

include __DIR__.'/../layout.html.php';