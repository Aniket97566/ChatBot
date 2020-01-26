<?php include "../auth/auth.php";?>
<html>
<title>ALL Leaves</title>
<head>
<link rel="stylesheet"  type="text/css" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
<?php include "header.php";?>

<div class="container">
<h3>All Employee Leave Lists</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Sr NO.</th>
	  <th scope="col">Employee Name</th>
	  <th scope="col">Earning Leave</th>
	  <th scope="col">Medical Leave</th>
	  <th scope="col">Casual Leave</th>
	  <th scope="col">Valid From</th>
	  <th scope="col">Valid To</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=1;
  $query="Select * from assign_leave t1 join `users` t2 on t1.assgn_to=t2.user_id";
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
	  <td><?php echo $row['v_from']; ?></td>
	  <td><?php echo $row['v_to']; ?></td>
	  
	 
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