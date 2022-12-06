<?php
require_once("tm_helper_funcs.php");
$user = tm_Spotify_Req(["https://api.spotify.com/v1/me", "display_name", "id"]);
$user_name =  $user[0][0];
$user_id = $user[0][1];