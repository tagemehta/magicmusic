<?php
//wont work
session_start();
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\ClientException;
//Convert Spotify Responses to json;
$token = $_SESSION["token"];
function makeUsable ($json) {
    $arrayDecoded = json_decode($json, true);
    return $arrayDecoded;
};
//Making Spotify Reqs 
//0 => $url;
//1... => attributes to return;

$headers = [
    'Authorization' => 'Bearer ' . $token,
    'Content-Type' => 'application/json'
];
$client = new Client(['headers' => $headers]);
function tm_Spotify_Req ($args) {
    global $client;
    $url = $args[0];
    try {
    $res = $client->get($url);
    if( $res->getStatusCode() == 200) {
        $json = $res->getBody();
        $reqBody = makeUsable($json);
        if (count($args) > 1) {
            $requested = array_slice($args, 1);
            $newArr = [];
            foreach ($requested as $param) {
                array_push($newArr, $reqBody[$param]);
            }
            unset($param);
            return [$newArr, count($requested) -1];
        } else {
            return $reqBody;
        }
    }
    } catch (ClientException $e) {
        header("Location: http://localhost:8888/SpotifyAPI/timeout.html");
    }
};

function tm_Spotify_make_playlist($args) {
    global $client;
    $user_id = $args[0];
    $playlist_name = $args[1];
    $response = $client->post("https://api.spotify.com/v1/users/$user_id/playlists", [
        GuzzleHttp\RequestOptions::JSON => [
            'name'=> $playlist_name,
            'description' => "playlist was made with magic playlist"
        ]
    ]);
    $playlist_endpoint =  ($response->getHeader('Location'))[0];
    $playlist_songs_uris = $args[2];
    $playlist_endpoint .= "/tracks?uris=$playlist_songs_uris";
    $client->post($playlist_endpoint, [
        GuzzleHttp\RequestOptions::JSON => [
            'uris' => [$playlist_songs_uris]
        ]
    ]);
    return makeUsable($response->getBody())["id"];
}
function arr_average($arr) {
    return( array_sum($arr)/count($arr) );
}
?>
