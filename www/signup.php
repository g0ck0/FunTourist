<?php
session_start();
if(isset($_SESSION["sess_user"])){
	header("location:home.php");
}
			$msg = '';
			
			if(isset($_POST["submit"]))
			{
				$user = $_POST['user'];
				$pass = $_POST['password'];
				$email = $_POST['email'];
				
				if($user !=''&& $pass !=''&& $email !='') {
				
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$msg = "Invalid email format"; 
					}
					else {
						$con = mysqli_connect('lean.mk','mktour@lean.mk','mktour123mktour!@','mktour');
										
						$query = mysqli_query($con, "select * from Korisnik where username ='".$user."'");
						$numrows = mysqli_num_rows($query);
						
						if($numrows == 0){
							$insert = mysqli_query($con,
								"INSERT INTO Korisnik (username, password, email) VALUES ('$user','$pass','$email')");
							if ($insert) {
								$msg = "Account successfully created";
								//redirect
								header("Location: login.php");
							}
							else {
								$msg = "Creating account failed";
								//poradi nedobar insert.
							}		
						}
						else
						{
							$msg = "That username already exists!";
						}
						$con->close();
					}
				}
				else {
					$msg = "Please fill all fields.";
				}
			}
		?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SignUp</title>
    <script src="js/prefixfree.min.js"></script>
    <style>
    @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
    @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
    body {
        /*  margin: 0;
    padding: 0;
    background: #fff;
    color: #fff;
    font-family: Arial;
    font-size: 12px;*/
    }
    .body {
        /*  position: absolute;
        /*  top: -20px;
        left: -20px;
        right: -20px;
        bottom: -20px;*/
        width: 100%;
        height: 100%;
        background: url('./images/login-bg.jpg') no-repeat center center fixed;
        background-size: cover;
        -webkit-filter: blur(3px);
        z-index: 0;
        */ background: url('../images/login-bg.jpg') center center;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        min-height: 360px;
        z-index: 0;
        background-size: cover;
        background-attachment: fixed;
        text-align: center;
    }
    .grad {
        /*position: absolute;*/
        /*  top: -20px;
    left: -20px;
    right: -40px;
    bottom: -40px; */
        /*width: 100%;*/
        height: 100%;
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 0)), color-stop(100%, rgba(0, 0, 0, 0.65)));
        /* Chrome,Safari4+ */
        z-index: 1;
        opacity: 0.7;
    }
    .login {
        position: absolute;
        top: calc(50% - 75px);
        left: calc(50% - 150px);
        height: 40%;
        width: 35%;
        padding: 10px;
        z-index: 2;
    }
    .login input[type=text] {
        width: 250px;
        height: 30px;
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 2px;
        color: #fff;
        font-family: 'Exo', sans-serif;
        font-size: 16px;
        font-weight: 400;
        padding: 4px;
    }
    .login input[type=password] {
        width: 250px;
        height: 30px;
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 2px;
        color: #fff;
        font-family: 'Exo', sans-serif;
        font-size: 16px;
        font-weight: 400;
        padding: 4px;
        margin-top: 10px;
    }
    .login input[type=submit] {
        width: 260px;
        height: 35px;
        background: #fff;
        border: 1px solid #fff;
        cursor: pointer;
        border-radius: 2px;
        color: #a18d6c;
        font-family: 'Exo', sans-serif;
        font-size: 16px;
        font-weight: 400;
        padding: 6px;
        margin-top: 10px;
    }
    .login input[type=submit]:hover {
        opacity: 0.8;
    }
    .login input[type=submit]:active {
        opacity: 0.6;
    }
    .login input[type=text]:focus {
        outline: none;
        border: 1px solid rgba(255, 255, 255, 0.9);
    }
    .login input[type=password]:focus {
        outline: none;
        border: 1px solid rgba(255, 255, 255, 0.9);
    }
    .login input[type=submit]:focus {
        outline: none;
    }
    ::-webkit-input-placeholder {
        color: rgba(255, 255, 255, 0.6);
    }
    ::-moz-input-placeholder {
        color: rgba(255, 255, 255, 0.6);
    }
    .account {
        color: #fff;
        margin-top: 13px;
        margin-bottom: -8px;
    }
    .name {
        margin-bottom: 9px;
    }
    .email {
        margin-bottom: 9px;
    }
	.error {
		font-family: 'Exo', sans-serif;
        font-size: 16px;
        font-weight: 400;
		color:red;
	}
    </style>
</head>
<body>
    <div class="body"></div>
    <div class="grad"></div>
    <br>
    <div class="login">
		<form action="" method="POST">
			
			<input type="text" placeholder="email" name="email" class="email">
			<br>
			<input type="text" placeholder="username" name="user">
			<br>
			<input type="password" placeholder="password" name="password">
			<br>
			<input type="submit" value="Sign Up" name="submit">
			
		</form>
		<br>
		<span class="error"><?php echo $msg; ?></span>
    </div>
    <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
</body>
</html>
