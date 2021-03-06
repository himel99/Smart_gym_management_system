<?php
session_start();

if(!isset($_SESSION['email']) && !isset($_COOKIE['email']) ){
	header("Location: index.php" );
}

require_once 'dbcon.php';

$search = NULL;
if(isset($_POST['search']))
{
	$search = $_POST['search'];	
	echo $search;

}


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
		  width: 100%;
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

		.w3-button {width:100px;}

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


	/* Search Bar*/


	input[type=number] {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=number]:focus {
  width: 100%;
}



		</style>

	</head>
	<body>



		<h1 style="color:white" align= center><i>Welcome to Admin Panel</i></h1>
		<p style="color:white">Session : <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'No Session'; ?></p>		 

		<p style="color:white">Cookie : <?= isset($_COOKIE['email']) ? $_COOKIE['email'] : 'No Cookie'; ?></p>


		<br><br>
			<form method="post">
			  <input type="number" name="search" placeholder="Search by user ID" min="0">
			</form>
		<br><br>

	


	<table class="data">
		<tr>
			<th>Sl No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Status</th>
			<th>Reg Date</th>
			<th>Payment Status</th>
			<th>Payment Date</th>
			<th>Image</th>
			<th colspan="2">Action</th>
		</tr>
		<?php
		//$result = mysqli_query($con, "SELECT * FROM `users`");
		$result = mysqli_query($con, "SELECT * FROM `users`,`user_details` WHERE users.id = user_details.user_id");

	
		

		//print_r($result);
		echo $search;

		while($row = mysqli_fetch_assoc($result))
		{
			//echo '<pre>';
			//print_r($row);
			if($search == NULL)
			{
		?>

		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
			<td><?php echo $row['datetime']; ?></td>
			<td style="color: maroon"><?php echo $row['payment_status'] == 1 ? 'Paid' : 'Unpaid'; ?></td>
			<td><?php echo $row['payment_date']; ?></td>
			<td><img src="images/<?php echo $row['image']; ?>" width="100" height="100" alt =""></td>
			<td><a href="edit.php?edit=<?= base64_encode($row['id']) ?>" class="w3-button w3-green">Update</a></td>
			<td><a href="delete.php?id=<?= base64_encode($row['id']) ?>" class="w3-button w3-yellow">Delete</a></td>
		</tr>
		<?php
		}

		else if($search == $row['id'])
		{
			?>

		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
			<td><?php echo $row['datetime']; ?></td>
			<td style="color: maroon"><?php echo $row['payment_status'] == 1 ? 'Paid' : 'Unpaid'; ?></td>
			<td><?php echo $row['payment_date']; ?></td>
			<td><img src="images/<?php echo $row['image']; ?>" width="100" height="100" alt =""></td>
			<td><a href="edit.php?edit=<?= base64_encode($row['id']) ?>" class="w3-button w3-green">Update</a></td>
			<td><a href="delete.php?id=<?= base64_encode($row['id']) ?>" class="w3-button w3-yellow">Delete</a></td>
		</tr>
		<?php 
		}




		}
		$search = NULL;

		?>
	</table>


		<div class="center">
		  <a href="logout.php" class="w3-button w3-red">Logout</a>
		</div>
	</body>
</html>
