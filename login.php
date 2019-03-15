<?php
session_start();
if(isset($_GET['logout']) && ($_GET['logout']=="true"))
{
	session_unset();
	session_destroy();
	header("Location:login.php");
}
include 'connection.php';
if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==true))
	header("Location:portal.php");
if(isset($_POST['login']))
{
if(isset($_POST['username']) && isset($_POST['password']))
{
	$email=cleanData($_POST['username']);
	$connection=createConnection();
	$password=$connection->query("select password from user_info where email='{$email}'")->fetch_assoc()['password'];
	if($password==cleanData($_POST['password']))
	{
		$_SESSION['loggedin']=true;
		header("Location:portal.php");
		$_SESSION['email']=$email;
	}
	else
	{	
		header("Location:login.php");
		$_SESSION['errMsg']="Username or Password incorrect";
	}
}
else
{ 
	header("Location:login.php");
	$_SESSION['errMsg']="Username or password is incorrect";
}
}

?>
<!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="script_css/style_sheet.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script_css/script.js"></script>
<title>Login</title>
</head>
<body style="background-color: #f7f7f7">
<?php include 'header.php'?>
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4 shadow p-4 mb-4 bg-white"  id="confirmation" style="height: 400px;margin-top: 30px;">
			<form method="post" action="login.php">
				<img src="images/avatar.png"  class="rounded-circle" style="height: 150px;width: 150px;margin-bottom: 20px;">
				<div class="form-group">
					<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">@</span>
					</div>
					<input type="text" name="username" class="form-control" placeholder="username" required>
					</div>	
				</div>
				<div class="form-group">
					<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">@</span>
					</div>
					<input type="password" name="password" class="form-control" placeholder="****" required>
					</div>	
				</div>
				<input type="submit" name="login" class="btn btn-primary">
				<a href="signup.php" class="btn btn-primary">Register</a>
			</form>
			<span class="text text-danger"></span>
		</div>
		<div class="col-sm-4"></div>
	</div>
</body>
</html>
