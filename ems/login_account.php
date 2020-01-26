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
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$query="Select * from users where email='$email' AND password='$password'";
	$res=mysqli_query($conn,$query);
	$count=mysqli_num_rows($res);
	$row=mysqli_fetch_array($res);
	if($count==1)
	{
		$session_id=session_id();
		$_SESSION['auth']=$session_id;
		$_SESSION['user_id']=$row['user_id'];
		$role=$row['role'];
		if($role=='ADMIN'){
		header('Location:admin/dashboard.php');}
		else if($role=='EMPLOYEE')
		{
		header('Location:employee/dashboard.php');	
		}
		else {
		$_SESSION['error']="login failed";
		header('Location:login.php');
		}
	}
}
	
	