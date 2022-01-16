<?php

session_start();

require_once 'dbcon.php';

$id = base64_decode($_GET['id']);

echo $id;

$result = mysqli_query($con, "DELETE FROM `users` WHERE `id` = $id ");
$result1 = mysqli_query($con, "DELETE FROM `user_details` WHERE `user_id` = $id ");

if($result)
{
	if($result1)
	{
		header("Location: Admin.php");
	}
	
}
else
{
	echo mysql_error($con);
}

?>