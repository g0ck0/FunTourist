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
    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript">
        app.initialize();
        //go povikuva initialize
    </script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-wide.css" />
        <link href="css/modal.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/material.css">
    </noscript>
    <!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
    <style>
    #mapPlaceholder {
        height: 300px;
        top: -91px;
        width: 100%;
        min-height: 59%;
    }
    
    .modalDialog {
        position: fixed;
        font-family: Arial, Helvetica, sans-serif;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.8);
        z-index: 99999;
        opacity: 0;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
        pointer-events: none;
    }
    
    .modalDialog:target {
        opacity: 1;
        pointer-events: auto;
    }
    
    .modalDialog > div {
        width: 87%;
        position: relative;
        margin: 10% auto;
        padding: 5px 20px 13px 20px;
        border-radius: 10px;
        background: #fff;
        border: 3px solid black;
        font-size: medium;
        line-height: 30px;
        box-shadow: 3px 3px 4px rgb(113, 103, 103);
        height: 72%;
    }
    
    .close {
        background: #606061;
        color: #FFFFFF;
        line-height: 25px;
        position: absolute;
        right: -12px;
        text-align: center;
        top: -10px;
        width: 24px;
        text-decoration: none;
        font-weight: bold;
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        border-radius: 12px;
        -moz-box-shadow: 1px 1px 3px #000;
        -webkit-box-shadow: 1px 1px 3px #000;
        box-shadow: 1px 1px 3px #000;
        position: absolute;
    }
    
    .close:hover {
        background: #505354;
    }
    
    .open-modal {
        width: 65px !important;
        height: 65px;
        background: red;
        z-index: 10;
        float: left;
        position: relative;
        border-radius: 50%;
        top: -137px;
    }
    
    .open-modal > a {
        text-decoration: none;
    }
    
    .list-categories {
        border-top: 2px dashed #fff;
        width: 100%;
        height: 70%;
        overflow-x: hidden;
        overflow-y: scroll;
    }
    
    .modal-title {
        font-size: 26px;
        text-align: center;
        padding-bottom: 4px;
        border-bottom: 1px dotted #D39595;
        margin-bottom: 7px;
    }
    
    .category-item {
        padding-bottom: 5px;
        border-bottom: 1px dotted #ccc;
    }
    
    .category-item:hover {
        padding-bottom: 5px;
        border-bottom: 1px dotted #ccc;
        background: rgb(231, 231, 231);
    }
    
    .btn-class {
        width: 65px !important;
        height: 65px;
        background: #222629;
        z-index: 10;
        float: right;
        position: relative;
        border-radius: 50%;
        /* border: 2px solid #CCCCCD; */
        top: 229px;
        box-shadow: 3px 3px 6px 0px #515151;
    }
    
    .btn-class:hover {
        color: #E27689;
    }
    
    .btn-class:active {
        color: #E27689;
    }
    
    .btn-icon {
        width: 65px;
        height: 65px;
        border-radius: 50%;
        padding-top: 14px;
        padding-left: 4px;
    }
    
    #btn-class {
        margin-top: 16px;
        margin-left: 2px;
    }
	#submit {
		background-color: black;
	}
    </style>

    <script>
        //getLatLong
        $( document ).ready(function() {
            $.ajax({
                url:"map.php",
                type:"POST",
                async:false,
                data:{getlat:$("#getlat").val(),getlong:$("#getlong").val()},
                success: function (response){
                        if (response == 'true') {
                            alert("script was successful");
                        } else {
                            alert("script was unsuccessful");
                        }
                    },
                    error: function() { 
                        alert("something very bad went wrong");
                    }
            });
        });
    </script>
</head>

