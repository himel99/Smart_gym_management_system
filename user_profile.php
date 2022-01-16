<?php
session_start();

if(!isset($_SESSION['email']) && !isset($_COOKIE['email']) ){
	header("Location: index.php" );
}

require_once 'dbcon.php';


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Admin Panel</title>
		<link rel="stylesheet" href="styleAdmin.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

		<style>

	

		table {
		  border-collapse: collapse;
		  width: 70%;
		}

		th, td {
		  text-align: center;
		  padding: 8px;
		}

		tr:nth-child(even){background-color: #AFD4DC; opacity: 0.9}
		tr:nth-child(odd){background-color: #89B2BC; opacity: 0.9}

		th {
		  background-color: #04AA6D;
		  color: white;
		  opacity: 0.7;
		}

		.w3-button {width:200px;}

		.center {
		  display: flex;
		  justify-content: center;
		  align-items: center;
		  height: 200px;
		}

		body {font-family: Arial, Helvetica, sans-serif;
		background-color: #cccccc;
	  background-image: url(gymmm.jpg);
	  background-repeat: no-repeat;
	  background-size: cover;


	}




	/* Navigation Bar*/

	.topnav {
  overflow: hidden;
  background-color: #333;
  text-align: center;
  margin-left: 40%;
  margin-right: 41%;
  font-family: roman;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}


		</style>

	</head>
	<body>


		<div class="topnav">
	  <a class="active" href="#home">Profile</a>
	  <a href="gridView.php">News</a>

	  <a href="about_me.php">About</a>
	 </div>



		<h1 style="color:white" align= center><i>Welcome to User Panel</i></h1>
		<p style="color:white">Session : <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'No Session'; ?></p>		 

		<p style="color:white">Cookie : <?= isset($_COOKIE['email']) ? $_COOKIE['email'] : 'No Cookie'; ?></p>

		<br><br><br>



	<table class="data" align=center>
		<tr>
			<th colspan="3" style="height:100px">User Profile</th>
		</tr>
		<?php
		$user_email = $_SESSION['email'];
		//echo $user_email;
		$result = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$user_email'");

		//print_r($result);

		$row = mysqli_fetch_assoc($result);
		$idd = $row['id'];

		$result1 = mysqli_query($con, "SELECT * FROM `user_details` WHERE user_id=$idd");
		$row1 = mysqli_fetch_assoc($result1);
		
		//echo '<pre>';
		//print_r($row);
		//print_r($row1);
		?>

		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td style="color:white">User ID</td>
			<td><?php echo $row['id']; ?></td>
			<td rowspan="4"><img src="images/<?php echo $row['image']; ?>" width="300" height="300" alt =""></td>
		</tr>

		<tr>
			<td style="color:white">Name</td>
			<td><?php echo $row['name']; ?></td>

		</tr>
		<tr>
			<td style="color:white">Email</td>
			<td><?php echo $row['email']; ?></td>
		</tr>
		<tr>
			<td style="color:white">Current Status</td>
			<td><?php echo $row['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
		</tr>
		<tr>
			<td style="color:white">Registartion Date</td>
			<td><?php echo $row['datetime']; ?></td>
			<td><a href="update_user.php?edit=<?= base64_encode($row['id']) ?>" class="w3-button w3-green">Update Profile</a></td>
		</tr>
		<tr>
			<td style="color:white">Age</td>
			<td><?php echo $row1['age']; ?> years</td>
			
		</tr>
		<tr>
			<td style="color:white">Height </td>
			<td><?php echo $row1['height']; ?> cm</td>
			
		</tr>
		<tr>
			<td style="color:white">Weight</td>
			<td><?php echo $row1['weight']; ?> Kgs</td>
			
		</tr>

		<tr>
			<td style="color:white">Batch Time</td>
			<td><?php 

			if($row1['batch_time'] == 0)
				echo 'Morning - [7.00 AM - 12.00 PM]';
			else if($row1['batch_time'] == 1)
				echo 'Evening - [4.00 PM - 6.00 PM]';
			else if($row1['batch_time'] == 2)
				echo 'Night - [7.00 PM - 11.00 PM]';

			 ?>
			 	
			 </td>
		</tr>
			
		<tr>
			<td style="color:white">Exercise Category</td>
			<td><?php 

			if($row1['exercise'] == 0)
				echo 'Yoga';
			else if($row1['exercise'] == 1)
				echo 'Cardiac';
			else if($row1['exercise'] == 2)
				echo 'Weight Lifting';

			 ?>
			 	
			 </td>
		</tr>

		<tr>
			<td style="color:white">Package Amount</td>
			<td><?php
			if($row1['exercise'] == 0)
			 	echo "1000 Taka";
			 else if($row1['exercise'] == 1)
			 	echo "2000 Taka";
			 else if($row1['exercise'] == 2)
			 	echo "3000 Taka"; 
			 else 
			 	echo "Not selected any pachkage yet!";
			 ?>
			 
			</td>
			
		</tr>

		<tr>
			<td style="color:white">Payment Status</td>
			<td><?php echo $row1['payment_status'] == 1 ? 'Paid' : 'Unpaid'; ?></td>
		</tr>

		<tr>
			<td style="color:white">Payment Date</td>
			<td><?php echo $row1['payment_date']; ?></td>
			
		</tr>

		
	</table>


		<div class="center">
		  <a href="logout.php" class="w3-button w3-red">Logout</a>
		</div>
	</body>
</html>
