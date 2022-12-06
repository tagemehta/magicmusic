<?php
require_once('tm_helper_funcs.php');
$artistArr = "";
$top_artists_genres = tm_Spotify_Req(["https://api.spotify.com/v1/me/top/artists"]);
if ($top_artists_genres != 429) {
    $genres = [];
    foreach ($top_artists_genres["items"] as $pack) {
        array_push($genres, $pack["genres"][0]);
        $artistArr.= $pack["id"] . ",";
    };
    unset($pack);
    $genres = array_count_values($genres);
    $genres = array_keys($genres);
}
$artistArr = substr($artistArr, 0, -1);