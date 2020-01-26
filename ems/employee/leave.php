<?php include "../auth/auth.php";?>
<html>
<title>Leave</title>
<head>
<link rel="stylesheet"  type="text/css" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
<?php include "header.php";?>

<div class="container">
<h3>Leave Lists <a href="applied_leave.php" class="btn btn-primary" style="margin:5px";>All Applied Leave</a></h3>
<table class="table table-hover">
  <thead>
    <tr>
	  <th scope="col">Name</th>
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
  $user_id=$_SESSION['user_id'];
  $query="Select * from assign_leave t1 join `users` t2 on t1.assgn_to=t2.user_id where t2.user_id=$user_id";
	$res=mysqli_query($conn,$query);
	$count=mysqli_num_rows($res);
	if($count>0)
	{
	while($row=mysqli_fetch_array($res))
	{
  ?>
    <tr class="table-active">
	<td><?php echo $row['Name']; ?></td>
      <td class="eleave"><?php echo $row['e_leave']; ?></td>
	   <td class="mleave"><?php echo $row['m_leave']; ?></td>
	    <td class="vleave"><?php echo $row['c_leave']; ?></td>
	  <td class="v_from"><?php echo $row['v_from']; ?></td>
	  <td class="v_to"><?php echo $row['v_to']; ?></td>
	  
	 
    </tr>
   
	<?php $i++;} }
else {
	echo "No record Found!";
}	?> 
    
  </tbody>
</table>
<div class="col-xs-6 col-xs-push-3 well" >
<form class="form-horizontal" method="post" action="apply_leave.php" onsubmit="return formvalidation();">
<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>" 
 <fieldset>
    <legend>Apply Leave <a href="all_leave.php" class="btn btn-primary" style="margin:5px";>All Leave</a>
	</legend>
	<p><?php if(isset($_SESSION['success'])){
	  	echo $_SESSION['success'];
		unset($_SESSION['success']);
	}
	?></p>
   <!------left Box-------->
   <!-----------right Box------->
   <div class="col-xs-9">
   <div class="form-group row">
      <label for="inputEmail" class="col-lg-3 "><b>Leave From:</b></label>
      <div class="col-lg-9">
      <input type="date" name="l_from" placeholder="dd/mm/yyyy" onblur="checkDate(this.value)">
	  </div>
    </div> 
   <div class="form-group row">
      <label for="inputEmail" class="col-lg-3 "><b>Leave To:</b></label>
      <div class="col-lg-9">
      <input type="date" name="l_to" placeholder="dd/mm/yyyy" onblur="checkDate(this.value)">
	  </div>
    </div>
	<div class="form-group row">
      <label for="inputEmail" class="col-lg-3 "><b>Earning Leave:</b></label>
      <div class="col-lg-9">
      <input type="text" name="eleave" placeholder="No. of leave" onblur="checkeleavequan(this.value)">
	  </div>
    </div>
	<div class="form-group row">
      <label for="inputEmail" class="col-lg-3 "><b>Medicle Leave:</b></label>
      <div class="col-lg-9">
      <input type="text" name="mleave" placeholder="No. of leave" onblur="checkmleavequan(this.value)">
	  </div>
    </div>
	<div class="form-group row">
      <label for="inputEmail" class="col-lg-3 "><b>Casual Leave:</b></label>
      <div class="col-lg-9">
      <input type="text" name="cleave" placeholder="No. of leave" onblur="checkcleavequan(this.value)">
	  </div>
    </div>
   </div> </div>
<div class="form-group">
    <div class="col-lg-12 cl-lg-offset-3">
 <button type="submit" class="btn btn-primary">Submit</button>
 <button type="reset" class="btn btn-default">Reject</button>
 </div>
 </div>
  </fieldset>
</form>

</div></div>
<script>   
function checkDate(str)
{
	var vfrm=$('.l_from').text();
	var vto=$('.l_to').text();
	var lfrm=str;
	var date1=new Date(vfrm);
	var date2=new Date(lfrm);
	var diffDays=parseInt((date2-date1)/(1000*3600*24));
	var date3=new Date(lfrm);
	var date4=new Date(vto);
	var diffDays2=parseInt((date4-date3)/(1000*3600*24));
	if(diffDays>=0&&diffDays2>=0)
	{
		return true;
	}
	else 
	{
		
	}
}
function checkeleavequan(str)
{ var vfrm=$('.eleave').text();
	var lqty=str;
	if(vfrm>=lqty)
	{return true;}
  else 
  {
	  //alert('Please enter valid Earning leave quantity');return false;
  }
}
function checkmleavequan(str)
{ var vfrm=$('.mleave').text();
	var lqty=str;
	if(vfrm>=lqty)
	{return true;}
  else 
  {
	 //alert('Please enter valid Earning leave quantity');return false;
  }
}
function checkcleavequan(str)
{var vfrm=$('.cleave').text();
	var lqty=str;
	if(vfrm>=lqty)
	{return true;}
  else 
  {
	 // alert('Please enter valid Earning leave quantity');return false;
  }
}
</script>
</body>
</html>