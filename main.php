<?php 
require('vendor/autoload.php');
require('spotify-requests/user.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Magic-Music || Home</title>
    <link href = "main.css" rel = "stylesheet">
</head>
<body>
  <nav>
   <a href = "main.php" class = "noProps"><img src = "spotify-icons-logos/icons/02_CMYK/02_PNG/Spotify_Icon_CMYK_Black.png" class = "spotifyLogo" alt = "Spotify Logo"></a>
    <a href = "#" class = "logout" id = "logout">Logout</a>
    </nav>
    <?php echo "<h1 class = \"welcome\">Welcome $user_name!</h1>";?>
    <h2 class = "mainHeaderOptions">Please select one of the options to generate a playlists</h2>
    <section class = "options">
            <h2>Quick Playlist and Analysis</h2>
            <h2>Personal Playlists and Analysis</h2>
            <p>See some of your top genres and some basic reccomendations</p>
            <p>Answer a few questions and then have a playlists built off of that</p>
            <button class="optionRec"><a href = "app.php" class = "optionRecLink">This One!</a></button>
            <button class = "optionRec"><a href = "colorlib-regform-3/index.php" class = "optionRecLink">This One!</a></button>
    </section>
    <script src = "main.js"></script>
</body>
</html>