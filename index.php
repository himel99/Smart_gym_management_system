<?php
session_start();

if(isset($_SESSION['email']) || isset($_COOKIE['email']) ){
	header("Location: Admin.php" );
}

require_once 'dbcon.php';


	if(isset($_POST['login'])){

		define('EMAIL', 'ADMIN@smartgym');
		define('PASSWORD', '123456');

		$email = $_POST['email'];
		$password = $_POST['password'];
		$keep = isset($_POST['keep']) ? $_POST['keep'] : NULL;

		print_r($_POST);


		if($email == EMAIL && $password == PASSWORD)
		{
			$_SESSION['email'] = $email;
						
			if(isset($keep))
			{					
				setcookie('email', $email, time()+60*60);	
			}
			echo '<script type="text/javascript">alert("Welcome to Admin Panel")</script>';
			header("Location: Admin.php");

		}

		
		else if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{


		  $sql = "SELECT `id` FROM `users` WHERE `email` = '$email' AND `password` = $password ";
	      $result = mysqli_query($con,$sql);
	     //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	     //$active = $row['active'];
	      
	      $count = mysqli_num_rows($result);
	      
			
		     if($count == 1) 
		     {
		         $_SESSION['email'] = $email;
						
				if(isset($keep))
				{					
					setcookie('email', $email, time()+60*60);	
				}

				header("Location: user_profile.php");
			}

	        else 
	        {
	        	echo '<script type="text/javascript">alert("Your Login Name or Password is invalid")</script>';
	       
	           echo "Your Login Name or Password is invalid";
	        }

		}
		
		else
		{
			echo "Invalid email format";
			echo '<script type="text/javascript">alert("Invalid email format")</script>';
		}


		
} 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel ="stylesheet" type="text/css" href="style.css">

<style> 
#grad1 {
  height: 700px;
  background-color: #cccccc;
  background-image: url(gym.jpg);
  background-repeat: no-repeat;
  background-size: cover;
}
#grad2 {
  height: 300px;
  background-color: #cccccc;
  background-image: url(gym.jpg);\
  background-repeat: no-repeat;
}
</style>

</head>

<body>
	<div class="login-box">

		<h1 align=center><i>Smart GYM</i></h1>
		<hr>
		<p>Please login with your account.</p>
	    

		<form action="" method="POST">
			<input type="email" placeholder="Email Address" name="email" required="">
			<input type="password" placeholder="Password" name="password" required="">

			<b>Remember Me</b><input type="checkbox" name="keep">
			<input type="submit" value="Login" name="login">
		</form>
		<br>
		Didn't sign up yet? <a href="signup.php"><b>Sign Up</b></a>
	</div>

	<div id="grad1"></div>
	

</body>
</html>