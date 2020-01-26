<?php
session_start();
$host="localhost";
$username="root";
$pass="";
$db="ems";
$conn=mysqli_connect($host,$username,$pass,$db);
if(!$conn){
   die("Database connection error");
   }
   //insert query for register page
	$user_id=$_GET['id'];
 	$query="delete  from `users` where `user_id`='$user_id'";
    $res=mysqli_query($conn,$query);
	if($res)
	{
		$_SESSION['success']="Deleted successfully!";
	    header('Location:dashboard.php');
	}
	else 
		echo "Not deleted, please try again";
?>