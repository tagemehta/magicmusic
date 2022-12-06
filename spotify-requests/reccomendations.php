<?php

require('top_tracks.php');
require('artists_genres.php');
$tracksArr1 = implode(",",array_splice(explode(",", $tracksArr), 0 ,3));
$artistArr1 = implode(",", array_splice(explode(",", $artistArr),0,2));
//$reccomendations_url = "https://api.spotify.com/v1/recommendations?seed_artists=$artistArr1&seed_tracks=$tracksArr1&target_instrumentalness=$instrumentalness_average&target_energy=$energy_average&target_danceability=$danceablity_average&target_tempo=$tempo_average";
$reccomendations_url = "https://api.spotify.com/v1/recommendations?seed_artists=$artistArr1&seed_tracks=$tracksArr1";
$reccomendations1 = tm_Spotify_Req([$reccomendations_url, "tracks"])[0][0];
$embedList = [];
$uri_str = "";
foreach($reccomendations1 as $song) {
    array_push($embedList, $song["id"]);
    $uri_str .= $song["uri"] . ",";
};

$uri_str = substr($uri_str, 0, -1);
$_SESSION["uri_str"] = $uri_str;