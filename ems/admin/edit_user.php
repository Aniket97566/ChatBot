<?php include "../auth/auth.php";?>
<html>
<title>Register</title>
<head>
<link rel="stylesheet"  type="text/css" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
function formvalidation()
{
	
if($('#inputName').val()=='')
{
	alert('Please enter your name');
	return false;
}
if($('#inputEmail').val()=='')
{
	alert('Please enter your email');
	return false;
}

}
</script>
</head>
<body>

<?php include "header.php";?>
<div class="container">
<div class="col-sm-6 col-xs-push-3">
<!--------------------REGISTER FORM START FROM HERE--------------------------->


<form class="form-horizontal" method="post" action="update_user.php" onsubmit="return formvalidation();">
  <fieldset>
    <legend>Edit User Details</legend>
	<?php
	if(isset($_SESSION['success']))
   {
	   echo $_SESSION['success'];
	   unset($_SESSION['success']);
   }
   ?>
   <?php 
   $user_id=$_GET['id'];
   $query="select * from users where user_id='$user_id'";
   $res=mysqli_query($conn,$query);
   $data=mysqli_fetch_array($res);
   ?>
   <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
	<div class="form-group row">
      <label for="inputName" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text"  class="form-control" name="inputName" id="inputName" placeholder="Name" value="<?php echo $data['Name'];?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" value="<?php echo $data['email'];?>">
      </div>
    </div>
	<div class="form-group row">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password"  class="form-control" name="password" id="Password" placeholder="Password">
      </div>
    </div>
	<div class="form-group row">
      <label class="col-lg-2 control-label">Department</label>
      <div class="col-lg-10">
	  <div class="radio">
	  <label>
    <input type="radio"  name="depart" id="depart" value="WEB DEVELOPMENT" <?php if($data['department']=='WEB DEVELOPMENT'){ echo "checked";}?>>
         WEB DEVELOPMENT
		 </label>
		 </div>
		  <div class="radio">
		  <label>
 <input type="radio"  name="depart" id="depart" value="SEO"  <?php if($data['department']=='SEO'){ echo "checked";}?>>
         SEO
		 </label>
     </div>
	 </div>
	 </div>
	 <div class="form-group row">
      <label class="col-lg-2 control-label">Role</label>
      <div class="col-lg-10">
	  <div class="radio">
	  <label>
    <input type="radio"  name="role" id="role" value="ADMIN"   <?php if($data['role']=='ADMIN'){ echo "checked";}?>>
         ADMIN
		 </label>
		 </div>
		  <div class="radio">
		  <label>
 <input type="radio"  name="role" id="role" value="EMPLOYEE"  <?php if($data['role']=='EMPLOYEE'){ echo "checked";}?>>
         EMPLOYEE
		 </label>
     </div>
	 </div>
	 </div>

<div class="form-group">
    <div class="col-lg-10 cl-lg-offset-2">
 <button type="submit" class="btn btn-primary">UPDATE</button>
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