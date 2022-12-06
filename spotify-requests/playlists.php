<?php
require_once('tm_helper_funcs.php');
$playlists_req = tm_Spotify_Req(["https://api.spotify.com/v1/me/playlists"]);
$user_playlists_ids = [];
foreach($playlists_req["items"] as $playlist_general) {
    array_push($user_playlists_ids, $playlist_general["id"]);
}
unset($playlist_general);
$user_playlist_songs = [];
//Loop through each playlist
foreach($user_playlists_ids as $playlist_id) {
    //loop with this playlist id
    //make sure that there isn't more than 98 songs
    if (count($user_playlist_songs) <= 98) {
        $this_playlist = tm_Spotify_Req(["https://api.spotify.com/v1/playlists/$playlist_id/tracks?items=items(track(id,name))"]);
        foreach($this_playlist["items"] as $song) {
            if(count($user_playlist_songs) <=98 ) {
                $user_playlist_songs[$song["track"]["name"]] = $song["track"]["id"];
            }
        };
    }
}
$user_playlist_songs = implode(",", $user_playlist_songs);
$user_playlist_songs = substr($user_playlist_songs, 0, -1);
$audio_features = tm_Spotify_Req(["https://api.spotify.com/v1/audio-features?ids=$user_playlist_songs", "audio_features"])[0][0];
$danceablity = [];
$energy = [];
$instrumentalness = [];
$tempo = [];
foreach($audio_features as $track_feature) {
    array_push($danceablity, $track_feature["danceability"]);
    array_push($energy, $track_feature["energy"]);
    array_push($instrumentalness, $track_feature["instrumentalness"]);
    array_push($tempo, $track_feature["tempo"]);
};
unset($track_feature);
$danceablity_average = arr_average($danceablity);
$energy_average = arr_average($energy);
$instrumentalness_average = arr_average($instrumentalness);
$tempo_average = arr_average($tempo);