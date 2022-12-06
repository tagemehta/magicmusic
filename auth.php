<?php
error_reporting(E_ALL);
require('vendor/autoload.php');
require('spotify-requests/tm_helper_funcs.php');
//https://github.com/ker0x/oauth2-spotify
//https://github.com/thephpleague/oauth2-client/blob/master/docs/providers/thirdparty.md
//developer.spotify.com
//http://docs.guzzlephp.org/en/stable/
$provider = new Kerox\OAuth2\Client\Provider\Spotify([
    'clientId'     => 'c8ae602823cb43a8b66a5f06f87e4fbe',
    'clientSecret' => 'b16142bb56024d34a465914618bc1c3b',
    'redirectUri'  => 'http://localhost:8888/SpotifyAPI/auth.php/callback',
]);

if (!isset($_GET['code'])) {
    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl([
        'scope' => [
            Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_READ_EMAIL,
            "user-top-read",
            "playlist-read-collaborative",
            "playlist-modify-private",
            "playlist-modify-public"
        ]
    ]);
    
    $_SESSION['oauth2state'] = $provider->getState();
    
    header('Location: ' . $authUrl);
    exit;
// Check given state against previously stored one to mitigate CSRF attack
}

// Try to get an access token (using the authorization code grant)
$token = $provider->getAccessToken('authorization_code', [
    'code' => $_GET['code']
]);

$newTok = $token->getToken();


$_SESSION["token"] = $newTok;

// Optional: Now you have a token you can look up a users profile data

header("Location: ../main.php");
?>

<a href = "main.php">Next</a>

