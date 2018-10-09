<?php
/**
 * Created by PhpStorm.
 * UserModel: air
 * Date: 08/10/2018
 * Time: 16:05
 */

$content = '';

if (isset($_SESSION['user_id'])):
    $content .= '<a href="/logout">Déconnexion</a>';
endif;


$content .=
<<< EOF
<form action="/tchat" method="POST">
<div class="md-col-10">
<div class="form-group">
    <label>Choisissez une "Room"</label>
    <select name="room" class="form-control" >
EOF;

foreach ($rooms as $room){
    $content .=
        <<< EOF
      <option value="{$room['id']}">#{$room['label']}</option>     
EOF;
}



$content .=
    <<< EOF
    </select>
    </div>
    <div class="md-col-2"><input type="submit" class="btn btn-primary" value="GO" /></div>
  </div>
</form>
EOF;

include __DIR__. '/../layout.html.php';