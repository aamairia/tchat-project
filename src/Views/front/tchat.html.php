<?php
/**
 * Created by PhpStorm.
 * UserModel: air
 * Date: 08/10/2018
 * Time: 16:05
 */


$content =
    <<< EOF
<main role="main" style="float: left;" class="col-md-9">
    <form action="" method="POST" >
        <div class="jumbotron d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">           
            <div class="">
                <h6 class="">Bienvenue! {$user['pseudo']} à #{$room['label']}</h6>                
            </div>
        </div>

        <div class="my-3 p-3 bg-white rounded box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0">Messages</h6>
EOF;

foreach ($messages as $message) {

    $content .=
        <<< EOF
            <div class="media text-muted pt-3">
                <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">@{$message['pseudo']}</strong>
                    {$message['content']}
                </p>
            </div>
EOF;
}


$content .=
    <<< EOF
            <div class="row">
                <div class="col-md-10">
                    <textarea class="form-control" name="response" ></textarea>
                </div>
                <div class="col-md-2">
                          <br />
                        <button class="btn btn-small btn-primary" >envoi</button>
                   
                </div>
            </div>

        </div>
    </form>
</main>
EOF;

$content .=
    <<< EOF
<aside class="col-md-3 p-3 my-3 text-white-50 bg-purple rounded box-shadow">
EOF;
if (isset($_SESSION['user_id'])):
    $content .= '<a href="/logout">Déconnexion</a>';
endif;

$content .=
    <<< EOF
<h6>Utilisateurs connecter à cette Room</h6>
<hr />
EOF;

foreach ($logged_users as $logged_user) {

    $content .= '@'.$logged_user['pseudo'].'<br />';

}
$content .=
    <<< EOF
</aside>
EOF;
include __DIR__ . '/../layout.html.php';