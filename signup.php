<?php

require_once 'dbcon.php';

if(isset($_POST['save_info']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$con_password = $_POST['con_password'];
	$status = 1;
/*
	echo '<pre>';

	print_r($_POST);
	print_r($_FILES);

	echo '</pre>';
*/
	//echo $_FILES['image']['name'];
	//echo $_FILES['image']['tmp_name'];

	//move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$_FILES['image']['name']);

	$file_name = $_FILES['image']['name'];
	$file_name = explode('.', $file_name);
	$file_ex = end($file_name);
	$file_name = rand(9999,99999).date('-Y-m-d-H-i-s.').$file_ex;

	//echo $file_name;
	//echo $file_ex;
	if($password == $con_password)
	{
		$result = mysqli_query($con, "INSERT INTO users (id,name,email,password,status,image) VALUES (NULL,'$name','$email',$password,$status,'$file_name')");

	$result2 = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$email'");

	//print_r($result2);

		
	$row2 = mysqli_fetch_assoc($result2);
		
	//echo '<pre>';
	//print_r($row2);

	echo $row2['id'];
	$idd = $row2['id'];

	$result1 = mysqli_query($con, "INSERT INTO user_details (user_id) VALUES ($idd)");

	if($result)
	{

		move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$file_name);
		$success = "Data Saved Successfully!";
		echo '<script type="text/javascript">alert("Sign up completed Successfully")</script>';
		header("Location: index.php" );
	}
	else
	{
		echo '<script type="text/javascript">alert("Sign up failed")</script>';
		$error = "Data not saved";
	}


	}
	else
	{
		echo '<script type="text/javascript">alert("Confirm Password Again!")</script>';
	}


	

	//print_r($_POST);



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>


	<style>
	body {font-family: Arial, Helvetica, sans-serif;
		background-color: #cccccc;
	  background-image: url(gymm.jpg);
	  background-repeat: no-repeat;
	}
	* {box-sizing: border-box}

	/* Full-width input fields */
	input[type=text], input[type=password], input[type=email] {
	  width: 100%;
	  padding: 15px;
	  margin: 5px 0 22px 0;
	  display: inline-block;
	  border: none;
	  background: #A5BCB9;
	  opacity: 0.7;
	}

	input[type=file] {
		padding: 15px;
	  margin: 5px 0 22px 0;
	  display: inline-block;
	  border: none;
	  background: #A5BCB9;
	  margin-top: 20px;
	  opacity: 0.7;
	}

	input[type=text]:focus, input[type=password]:focus, input[type=email]:focus{
	  background-color: #ddd;
	  outline: none;
	}

	hr {
	  border: 1px solid #f1f1f1;
	  margin-bottom: 25px;
	}

	/* Set a style for all buttons */
	button {
	  background-color: #58AEC4;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  cursor: pointer;
	  width: 100%;
	  opacity: 0.9;
	}

	button:hover {
	  opacity:1;
	}

	/* Extra styles for the cancel button */
	.cancelbtn {
	  padding: 14px 20px;
	  background-color: #f44336;
	}

	/* Float cancel and signup buttons and add an equal width */
	.cancelbtn, .signupbtn {
	  float: left;
	  width: 35%;
	}

	/* Add padding to container elements */
	.container {
	  padding: 16px;
	  margin-left: 20%;
	  margin-top: 10px;
	  margin-bottom: 50px;
	}

	/* Clear floats */
	.clearfix::after {
	  content: "";
	  clear: both;
	  display: table;
	}

	/* Change styles for cancel button and signup button on extra small screens */
	@media screen and (max-width: 300px) {
	  .cancelbtn, .signupbtn {
	     width: 100%;
	  }
	}

	#grad2 {
	  height: 300px;
	  background-color: #cccccc;
	  background-image: url(gym.jpg);
	  background-repeat: no-repeat;
	}

	select {
    margin: 20px;
    background: rgba(0, 0, 0, 0.3);
    color: #fff;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
	}


	</style>

</head>
<body>
	
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
		
		<div class="container">

			<h1 style="color:white">Sign Up</h1>
		    <p style="color:white">Please fill in this form to create an account.</p>
		    <hr>

			<table>
				<tr>
					<td style="color:white">Name</td>
					<td><input type="text" name="name" placeholder="Name"></td>
				</tr>

				<tr>
					<td style="color:white">Email</td>
					<td><input type="email" name="email" placeholder="Email Address"></td>
				</tr>

				<tr>
					<td style="color:white">Password </td>
					<td><input type="password" name="password" placeholder="Password"></td>
				</tr>

				<tr>
					<td style="color:white">Confirm Password </td>
					<td><input type="password" name="con_password" placeholder="Retype Password"></td>
				</tr>

				<tr>
					<td style="color:white">Status</td>
					<td>
						<select name="status" style="width:500px;" >
							<option value="">Active</option>
							
							
						</select>
					</td>
				</tr>

				<tr>
					<td style="color:white">Image</td>
					<td><input type="file" name="image"></td>
				</tr>

				

			</table>

			 <div class="clearfix">
			  <a href="index.php"> <button type="button" class="cancelbtn">Back to Login</button> </a>
		      <button type="submit" class="signupbtn" name="save_info">Sign Up</button>
		    </div>
		  </div>


	</form>


	<?php
	if(isset($success))
	{
		echo '<p>'. $success . '</p>';
	}
	if(isset($error))
	{
		echo '<p>'. $error . '</p>';
	}
	?>

</body>
</html>
