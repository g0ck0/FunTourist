<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:index.php");
} else 
?>


<!DOCTYPE HTML>
<html>

<head>
    <title>Fun tourist</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--za templejtot na stranata-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.scrolly.min.js"></script>
    <script src="js/jquery.scrollzer.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    
    <script type="text/javascript" src="js/index.js"></script>
    <!--za mapata-->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript">
    app.initialize();
    </script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-wide.css" />
        <link href="css/modal.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/material.css">
    </noscript>

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
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	
</head>

<body onload="initialize()">
    <!-- Header -->
    <div id="header" class="skel-layers-fixed">
        <div class="top">
            <!-- Logo -->
            <div id="logo">
                <span class="image "><img src="images/travel.png" alt="" /></span>
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
                    <li><a href="map.php" id="portfolio-link"><span class="icon fa-map-marker">Location</span></a>
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
                    <h2 style="margin-top:10%"><strong>Let's start collecting letters!</strong></h2>
                </header>
				
                <!-- button za pozicioniranje -->
                <div class="btn-class" onclick="initialize()">
                    <div id="btn-class">
                        <i class="fa fa-map-marker"></i>
                    </div>
                </div>
				
                <div id="mapPlaceholder"></div>
                
				
				<form action="" method="POST">
					<!-- get lat/lon -->
					<input type="hidden" id="getlat" name="getlat" /> 
					<input type="hidden" id="getlon" name="getlon" />
					
					<!-- button za proverka na bukva -->
					<input type="submit" id="submit" name="submit" value="check for letter"/>
				</form>
				<br>
				
                <div id="echos"></div>

				<?php
                    if(isset($_POST["submit"])){
						//lat i lon zima od pozicija
						if(!empty($_POST['getlat']) && !empty($_POST['getlon'])) {
							$lat=$_POST['getlat'];
							$lon=$_POST['getlon'];
						}
						
						//konektira na baza 
						$con=mysqli_connect('lean.mk','mktour@lean.mk','mktour123mktour!@','mktour'); 
						if ($con->connect_error) {
                            die("Connection failed: " . $con->connect_error);
                        } 
						
						//id na user 
						$user =$_SESSION['sess_user'];
						
						$proverka_user = "select idKorisnik from Korisnik as k
										  where k.username ='".$user."'";
						$rez1 = $con->query($proverka_user);
						if ($rez1->num_rows > 0) {
							while($row1 = $rez1->fetch_assoc()) {
								$idUser = $row1["idKorisnik"];
							}
						}

						//oddalecenost od 50m 
						function distance($lat1, $lon1, $lat2, $lon2) {

						  $theta = $lon1 - $lon2;
						  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
						  $dist = acos($dist);
						  $dist = rad2deg($dist);
						  $miles = $dist * 60 * 1.1515;
							return ($miles * 1609.34);
						}

                        function getCompassDirection($bearing) {
                                     $tmp = round($bearing / 22.5);
                                     switch($tmp) {
                                          case 1:
                                               $direction = "NNE";
                                               break;
                                          case 2:
                                               $direction = "NE";
                                               break;
                                          case 3:
                                               $direction = "ENE";
                                               break;
                                          case 4:
                                               $direction = "E";
                                               break;
                                          case 5:
                                               $direction = "ESE";
                                               break;
                                          case 6:
                                               $direction = "SE";
                                               break;
                                          case 7:
                                               $direction = "SSE";
                                               break;
                                          case 8:
                                               $direction = "S";
                                               break;
                                          case 9:
                                               $direction = "SSW";
                                               break;
                                          case 10:
                                               $direction = "SW";
                                               break;
                                          case 11:
                                               $direction = "WSW";
                                               break;
                                          case 12:
                                               $direction = "W";
                                               break;
                                          case 13:
                                               $direction = "WNW";
                                               break;
                                          case 14:
                                               $direction = "NW";
                                               break;
                                          case 15:
                                               $direction = "NNW";
                                               break;
                                          default:
                                               $direction = "N";
                                     }
                                     return $direction;
                                }

                        //lat i lon zima od baza
                        $s = "SELECT latitude, longitude FROM Lokacii";
                        $r = $con->query($s);
                        if ($r->num_rows > 0) {
                            $a = array();
                            $b = array();
                            $promenliva = 0;

                            while($ro = $r->fetch_assoc()) {
                                $dblat = $ro["latitude"];
                                $dblon = $ro["longitude"];
                                $oddalecenost = distance($lat,$lon,$dblat,$dblon);

                                //direction
                                $bearing = (rad2deg(atan2(sin(deg2rad($dblon) - deg2rad($lon)) * cos(deg2rad($dblat)), cos(deg2rad($lat)) * sin(deg2rad($dblat)) - sin(deg2rad($lat)) * cos(deg2rad($dblat)) * cos(deg2rad($dblon) - deg2rad($lon)))) + 360) % 360;
                                $nasoka = getCompassDirection($bearing);
                                //echo $oddalecenost. " - ".$nasoka. "<br>";

                                if ($oddalecenost <=50) {
                                    //selektira bukva ako postoi na tie lat i long
                                    $sql = "SELECT bukva, lokacija, description FROM Bukvi as b, Lokacii as l
                                            WHERE b.idBukvi = l.idBukva
                                            AND l.latitude = '".$dblat."'
                                            AND l.longitude = '".$dblon."'";

                                    $query=mysqli_query($con,$sql);
                                    $rez = $con->query($sql);
                                    if ($rez->num_rows > 0) {
                                        while($row = $rez->fetch_assoc()) {
                                            $letter = $row["bukva"];
                                            echo "<br> Congratulations! <br> You have received the new letter: ". $letter . " ! <br> Your letter has been stored in Scrabble.";

                                            $description = $row["description"];
                                            echo "<br>". $description. "<br>";

                                            //id na bukva 
                                            $proverka_letter = "select idBukvi from Bukvi as b
                                                              where b.bukva ='".$letter."'";
                                            $rez2 = $con->query($proverka_letter);
                                            if ($rez2->num_rows > 0) {
                                                while($row2 = $rez2->fetch_assoc()) {
                                                    $idLetter = $row2["idBukvi"];
                                                }
                                            } 
                                            
                                            //insert vo ima_bukva(tie bukvi se pojavuvaat vo scrabble)
                                            $sql_insert = "insert into ima_bukva(idKorisnik,idBukva) 
                                                            values('$idUser','$idLetter')";
                                            $insert = mysqli_query($con, $sql_insert);
                                            
                                            //delete na lokacijata vo Lokacii otkako ke ja zeme bukvata
                                            $sql_delete = "delete from Lokacii where longitude = '".$dblon."' and latitude = '".$dblat."'";
                                            $delete = mysqli_query($con, $sql_delete);
                                            
                                        }
                                    }//tuka zavrsuva dodeluvanjeto na bukva
                                    $promenliva = 1;
                                }//tuka zavrsuva if distance <=50   
                                else {
                                    array_push($a, round($oddalecenost));
                                    array_push($b, $nasoka);
                                }

                            }//tuka zavrsuva while sto gi vrti site redici
                            if($promenliva == 0) {
                                //naoga najmala distanca i nasoka kon taa lokacija:
                                $lowest = min($a);
                                $indeks = array_search($lowest, $a);
                                $nas = $b[$indeks];
                                echo "<br> Sorry, there is no letter on that location. <br> You can find a letter around ".$lowest." meters ".$nas." from your location. <br>";
                            }
                            
                        }
                        else {
                            echo "<br> You can't find any letters at this time.";

                        }
                        $con->close();
                    }
				?>
				
				
				
				
		</section>
        </div>
		
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script>
        var map;
		
        function initialize() {
            var mapOptions = {
                zoom: 15
            };
            map = new google.maps.Map(document.getElementById('mapPlaceholder'),
                mapOptions);
            // Try HTML5 geolocation
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = new google.maps.LatLng(position.coords.latitude,
                        position.coords.longitude);
					
                    var marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        title: 'You are here.',
                        icon: 'images/marker.png'

                    });
                    map.setCenter(pos);
					
					document.getElementById("getlat").value = position.coords.latitude.toFixed(6);
					document.getElementById("getlon").value = position.coords.longitude.toFixed(6);
					 
                }, function() {
                    handleNoGeolocation(true);
                });
            } 
			
			else {
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
	
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script>
        $(function() {
            var appendthis = ("<div class='modal-overlay js-modal-close'></div>");
            $('a[data-modal-id]').click(function(e) {
                e.preventDefault();
                $("body").append(appendthis);
                $(".modal-overlay").fadeTo(500, 0.7);
				
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