
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<title>Validation</title>
</head>
<body style="height: 1500px">
<div class="container-fluid">
  	<br>
  	<h3>Sticky Navbar</h3>
  	<p>A sticky navigation bar stays fixed at the top of the page when you scroll past it.</p>
  	<p>Scroll this page to see the effect. <strong>Note:</strong> sticky-top does not work in IE11 and earlier.</p>
</div>
	<nav class="navbar sticky-top navbar-expand-sm justify-content-center bg-dark">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="">Courses</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="" active>Register</a>
			</li>
		</ul>
	</nav>
	<br><br>
	<br><br>
	<div class="container">
		<?php

		

		
			$servername="localhost";
			$username="root";
			$password="";
			$databasename="myprojectdb";

			$conn=new mysqli($servername,$username,$password,$databasename);
			if($conn->connect_error)
			die("Connection error due to".$conn->connect_error);

			$sql="insert into user_info values(2,'salman','salman.ansri77','sss','sssdf','dfasd','slman','admin')";
			if($conn->query($sql)===TRUE)
			echo "Your account has been registerd<br>";
			else {
				echo "It seem your email id is in our record<br> "	;		}
			$conn->close();
		
		?>
		
	</div>
</body>
</html>