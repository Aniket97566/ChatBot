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
<h3>All Task List</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Sr NO.</th>
	  <th scope="col">Task</th>
	  <th scope="col">Date_Time</th>
	  <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=1;
  $query="Select * from task";
	$res=mysqli_query($conn,$query);
	$count=mysqli_num_rows($res);
	if($count>0)
	{
	while($row=mysqli_fetch_array($res))
	{
  ?>
    <tr class="table-active">
      <th scope="row"><?php echo $i ;?></th>
      <td><?php echo substr($row['task'],0,50); ?></td>
      <td><?php echo $row['date_time']; ?></td>
	  <td><a href="view_message.php?id=<?php echo $row['t_id']?>">View</a>
	 
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