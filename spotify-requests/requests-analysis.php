<?php
require('vendor/autoload.php');
require_once('tm_helper_funcs.php');
//$user = tm_Spotify_Req(["https://api.spotify.com/v1/me", "display_name", "id"]);
//$user_name =  $user[0][0];
//$user_id = $user[0][1];
//$wasError = false;
//// TOP GENRES/ARTISTS
//$artistArr = "";
//$top_artists_genres = tm_Spotify_Req(["https://api.spotify.com/v1/me/top/artists"]);
//if ($top_artists_genres != 429) {
//    $genres = [];
//    foreach ($top_artists_genres["items"] as $pack) {
//        array_push($genres, $pack["genres"][0]);
//        $artistArr.= $pack["id"] . ",";
//    };
//    unset($pack);
//    $genres = array_count_values($genres);
//    $genres = array_keys($genres);
//} else {
//    $wasError = true;
//}
//
////Read and Analyze Playlists
//$playlists_req = tm_Spotify_Req(["https://api.spotify.com/v1/me/playlists"]);
//$user_playlists_ids = [];
//foreach($playlists_req["items"] as $playlist_general) {
//    array_push($user_playlists_ids, $playlist_general["id"]);
//}
//unset($playlist_general);
//$user_playlist_songs = [];
////Loop through each playlist
//foreach($user_playlists_ids as $playlist_id) {
//    //loop with this playlist id
//    //make sure that there isn't more than 98 songs
//    if (count($user_playlist_songs) <= 98) {
//        $this_playlist = tm_Spotify_Req(["https://api.spotify.com/v1/playlists/$playlist_id/tracks?items=items(track(id,name))"]);
//        foreach($this_playlist["items"] as $song) {
//            if(count($user_playlist_songs) <=98 ) {
//                $user_playlist_songs[$song["track"]["name"]] = $song["track"]["id"];
//            }
//        };
//    }
//}
//$user_playlist_songs = implode(",", $user_playlist_songs);
//$user_playlist_songs = substr($user_playlist_songs, 0, -1);
//
////TOP TRACKS
//
//$top_tracks = tm_Spotify_Req(["https://api.spotify.com/v1/me/top/tracks?limit=15", "items"])[0][0];
//$tracksArr = "";
//if($top_tracks != 429) {
//    foreach($top_tracks as $trackList) {
//        $tracksArr.=$trackList["id"] . ",";
//    }
//    unset($trackList);
//}
////Remove Last Commas
//$tracksArr = substr($tracksArr, 0, -1);
//$artistArr = substr($artistArr, 0, -1);
////Analyze Music
//// 1. danceablity
//$audio_features = tm_Spotify_Req(["https://api.spotify.com/v1/audio-features?ids=$user_playlist_songs", "audio_features"])[0][0];
//$danceablity = [];
//$energy = [];
//$instrumentalness = [];
//$tempo = [];
//foreach($audio_features as $track_feature) {
//    array_push($danceablity, $track_feature["danceability"]);
//    array_push($energy, $track_feature["energy"]);
//    array_push($instrumentalness, $track_feature["instrumentalness"]);
//    array_push($tempo, $track_feature["tempo"]);
//};
//unset($track_feature);
//
//$danceablity_average = arr_average($danceablity);
//$energy_average = arr_average($energy);
//$instrumentalness_average = arr_average($instrumentalness);
//$tempo_average = arr_average($tempo);
////reccomendations for artists
//$tracksArr1 = implode(",",array_splice(explode(",", $tracksArr), 0 ,3));
//$artistArr1 = implode(",", array_splice(explode(",", $artistArr),0,2));
////$reccomendations_url = "https://api.spotify.com/v1/recommendations?seed_artists=$artistArr1&seed_tracks=$tracksArr1&target_instrumentalness=$instrumentalness_average&target_energy=$energy_average&target_danceability=$danceablity_average&target_tempo=$tempo_average";
//$reccomendations_url = "https://api.spotify.com/v1/recommendations?seed_artists=$artistArr1&seed_tracks=$tracksArr1";
//$reccomendations1 = tm_Spotify_Req([$reccomendations_url, "tracks"])[0][0];
//$embedList = [];
//foreach($reccomendations1 as $song) {
//    array_push($embedList, $song["id"]);
//};
//unset($song);