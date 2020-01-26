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
if($('#Password').val()=='')
{
	alert('Please enter your password');
	return false;
}
if($('#Password').val().length<=4)
{
	alert('password length should be greater than length 4');
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


<form class="form-horizontal" method="post" action="insert_user.php" onsubmit="return formvalidation();">
  <fieldset>
    <legend>Register</legend>
	<?php
	if(isset($_SESSION['success']))
   {
	   echo $_SESSION['success'];
	   unset($_SESSION['success']);
   }
   ?>
	<div class="form-group row">
      <label for="inputName" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text"  class="form-control" name="inputName" id="inputName" placeholder="Name">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
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
    <input type="radio"  name="depart" id="depart" value="WEB DEVELOPMENT"  checked="">
         WEB DEVELOPMENT
		 </label>
		 </div>
		  <div class="radio">
		  <label>
 <input type="radio"  name="depart" id="depart" value="SEO" checked="">
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
    <input type="radio"  name="role" id="role" value="ADMIN"  checked="">
         ADMIN
		 </label>
		 </div>
		  <div class="radio">
		  <label>
 <input type="radio"  name="role" id="role" value="EMPLOYEE" checked="">
         EMPLOYEE
		 </label>
     </div>
	 </div>
	 </div>

<div class="form-group">
    <div class="col-lg-10 cl-lg-offset-2">
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