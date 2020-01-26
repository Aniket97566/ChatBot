<?php include "../auth/auth.php";?>
<html>
<title>TASK</title>
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


<form class="form-horizontal" method="post" action="insert_task.php" onsubmit="return formvalidation();">
  <fieldset>
    <legend>Assign Task <a href="All_task.php" class="btn btn-primary" style="margin:5px";>All Task</a></legend>
	
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
      <label for="inputEmail" class="col-lg-12 "><b>Message</b></label>
      <div class="col-lg-12">
        <textarea  class="form-control" rows="10" name="message" id="inputName" placeholder="Message/Task" style="Background-color:#d9d9d9;padding px:5px"></textarea>
      </div>
    </div>
   </div>
	
	
	 

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