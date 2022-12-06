const url = 'https://www.spotify.com/logout/'
const logout = document.getElementById("logout");
logout.addEventListener('click', function () {
    const spotifyLogoutWindow = window.open(url, 'Spotify Logout', 'width=700,height=500,top=40,left=40')
    setTimeout(function() {
        spotifyLogoutWindow.close()
        window.location.href = "http://localhost:8888/SpotifyAPI/auth.php"
    }, 2000)
    
})
const loader = document.getElementById("loader");
const body = document.getElementById("body");
document.onreadystatechange = function() {
    var newStyle = document.createElement("style");
    if (document.readyState == "complete") {
        loader.style.display = "none";
        body.style.display = "block";
        newStyle.remove();
    } else if (document.readyState == "loading" || document.readyState == "interactive") {
        body.style.display = "none";
        loader.style.display = "block";

        newStyle.textContent = `
        .animateText:after {
            animation: add-dot 4s infinite;
            content: "";
        }
        @keyframes add-dot{
            0% {
                content: "";
                }
            25% {
                content: ".";
            }
            50% {
                content: "..";
            }
            75% {
                content: "...";
            }
            100% {
                content: "";
            }
        }
        `;
        loader.append(newStyle);
    }
    console.log(document.readyState);
}