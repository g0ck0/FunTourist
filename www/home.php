<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:login.php");
} else 
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>App</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.scrolly.min.js"></script>
    <script src="js/jquery.scrollzer.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
    var myCenter = new google.maps.LatLng(51.508742, -0.120850);

    function initialize() {
        var mapProp = {
            center: myCenter,
            zoom: 5,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var marker = new google.maps.Marker({
            position: myCenter,
        });
        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showCurrentLocation);
    } else {
        alert("Geolocation API not supported.");
    }

    function showCurrentLocation(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var coords = new google.maps.LatLng(latitude, longitude);
        var mapOptions = {
            zoom: 15,
            center: coords,
            mapTypeControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        //create the map, and place it in the HTML map div
        map = new google.maps.Map(
            document.getElementById("mapPlaceholder"), mapOptions
        );
        //place the initial marker
        var marker = new google.maps.Marker({
            position: coords,
            map: map,
            title: "Current location!"
        });
    }
    </script>
    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript">
    app.initialize();
    </script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-wide.css" />
    </noscript>
    <!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
    <style>
    #mapPlaceholder {
        height: 300px;
        width: 300px;
    }
    </style>
</head>

<body class="cover-home">
    <!-- Header -->
    <div id="header" class="skel-layers-fixed">
        <div class="top">
            <!-- Logo -->
            <div id="logo">
                <span class="image avatar48"><img src="images/travel.jpg" alt="" /></span>
                <h1 id="title">
					<span class="icon fa-user" style="margin-right:5px;"></span>
					<?=$_SESSION['sess_user'];?> 
					<br>
					<br>
					<a href="logout.php">Logout</a>
				</h1>
				<br>
            </div>
            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="home.php" id="top-link"><span class="icon fa-home">Home</span></a>
                    </li>
                    <li><a href="map.php" id="portfolio-link"><span class="icon fa-map-marker">Map</span></a>
                    </li>
                    <li><a href="scrabble.php" id="about-link"><span class="icon fa-pencil">Scrabble</span></a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="bottom">
            <!-- Social Icons -->
            <ul class="icons">
                <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a>
                </li>
                <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a>
                </li>
                <li><a href="#" class="icon fa-google-plus"><span class="label">Google Plus</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div id="main">
        <!-- Intro -->
        <section id="top" class="one dark cover">
            <div class="container">
                <header>
                    <h2 class="alt">Explore Macedonia</h2>
                </header>
            </div>
            <p style="width: 100%; margin-top: 126px; font-size: 22px; font-family: 'Source Sans Pro', sans-serif; letter-spacing: 1px;">
                Visit some of our tuirist attractions all over the country and win a trip of your choice</p>
        </section>
    </div>
</body>

</html>
