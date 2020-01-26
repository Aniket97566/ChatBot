<?php include "../auth/auth.php";?>
<html>
<title>ALL Applied Leaves</title>
<head>
<link rel="stylesheet"  type="text/css" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
<?php include "header.php";?>
<?php
if(isset($_POST['approved']))
{
	$status="Aprroved";
	$comment=$_POST['comment']; 
	$id=$_POST['id'];
	$query="UPDATE`applied_leave` set `status`='$status',`comment`='$comment' where `id`='$id'";
    $res=mysqli_query($conn,$query);
	if($res)
	{
	  $_SESSION['success']="Row Updated successfully!";
	   
	}
	else 
		echo "Data not Updated, please try again";
}

if(isset($_POST['rejected']))
{
	$status="Rejected";
	$comment=$_POST['comment'];
    $id=$_POST['id'];
	$query="UPDATE`applied_leave` set `status`='$status',`comment`='$comment' where `id`='$id'";
    $res=mysqli_query($conn,$query);
	if($res)
	{
	  $_SESSION['success']="Row Updated successfully!";
	   
	}
	else 
		echo "Data not Updated, please try again";
}
?>

<div class="container">
<h3>All Applied Leave Lists</h3>
<?php if (isset($_SESSION['success'])){
	echo $_SESSION['success'];
	unset($_SESSION['success']);
}?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Sr NO.</th>
	  <th scope="col">Employee Name</th>
	  <th scope="col">Earning Leave</th>
	  <th scope="col">Medical Leave</th>
	  <th scope="col">Casual Leave</th>
	  <th scope="col"> From</th>
	  <th scope="col"> To</th>
	  <th scope="col">status</th>
	  <th scope="col">Comment</th>
	  <th scope="col">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=1;
  $query="Select * from `applied_leave` t1 join `users` t2 on t1.apply_by=t2.user_id";
	$res=mysqli_query($conn,$query);
	$count=mysqli_num_rows($res);
	if($count>0)
	{
	while($row=mysqli_fetch_array($res))
	{
  ?>
    <tr class="table-active">
      <th scope="row"><?php echo $i ;?></th>
      <td><?php echo $row['Name']; ?></td>
      <td><?php echo $row['e_leave']; ?></td>
	   <td><?php echo $row['m_leave']; ?></td>
	    <td><?php echo $row['c_leave']; ?></td>
	  <td><?php echo $row['l_from']; ?></td>
	  <td><?php echo $row['l_to']; ?></td>
	  <td style="color:green;"><?php echo $row['status']; ?></td>
	  <td><form method="post" action="">
	 
	  <textarea name="comment"></textarea></td>
	  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	  <td>
	  <button type="submit" name="approved" class="btn btn-primary">Approved</button>
	
	  <button type="submit" name="rejected" class="btn btn-primary">X</button>
	  </form></td>
	 
    </tr>
   
	<?php $i++;}}
else {
	echo "No record Found!";
}	?> 
    
  </tbody>
</table> 
</div>
</body>
</html>