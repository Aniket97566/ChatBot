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
if(isset($_REQUEST['email']))
{
 	$name=$_POST['inputName'];
	$email=$_POST['email'];
	$pass=md5($_POST['password']);
	$user_id=$_POST['user_id'];
	$depart=($_POST['depart']);
	$role=($_POST['role']);
	if($pass=='')
	{
		$query="UPDATE users SET `Name`='$name',`email`='$email',`department`='$depart',`role`='$role' where user_id='$user_id'";
	}
	else
	{$query="UPDATE users SET `Name`='$name',`email`='$email',`password`='$pass',`department`='$depart',`role`='$role' where user_id='$user_id'";
	}
	$res=mysqli_query($conn,$query);
	if($res)
	{
		$_SESSION['success']="Data updated successfully!";
	    header('Location:dashboard.php');
	}
	else {
	echo "Data not updated";}
}
else
{
	echo "Data not found";
}
?>