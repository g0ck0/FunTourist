<?php
/*session_start();
if(isset($_SESSION["sess_user"])){
	header("location:home.php");
}*/
		if(isset($_POST["submit"])){
			session_start();
			if(!isset($_SESSION["sess_user"])){
				header("location:login.php");
			}
			else {
				header("location:home.php");
			}
		}
	?>
<!doctype html>
<html>

<head>
    <title>App</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700|Open+Sans:400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
	<style>
		#submit    {
			background:url(images/down-arrow.png) center;
			background-repeat: no-repeat;
			
			color: white;
			font-size: 1.2em;
			position: absolute;
			bottom: 55px;
			left: 50%;
			margin-left: -25px;
			padding: 10px;
			width: 50px;
			height: 50px;
			font-weight: bold;
			-webkit-transition: all 0.1s ease;
			-moz-transition: all 0.1s ease;
			-o-transition: all 0.1s ease;
			transition: all 0.1s ease;
			-webkit-animation-delay: 1.5s;
			-moz-animation-delay: 1.5s;
			animation-delay: 1.5s;
			border: 3px solid white;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			border-radius: 50%;
			
			opacity:0;
			-webkit-animation:fadeIn ease-in 1; 
			-moz-animation:fadeIn ease-in 1;
			animation:fadeIn ease-in 1;
		 
			-webkit-animation-fill-mode:forwards;  
			-moz-animation-fill-mode:forwards;
			animation-fill-mode:forwards;
		 
			-webkit-animation-duration:0.3s;
			-moz-animation-duration:0.3s;
			animation-duration:0.3s;
			

			-webkit-animation-delay: 0.5s;
			-moz-animation-delay: 0.5s;
			animation-delay: 0.5s;
		}
		#submit:hover {
			text-decoration: none;
			bottom: 50px;
		}
	</style>
</head>

<body>
    <div class="splash fade-in">
        <h1 class="splash-title fade-in">Explore Macedonia</h1>
	
		<br>
		<form action="" method="POST">
		<!-- ?? -->
			<input type="submit" id="submit" name="submit" value=""/>
		</form>
        <!---<a href="login.php" class="splash-arrow fade-in"><img src="images/down-arrow.png" alt="" /></a>--->
    </div>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>
