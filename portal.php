
<?php
session_start();
include 'connection.php';
include 'user.php';
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
<title>Portal</title>
</head>
<body style="background-color: #f7f7f7;">
<?php include 'header.php'; ?>
<div class="container-fluid" style="margin-top: 10px;">
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10 shadow p-4 mb-4 bg-white">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			 <a class="nav-link" data-toggle="tab" href="#profile">Profiel</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" data-toggle="tab" href="#user">User List</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#merchant">Merchant List</a>
		</li>
	</ul>
<div class="tab-content">
	<div class="tab-pane container" id="profile">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitt esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</div>
	<div class="tab-pane container active" id="user">
		<?php display("user");?>
	</div>
	<div class="tab-pane container" id="merchant">
		<?php display("merchant");?>
	</div>
</div>
</div>
</div>
</div>
</body>
</html>