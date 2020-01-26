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
if(isset($_REQUEST['message']))
{
 	$message=mysqli_real_escape_string($conn,$_POST['message']);
	$assign_by=$_POST['assign_by'];
	$emplist=$_POST['emp'];
	foreach($emplist as $emp){
	$query="INSERT INTO `task` (`t_id`,`task`,`user_id`,`task_by`)VALUES('','$message','$emp','$assign_by')";
    $res=mysqli_query($conn,$query);
	}
	if($res)
	{
	  $_SESSION['success']="Message sent successfully!";
	    header('Location:task.php');
	}
	else 
		echo "Data not inserted, please try again";
}
else
{
	echo "Data not found";
}
?>