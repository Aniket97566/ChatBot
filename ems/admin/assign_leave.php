<?php include "../auth/auth.php";?>
<html>
<title>Assign Employee Leave</title>
<head>
<link rel="stylesheet"  type="text/css" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>

<?php include "header.php";?>
<div class="container">
<div class="col-sm-10 col-xs-push-1">
<?php
	if(isset($_SESSION['success']))
   {
	   echo $_SESSION['success'];
	   unset($_SESSION['success']);
   }
   ?>
<!--------------------REGISTER FORM START FROM HERE--------------------------->


<form class="form-horizontal" method="post" action="insert_leave.php" onsubmit="return formvalidation();">
  <fieldset>
    <legend>Assign Leave <a href="all_leave.php" class="btn btn-primary" style="margin:5px";>All Leave</a>
	<a href="all_applied_leave.php" class="btn btn-primary" style="margin:5px";>All Applied Leave</a></legend>
	
   <!------left Box-------->
   <div class="col-xs-3" style="Background:#d9d9d9;padding:15px;">
   
   <div class="form-group row">
      <label class="col-lg-12 "><b>Employee Lists</b></label>
	  <input type="hidden" name="assign_by" value="<?php echo $_SESSION['user_id'];?>"
      <div class="col-lg-12">
	  <?php
  $query="Select * from users where role='employee' order by user_id DESC";
	$res=mysqli_query($conn,$query);
	$count=mysqli_num_rows($res);
	while($row=mysqli_fetch_array($res))
	{
  ?>
	  <div class="checkbox">
	  <label>
    <input type="checkbox"  name="emp[]" id="depart" value="<?php echo $row['user_id'];?>">
         <?php echo $row['Name'];?>
		 </label>
		 </div>
	<?php }  ?> 
	 </div>
	 </div>
   </div>
   <!-----------right Box------->
   <div class="col-xs-9">
   <div class="form-group row">
      <label for="inputEmail" class="col-lg-3 "><b>Valid From:</b></label>
      <div class="col-lg-9">
      <input type="date" name="validfrm" placeholder="dd/mm/yyyy">
	  </div>
    </div> 
   <div class="form-group row">
      <label for="inputEmail" class="col-lg-3 "><b>Valid To:</b></label>
      <div class="col-lg-9">
      <input type="date" name="l_to" placeholder="dd/mm/yyyy">
	  </div>
    </div>
	<div class="form-group row">
      <label for="inputEmail" class="col-lg-3 "><b>Earning Leave:</b></label>
      <div class="col-lg-9">
      <input type="text" name="eleave" placeholder="No. of leave">
	  </div>
    </div>
	<div class="form-group row">
      <label for="inputEmail" class="col-lg-3 "><b>Medicle Leave:</b></label>
      <div class="col-lg-9">
      <input type="text" name="mleave" placeholder="No. of leave">
	  </div>
    </div>
	<div class="form-group row">
      <label for="inputEmail" class="col-lg-3 "><b>Casual Leave:</b></label>
      <div class="col-lg-9">
      <input type="text" name="cleave" placeholder="No. of leave">
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


<!-------------------------REGISTER FORM END HERE--------------------------->
</div>
</div>
</body>
</html>