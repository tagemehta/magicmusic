<?php
require_once("tm_helper_funcs.php");
$tracksArr = "";
$img_track = "";
$img_height = "";
$first_five  = "";
function basic_top($term="medium_term") {
    global $tracksArr, $img_track, $img_height, $first_five;
    $top_tracks = tm_Spotify_Req(["https://api.spotify.com/v1/me/top/tracks?limit=50&time_range=$term", "items"])[0][0];
    if($top_tracks != 429) {
        foreach($top_tracks as $key=>$trackList) {
            if ($key == 0) {
                $img_track = $trackList["album"]["images"][0]["url"];
                $img_height = $trackList["album"]["images"][0]["height"];
                $img_width = $trackList["album"]["images"][0]["width"];
            }
            if ($key <=4) {
                $first_five .= $trackList["id"] . ",";
            }
            $tracksArr.=$trackList["id"] . ",";
    //        array_push($audio_features_arr, $trackList["id"]);
        }
        unset($trackList);
    }
    //Remove Last Commas
    $first_five = substr($first_five, 0, -1);
    $tracksArr = substr($tracksArr, 0, -1);
    };
basic_top();