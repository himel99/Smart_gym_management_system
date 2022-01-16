<?php

require_once 'dbcon.php';

if(isset($_GET['edit'])){
	$id = base64_decode($_GET['edit']);
	echo $id;

	$result = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '$id'");
	$result2 = mysqli_query($con, "SELECT * FROM `user_details` WHERE `user_id` = '$id'");
	$row = mysqli_fetch_assoc($result);
	$row2 = mysqli_fetch_assoc($result2);
	print_r($row);
	print_r($row2);

}


if(isset($_POST['save_info']))
{
	$name = $_POST['name'];
	$id = $_POST['id'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$status = $_POST['status'];
	$age = $_POST['age'];
	$height = $_POST['height'];
	$weight = $_POST['weight'];
	$batch_time = $_POST['batch_time'];
	$exercise = $_POST['exercise'];

	echo $name;
	echo $id;

	$file_name = $_FILES['image']['name'];
	$file_name = explode('.', $file_name);
	$file_ex = end($file_name);
	$file_name = rand(9999,99999).date('-Y-m-d-H-i-s.').$file_ex;

	//echo $file_name;
	//echo $file_ex;

	$result = mysqli_query($con, "SELECT * FROM `users` WHERE id = $id");
	$result2 = mysqli_query($con, "SELECT * FROM `user_details` WHERE `user_id` = '$id'");

	$result3 = mysqli_query($con, "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password',`status`='$status', `image`='$file_name' WHERE id=$id");


	$result1 = mysqli_query($con, "UPDATE `user_details` SET `age`= $age,`height`=$height,`weight`=$weight,`batch_time`=$batch_time,`exercise`=$exercise  WHERE user_id=$id");
	

	

	print_r($result);

	$row = mysqli_fetch_assoc($result);	
	$row2 = mysqli_fetch_assoc($result2);
		
	echo '<pre>';
	print_r($row);

	echo $row2['age'];
	

	if($result3)
	{
		if($result1)
		{
			move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$file_name);
			header('Location: user_profile.php');
		

		}
		
		
	}
	else
	{
		$error = "Data not updated";
	}


	print_r($_POST);



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Info</title>


	<style>
	body {font-family: Arial, Helvetica, sans-serif;
		background-color: #cccccc;
	  background-image: url(gymmm.jpg);
	  background-repeat: no-repeat;
	  background-size: cover;
	}
	* {box-sizing: border-box}

	/* Full-width input fields */
	input[type=text], input[type=password], input[type=email], input[type=number] {
	  width: 100%;
	  padding: 15px;
	  margin: 5px 0 22px 0;
	  display: inline-block;
	  border: none;
	  background: #1D98B8;
	  opacity: 0.7;
	}

	input[type=file] {
		padding: 15px;
	  margin: 5px 0 22px 0;
	  display: inline-block;
	  border: none;
	  background: #1D98B8;
	  margin-top: 20px;
	  opacity: 0.7;
	}

	input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=number]:focus{
	  background-color: #ddd;
	  outline: none;
	}

	hr {
	  border: 1px solid #f1f1f1;
	  margin-bottom: 25px;
	}

	/* Set a style for all buttons */
	button {
	  background-color: #04AA6D;
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
	  width: 40%;
	}

	/* Add padding to container elements */
	.container {
	  padding: 16px;
	  margin-left: 10%;
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

	select {
    margin: 20px;
    background: #1D98B8;
    color: #fff;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
	}

	::placeholder {
	  color: red;
	  opacity: 1; /* Firefox */
	}


	</style>



</head>
<body>
	
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
		
		<div class="container">


			<h1 style="color:white">Update User Info</h1>
		    <hr>

			<table>
				<tr>
					<td style="color:white">Name</td>
					<td><input type="text" name="name" placeholder="Name" value="<?= $row['name']?>"></td>
					<td><input type="hidden" name="id" value="<?= $row['id']?>"></td>
					<td rowspan="3"><img src="images/<?php echo $row['image']; ?>" width="200" height="200" alt =""></td>
				</tr>

				<tr>
					<td style="color:white">Email</td>
					<td><input type="email" name="email" placeholder="Email Address" value="<?= $row['email']?>"></td>
				</tr>

				<tr>
					<td style="color:white">Password</td>
					<td><input type="text" name="password" placeholder="Password" value="<?= $row['password']?>"></td>
				</tr>

				<tr>
					<td style="color:white">Status</td>
					<td ><b><input type="text" name="status" placeholder="Status" value="<?= $row['status'] == 1 ? 'Active' : 'Inactive'; ?>" readonly style="color: lime"></b></td>
					<td></td>
					<td><input type="file" name="image"></td>

				</tr>

				<tr>
					<td style="color:white">Age </td>
					<td><input type="number" name="age" placeholder="Age" value="<?= $row2['age']?>" min="10" max="100"></td>
				</tr>

				<tr>
					<td style="color:white">Height </td>
					<td><input type="number" name="height" placeholder="Height in cm" value="<?= $row2['height']?>"></td>
				</tr>

				<tr>
					<td style="color:white">Weight </td>
					<td><input type="number" name="weight" placeholder="Weight in Kgs" value="<?= $row2['weight']?>" min="40"></td>
				</tr>

				<tr>
					<td style="color:white">Batch Time </td>
					<td>
						<select name="batch_time" style="width:500px;">
							<option value="">Select</option>
							<option value="0" <?= $row2['batch_time'] == 0 ? 'selected' : '' ?> >Morning - [7.00 AM - 12.00 PM]</option>
							<option value="1" <?= $row2['batch_time'] == 1 ? 'selected' : '' ?> >Evening - [4.00 PM - 6.00 PM]</option>
							<option value="2" <?= $row2['batch_time'] == 2 ? 'selected' : '' ?> >Night - [7.00 PM - 11.00 PM]</option>
							
						</select>
					</td>
				</tr>

				<tr>
					<td style="color:white">Exercise Category</td>
					<td>
						<select name="exercise" style="width:500px;">
							<option value="">Select</option>
							<option value="0" <?= $row2['exercise'] == 0 ? 'selected' : '' ?> >Yoga</option>
							<option value="1" <?= $row2['exercise'] == 1 ? 'selected' : '' ?> >Cardiac</option>
							<option value="2" <?= $row2['exercise'] == 2 ? 'selected' : '' ?> >Weight Lifting</option>
							
						</select>
					</td>
				</tr>

				

			</table>

			 <div class="clearfix">
				  <a href="user_profile.php"> <button type="button" class="cancelbtn">Cancel</button> </a>
			      <button type="submit" class="signupbtn" name="save_info">Update User</button>
			    </div>
			</div>


	</form>

	<?php

	if(isset($error))
	{
		echo '<p>'. $error . '</p>';
	}
	?>

</body>
</html>
