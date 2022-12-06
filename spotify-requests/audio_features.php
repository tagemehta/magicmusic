<?php 
require_once("top_tracks.php");
$danceability = [];
$energy = [];
$instrumentalness = [];
$loudness = [];
$tempo = [];
$valence = [];
$speechiness = [];
$pitch = [];
function tm_audio_feature_req($trackList) {
$several_audio_features = tm_Spotify_Req(["https://api.spotify.com/v1/audio-features?ids=$trackList"]);
global $danceability, $energy, $instrumentalness, $loudness, $tempo, $valence, $speechiness, $pitch;
    foreach($several_audio_features["audio_features"] as $audio_feature_track) {
        array_push($danceability, $audio_feature_track["danceability"]);
        array_push($energy, $audio_feature_track["energy"]);
        array_push($instrumentalness, $audio_feature_track["instrumentalness"]);
        array_push($loudness, $audio_feature_track["loudness"]);
        array_push($tempo, $audio_feature_track["tempo"]);
        array_push($valence, $audio_feature_track["valence"]);
        array_push($speechiness, $audio_feature_track["speechiness"]);
        array_push($pitch, $audio_feature_track["key"]);
        
    };
    $danceability = floatval(arr_average($danceability));
    $energy = floatval(arr_average($energy));
    $instrumentalness = floatval(arr_average($instrumentalness));
    $loudness = floatval(arr_average($loudness));
    $tempo = floatval(arr_average($tempo));
    $valence = floatval(arr_average($valence));
    $speechiness = floatval(arr_average($speechiness));
    $pitch = floatval(floor(arr_average($pitch)));

}

tm_audio_feature_req($tracksArr);
