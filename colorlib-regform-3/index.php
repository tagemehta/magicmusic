<?php 
require_once("../vendor/autoload.php");
require("../spotify-requests/top_tracks.php");
    
?>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Personalization || Magic Music</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <style>
        .card-3 {
            margin-top: -100px;
        }
        @media only screen and (min-width: 800px) {
            .card-3 .card-heading {
              background: url("<?php echo $img_track?>") top left/cover no-repeat;
              display: table-cell;
                width: 100%;
            }
            .card-heading {
                width: <?php echo $img_width ?>px;
              height: <?php echo $img_height ?>px;
            }
            .card-3 {
                width: calc(<?php echo $img_width?>px + 310px);
            }
        }
        @media only screen and (max-width: 800px) {
            .card-3 {
                margin: -100px 20px 20px 20px;
                width: 80%;
            }
        }
    </style>
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Perzonalization Info</h2>
                    <form method="POST" action = "../reccs.php">
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="mood" required>
                                    <option disabled="disabled" selected="selected">Mood</option>
                                    <option>Happy/Cheer Me Up</option>
                                    <option>I'm Aight</option>
                                    <option>Lemme Cry</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="purpose" required>
                                    <option disabled="disabled" selected="selected">Playlist For</option>
                                    <option>Studying</option>
                                    <option>Vibing</option>
                                    <option>Dancing</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="tempo" required>
                                    <option disabled="disabled" selected="selected">Beat</option>
                                    <option>Speed It Up</option>
                                    <option>Regular Beats</option>
                                    <option>Slow It Down</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                         <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="time_range" required>
                                    <option disabled="disabled" selected="selected">Where should we look?</option>
                                    <option>Last 4 Weeks</option>
                                    <option>Last 6 Months</option>
                                    <option>Go Farrr Back</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->