<body>
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
    <!-- Main -->
    <div id="main">
        <!-- Portfolio -->
        <section id="portfolio" class="two">
            <div class="container">
                <header>
                    <h2>Map</h2>
                </header>
				
                <!-- button za pozicioniranje
				<button onclick="initialize()" class="btn-class">Location</button>-->
                <div class="btn-class" onclick="initialize()">
                    <div id="btn-class">
                        <i class="fa fa-map-marker"></i>
                    </div>
                </div>
				
                <div id="mapPlaceholder"></div>
                
        <!-- button za proverka na bukva-->
				<form action="" method="POST">
					<input type="submit" id="submit" name="submit" value="check for letter"/>
                    <!-- <input type="submit" id="submit" name="submit1" value="lat/long"/>-->
                    <!-- getLatLong -->
                    <br>
                    <br>
                    <input type="text" name= "getlong" id="getlong" width="20px">
                    <br>
                    <input type= "text" name ="getlat" id="getlat" width="20px">

                </form>

				<?php
					//getLatLong
                    if(isset($_POST["getlat"]))
                    {
                        $lat = $_POST["getlat"];
                        echo $lat;
                    }
                    if(isset($_POST["getlon"]))
                    {
                        $lon = $_POST["getlon"];
                        echo $lon;
                    }

                    //$lat = "<script> document.write(latitude)</script>";
					//echo $lat;
					
					if(isset($_POST["submit"])){
					
						//konektira na baza ------------------
						$con=mysqli_connect('lean.mk','mktour@lean.mk','mktour123mktour!@','mktour'); 
						if(!$con) echo "<br> umre konekcija";
						else echo "<br> uspea konekcija <br>";
						
						//id na user --------------------------
						$user =$_SESSION['sess_user'];
						echo "user: ". $user;
						
						$proverka_user = "select idKorisnik from Korisnik as k
										  where k.username ='".$user."'";
						$rez1 = $con->query($proverka_user);
						if ($rez1->num_rows > 0) {
							while($row1 = $rez1->fetch_assoc()) {
								echo "<br> idKorisnik: ". $row1["idKorisnik"]. "<br>";
								$idUser = $row1["idKorisnik"];
							}
						}
						//----------------------------------------
						
						
						//selektira bukva ako postoi na tie lat i long
						//------------------------------------------
						$sql = "SELECT bukva, lokacija FROM Bukvi as b, Lokacii as l
								WHERE b.idBukvi = l.idBukva
								AND l.latitude = 42.006299
								AND l.longitude = 21.389024";
								
						$query=mysqli_query($con,$sql);
						if(!$query) echo "<br> umre query";
						else echo "<br> uspea query";
						
						$rez = $con->query($sql);
						if ($rez->num_rows > 0) {
							while($row = $rez->fetch_assoc()) {
								//echo "<br> bukva: ". $row["bukva"]. " - lat: ". $row["lat"]. " " . $row["long"] . "<br>";
								echo "<br> bukva: ". $row["bukva"]. " - lokacija: ". $row["lokacija"]. "<br>";
								$letter = $row["bukva"];
								echo "letter: ". $letter. "<br>";
																
								//id na bukva ----------------------
								$proverka_letter = "select idBukvi from Bukvi as b
												  where b.bukva ='".$letter."'";
								$rez2 = $con->query($proverka_letter);
								if ($rez2->num_rows > 0) {
									while($row2 = $rez2->fetch_assoc()) {
										echo "<br> idBukva: ". $row2["idBukvi"]. "<br>";
										$idLetter = $row2["idBukvi"];
									}
								} 
								//----------------------------------
								
								//insert vo ima_bukva(tie bukvi se pojavuvaat vo scrabble)
								/*
								$sql_insert = "insert into ima_bukva(idKorisnik,idBukva) 
												values('$idUser','$idLetter')";
								$insert = mysqli_query($con, $sql_insert);
								echo "<br> Vo insert vleguva: idKorisnik: ".$idUser,", idBukvi: ".$idLetter;
								if($insert) {
									echo "<br> Success";
								}
								else {
									echo "<br> Fail";
								}
								echo "<br> Congratulations! You have received the new letter: ". $letter . " !";
								*/
								//----------------------------------------
								
								//delete na lokacijata vo Lokacii otkako ke ja zeme bukvata
								/*$sql_delete = "delete from Lokacii where longitude = '21.389024' and latitude = '42.006299'";
								$delete = mysqli_query($con, $sql_delete);
								if($delete) {
									echo "<br> Success delete";
								}
								else {
									echo "<br> Fail delete";
								}
								//napraj da vnesuva nesto
								$sql_i = "insert into Lokacii(lokacija, idBukva, longitude, latitude) 
												values('daniela','d','21.389024','42.006299')";
								$i = mysqli_query($con, $sql_i);
								if($i) {
									echo "<br> Success insert posle delete";
								}
								else {
									echo "<br> Fail insert posle delete";
								}*/
								//-----------------------------------------------
							}
						} 
						else {
							echo "<br> Sorry, there is no letter on that location.";
						}
						//----------------------------------
						$con->close();					
					}

				?>

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script>
        var map;
        var latitude;
        var longitude;
        //var dani = 22.5;
        
        function initialize() {
            var mapOptions = {
                zoom: 15
            };
            map = new google.maps.Map(document.getElementById('mapPlaceholder'),
                mapOptions);
            // Try HTML5 geolocation
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {initialize
                    var pos = new google.maps.LatLng(position.coords.latitude,
                        position.coords.longitude);

                    //getLatLong
                    latitude = position.coords.latitude.toFixed(6);
                    longitude = position.coords.longitude.toFixed(6);
                    //alert ("lat: " + latitude + " " +  "long: " + longitude);
                    document.getElementByID("getlong").value = longitude;
                    document.getElementByID("getlat").value = latitude;
                    
                    var marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        title: 'Hello World!'
                    });
                    map.setCenter(pos);
                }, function() {
                    handleNoGeolocation(true);
                });
            } else {
                // Browser doesn't support Geolocation
                handleNoGeolocation(false);
            }
        }

        function handleNoGeolocation(errorFlag) {
            if (errorFlag) {
                var content = 'Error: The Geolocation service failed.';
            } else {
                var content = 'Error: Your browser doesn\'t support geolocation.';
            }
            var options = {
                map: map,
                position: new google.maps.LatLng(60, 105),
                content: content
            };
            var infowindow = new google.maps.InfoWindow(options);
            map.setCenter(options.position);
        }
        //go povikuva initialize
        google.maps.event.addDomListener(window, 'load', initialize);
        
        (function() {
            var dialog = document.getElementById('window');
            document.getElementById('show').onclick = function() {
                dialog.show();
            };
            document.getElementById('exit').onclick = function() {
                dialog.close();
            };
        })();

        </script>
        
		</section>
        </div>

		<?php /*$lat = "<script> alert(); alert(latitude); document.write(latitude);</script>"; echo $lat;*/?>
		
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script>
        $(function() {
            var appendthis = ("<div class='modal-overlay js-modal-close'></div>");
            $('a[data-modal-id]').click(function(e) {
                e.preventDefault();
                $("body").append(appendthis);
                $(".modal-overlay").fadeTo(500, 0.7);
                //$(".js-modalbox").fadeIn(500);
                var modalBox = $(this).attr('data-modal-id');
                $('#' + modalBox).fadeIn($(this).data());
            });
            $(".js-modal-close, .modal-overlay").click(function() {
                $(".modal-box, .modal-overlay").fadeOut(500, function() {
                    $(".modal-overlay").remove();
                });
            });
            $(window).resize(function() {
                $(".modal-box").css({
                    top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
                    left: ($(window).width() - $(".modal-box").outerWidth()) / 2
                });
            });
            $(window).resize();
        });
        </script>
        <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
        </script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
