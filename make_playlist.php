<?php
require("vendor/autoload.php");
require("spotify-requests/user.php");
$uri_str = $_SESSION["uri_str"];
$response = tm_Spotify_make_playlist([$user_id, $_GET["playlist_name"], $uri_str]);

?>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Playlist Made! || Magic Playlist</title>
    <link rel = "stylesheet" href = "main.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
       <div id = "loader" class = "center">
            <h1>Your Playlist is Being Made</h1>
        </div>
        <div id = "body">
            
            <a href = "main.php"><img src = "spotify-icons-logos/icons/02_CMYK/02_PNG/Spotify_Icon_CMYK_Black.png" class = "spotifyLogo" alt = "Spotify Logo"></a>
        <a href = "#" class = "logout" id = "logout">Logout</a>
    <h1 class = "h1PlaylistMade center">Playlist Made!</h1>
    <div class="playlistMade">
   <iframe src="https://open.spotify.com/embed/playlist/<?php echo $response ?>" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
    </div>
    <script src ="main.js"></script>
</body>
</html>
