<?php session_start();?>
<html>
<title>Register</title>
<head>
<link rel="stylesheet"  type="text/css" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
function formvalidation()
{
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

<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">EMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="login.php">LOGIN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
  </div>
</nav>
</header>
<div class="container">
<div class="col-sm-6 col-xs-push-3">
<!--------------------LOGIN FORM START FROM HERE--------------------------->


<form class="form-horizontal" method="post" action="login_account.php" onsubmit="return formvalidation();">
  <fieldset>
    <legend>Login</legend>
	<?php
	if(isset($_SESSION['error']))
   {
	   echo $_SESSION['error'];unset($_SESSION['error']);
   }
   if(isset($_SESSION['success']))
   {
	   echo $_SESSION['success'];unset($_SESSION['success']);
   }
   
   ?>
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
	

<div class="form-group">
    <div class="col-lg-10 cl-lg-offset-2">
 <button type="submit" class="btn btn-primary">LOGIN</button>
 </div>
 </div>
  </fieldset>
</form>


<!-------------------------LOGIN FORM END HERE--------------------------->
</div>
</div>
</body>
</html>