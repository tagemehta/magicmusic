<?php

//Using guzzle
require('vendor/autoload.php');
require('spotify-requests/artists_genres.php');
require('spotify-requests/reccomendations.php');
require('spotify-requests/user.php');
?>

<html>
    <head>
        <title>App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,700;1,900&display=swap" rel="stylesheet">
        <link rel = "stylesheet" href = "main.css">
    </head>
    <body>
        <div id = "loader" class = "center">
            <h1 class="center animateText">Your Reccomendations are Being Made</h1>
        </div>
        <div id = "body">
            <a href = "main.php"><img src = "spotify-icons-logos/icons/02_CMYK/02_PNG/Spotify_Icon_CMYK_Black.png" class = "spotifyLogo" alt = "Spotify Logo"></a>
        <a href = "#" class = "logout" id = "logout">Logout</a>
        <h1 class = "userName center"><?php echo $user_name?></h1>
        <h2 class="center">Your Favorite Genres</h2>
        <dl class = "genres center"><?php foreach ($genres as $genre) {
            echo "<dt>$genre</dt>";
        }
        unset($genre);
        ?>
            </dl>
        </dl>
        <h2 class="center">Your Song/Album Recommendations</h2>
         <section class = "makePlaylistContainer">
            <form method="get" action = "make_playlist.php">
               <label for = "playlist_name">Playlist Name: </label>
               <input type = "text" name = "playlist_name" class ="name_field">
                <input type="submit" class = "makePlaylist" value = "Add To Playlist" required>
            </form>
        </section>
        <dl class = "mainOutput three-grid">
            <?php
            foreach($embedList as $embed) {
                echo "<iframe src=\"https://open.spotify.com/embed/track/$embed\" width=\"300\" height=\"380\" frameborder=\"0\" allowtransparency=\"true\" allow=\"encrypted-media\"></iframe>";
            }
            ?>
        </dl>
        </div>
        <script src ="main.js"></script>
    </body>
</html>