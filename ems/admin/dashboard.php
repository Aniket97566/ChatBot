<?php include "../auth/auth.php";?>
<html>
<title>Dashboard</title>
<head>
<link rel="stylesheet"  type="text/css" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<?php include "header.php";?>

<div class="container">
<?php echo "<h2>WELCOME TO ADMIN DASHBOARD</h2>";
?>
<h5>USER RECORDS</h2>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Sr NO.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Department</th>
	  <th scope="col">Role</th>
	  <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=1;
  $query="Select * from users";
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
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['department']; ?></td>
	   <td><?php echo $row['role']; ?></td>
	  <td><a href="edit_user.php?id=<?php echo $row['user_id']?>">Edit</a>
	  |<a href="delete_user.php?id=<?php echo $row['user_id']?>">Delete</a></td>
    </tr>
   
	<?php $i++;} }
else {
	echo "No record Found!";
}	?> 
    
  </tbody>
</table> 
</div>
</body>
</html>