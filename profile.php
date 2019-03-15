<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="script_css/style_sheet.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script_css/script.js"></script>
<title>Profile</title>
</head>
<body onload="getData(1)">
<div class="container">
	<div class="row" style="margin-top: 20px;">
		<div class="col-sm-6">
			<img src="images/image19.jpeg" class="img fluid rounded" style="height: 550px; width:500px;margin-top: 20px;">
		</div>
		<form action="process.php"name="profile" enctype="multipart/form-data" method="post" id="profile" onload="">
		<div class="form-group">
			<input type="text"name="name" class="form-control"placeholder="Enter you Name">
			<span id = "nameErr" class="text text-danger"></span>
		</div>

		<div class="form-group">
			<input type="email"name="email"class="form-control"placeholder="Enter your email">
			<span id = "emailErr"class="text text-danger"></span>
		</div>
		<div class="form-group">
			<input type="password"name="password" class="form-control"placeholder="Enter you Password">
			<span id="passwordErr" class="text text-danger"></span>
		</div>

		<div class="form-group">
		<input type="number"name="mobile"class="form-control"placeholder="Enter your Mobile No"><span id="mobileErr" class="text text-danger"></span>
		</div>

		<div class="form-group">
			<input type="Date" name="dob" class="form-control" placeholder="Enter you DOB"><span id="dobErr" class="text text-danger"></span>
		</div>
		<div class="form-group">
			<select class="form-control custom-select" name="category">
				<option value="user" selected>Sign Up as User</option>
				<option value="merchant">Sign Up as Merchant</option>
			</select><span id="categoryErr" class="text text-danger"></span>
		</div>
		<div class="form-group">
			<textarea class="form-control" rows="5" cols="20" placeholder="Enter your address" name="address"></textarea><span id="addressErr" class="text text-danger"></span>
		</div>
		<div class="form-group">
			<select class="form-control custom-select" name="gender">
				<option value="NA" selected>Gender</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
			<span id="genderErr" class="text text-danger"></span>
		</div>
		<div class=" custom-file form-group">
			<label for="images" class="custom-file-label">Upload Image:</label>
			<input type="file" id="image" name="photo" class="form-control custom-file-input">
			<span id="imageErr" class="text text-danger"></span>
		</div>
		<input type="submit" name="submit" value="Submit" class="btn btn-primary" style="margin-top: 15px;" value="Update">
	</form>
	</div>
	<div id="data"></div>
</div>
</body>
</html>

<?php
function createText($name,$date)
{
	$dom=new DOMDocument("1.0");

	$input=$dom->createElement("text");

	$type=$dom->createAttribute("type");
	$name=$dom->createAttribute("name");
	$value=$dom->createAttribute("value");
	
	$type=$dom->value="text";
	$name->value=$name;
	$value->value=$date;

	$input->appendChild($type);
	$input->appendChild($name);
	$input->appendChild($value);
	return $dom->saveHTML();
}
function setDate($id)
{
	include 'connection.php';
	$connection = createConnection();
	$result=$connection->query("select * from user_info where id=$id")->fetch_assoc();
	$name = $result['name'];
	$email= $result['email'];
	$dob = $result['dob'];
	$gender=$result['gender'];
	$photo=$result['photo'];
	$mobile=$result['mobile'];
	$address=$result['address'];
	$category=$result['category'];
	$arr=array($name,$email,$dob,$gender,$photo,$mobile,$address,$category);
	$connection->close();
	return $arr;
}
if(isset($_GET['id']) && ($_GET['id']!=""))
return setDate($_GET['id']);
?>