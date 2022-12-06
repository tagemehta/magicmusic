<?php
require_once("vendor/autoload.php");
require("spotify-requests/audio_features.php");
$min_instrumentalness = 0.0;
$max_instrumentalness = 1.0;
$min_danceability = 0.0;
$max_danceability = 1.0;
$min_energy = 0.0;
$max_energy = 1.0;
$min_loudness = -100.00;
$max_loudness = 100.00;
$min_speechiness = 0.0;
$max_speechiness = 1.0;
$min_tempo = 0.0;
$max_tempo = 300.0;
$min_valence = 0.0;
$max_valence = 1.0;
switch ($_POST["Where should we look?"]) {
    case "Last 4 Weeks":
        basic_top("short_term");
        break;
    case "Last 6 Months":
        break;
    case "Go Farrr Back":
        basic_top("long_term");
        break;
}
switch ($_POST["mood"]) {
    case "Happy/Cheer Me Up":
        $danceability = $danceability < .5 ? .6 : .9;
        $energy = $energy < .4 ? $energy + .2: ($energy < .9 && $energy > .7 ? $energy + .05: $energy + .1);
        $tempo = ($tempo + 180)/2;
        $valence = $valence < .74 ? .74 : $valence+.05;
        $min_valence = 0.82;
        $pitch = 5;
        $loudness +=5;
        break;
    case "I'm Aight":
        break;
    case "Lemme Cry":
        $max_valence=0.6;
        $danceability = ($danceability + .5)/2;
        $energy -= 0.04;
        $tempo = (180 + $tempo)/3;
        $valence= .4;
        $speechiness -= .1;
        $loudness -=.1;
        $max_speechiness -= .1;
        break;
}
switch ($_POST["purpose"]) {
    case "Studying":
        $danceability -= .2;
        $speechiness -= .03;
        $tempo = (120 + $tempo)/3;
        $instrumentalness = ($instrumentalness + .8)/2;
        $loudness -= 10;
        $max_danceability = 0.9;
        $min_instrumentalness +=0.01;
        break;
    case "Vibing":
        break;
    case "Dancing":
        $danceability = $danceability >= .88 ? 1: $danceability + .12;
        $energy += 0.7;
        $valence += 0.06;
        $tempo = $tempo < 150 ? $tempo + 15: $tempo;
        $min_danceability = 0.8;
        $min_valence = 0.7;
        $min_tempo = 120;
        break;
}

switch ($_POST["tempo"]) {
    case "Speed It Up":
        $tempo +=10;
        $min_tempo = 124.0;
        break;
    case "Regular Beats":
        break;
    case "Slow It Down":
        $max_tempo = 110.0;
        $tempo -=20;
        $instrumentalness += .01;
        break;
}
$reccomendations_url = "https://api.spotify.com/v1/recommendations?seed_tracks=$first_five&target_danceability=$danceability&target_tempo=$tempo&target_valence=$valence&target_energy=$energy&target_loudness=$loudness&target_instrumentalness=$instrumentalness&limit=15&target_key=$pitch&target_speechiness=$speechiness&min_danceability=$min_danceability&max_danceability=$max_danceability&min_energy=$min_energy&max_energy=$max_energy&min_instrumentalness=$min_instrumentalness&max_instrumentalness=$max_instrumentalness&min_loudness=$min_loudness&max_loudness=$max_loudness&min_speechiness=$min_speechiness&max_speechiness=$max_speechiness&min_tempo=$min_tempo&max_tempo=$max_tempo&min_valence=$min_valence&max_valence=$max_valence";
$reccomendations1 = tm_Spotify_Req([$reccomendations_url, "tracks"])[0][0];

$embedList = [];
$uri_list = [];
$_SESSION["uri_list"] = $uri_list;
$uri_str = "";
$str_of_ids = "";
foreach($reccomendations1 as $song) {
    array_push($embedList, $song["id"]);
    array_push($uri_list, $song["uri"]);
    $uri_str .= $song["uri"] . ",";
    $str_of_ids .= $song["id"] . ",";
};
$str_of_ids = substr($str_of_ids, 0, -1);
$uri_str = substr($uri_str, 0, -1);
$_SESSION["uri_str"] = $uri_str;

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personalized Recomendations || Magic Playlist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,700;1,900&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "main.css">
</head>
<body>
   <div id = "loader" class = "center">
            <h1>Your Reccomendations Are Being Made</h1>
        </div>
        <div id = "body">
            
            <a href = "colorlib-regform-3/index.php" class = "noProps"><img src = "spotify-icons-logos/icons/02_CMYK/02_PNG/Spotify_Icon_CMYK_Black.png" class = "spotifyLogo" alt = "Spotify Logo"></a>
        <a href = "#" class = "logout" id = "logout">Logout</a>
   <h1 class="center">Your Personalized Recomendations</h1>
            <section class = "makePlaylistContainer">
            <form method="get" action = "make_playlist.php">
               <label for = "playlist_name">Playlist Name: </label>
               <input type = "text" name = "playlist_name" class ="name_field">
                <input type="submit" class = "makePlaylist" value = "Add To Playlist" required>
            </form>
            </section>
   
    <dl class="mainOutput three-grid">
     <?php
            foreach($embedList as $embed) {
                echo "<dt><iframe src=\"https://open.spotify.com/embed/track/$embed\" width=\"300\" height=\"380\" frameborder=\"0\" allowtransparency=\"true\" allow=\"encrypted-media\"></iframe></dt>";
            };
        echo "</dl>";
        if (count($embedList) == 0) {
            echo "<p class = \"center failed\">Please Try Different Search Terms</p>";
        };
    ?>
    <script src ="main.js"></script>
</body>
</html>