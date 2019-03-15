<?php
if(isset($_POST['submit']))
{
include 'connection.php';
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$dob=$_POST['dob'];
$category=$_POST['category'];
$gender=$_POST['gender'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$photo='images/'.$_FILES['photo']['name'];
move_uploaded_file($_FILES['photo']['tmp_name'],$photo);
}
function cleanAll($name,$email,$dob,$gender,$photo,$password,$mobile,$address,$category)
{
	$name=cleanData($name);
	$email=cleanData($email);
	$password=cleanData($password);
	$dob=cleanData($dob);
	$category=cleanData($category);
	$gender=cleanData($gender);
	$photo=cleanData($photo);
	$mobile=cleanData($mobile);
	$address=cleanData($address);
	$array = array($name,$email,$dob,$gender,$photo,$password,$mobile,$address,$category);
	return $array;
}
function isExisting($email)
{
	$connection = createConnection();
	$result=$connection->query("select name from user_info where email='{$email}'");
	$result=$result->fetch_assoc();
	$connection->close();
	if($result==NULL)
		return false;
	return true;
}
function displaySuccessMessage($name,$email,$dob,$gender,$photo,$password,$mobile,$address,$category)
{
	$array=cleanAll($name,$email,$dob,$gender,$photo,$password,$mobile,$address,$category);
	$connection = createConnection();
	$statement=$connection->prepare("insert into user_info(name,email,dob,gender,photo,password,date,mobile,address,category) values(?,?,?,?,?,?,?,?,?,?)");

	$statement->bind_param("sssssssiss",$array[0],$array[1],$array[2],$array[3],$array[4],$array[5],date("d/m/Y"),$array[6],$array[7],$array[8]);
	$statement->execute();
	$statement->close();
	$connection->close();
	?>
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<div id="confirmation" class="shadow p-4 mb-4 bg-white">
				<h1 style="margin-top: 60px;" class="text text-success">Register Success</h1>
				<h5>Yout Account has been successfully Registered</h5>
			<a href="signup.php" class="btn btn-primary">Back</a>
			</div>
		</div>
	<div class="col-sm-2"></div>
	</div>
<?php
}

function displayFailMessage()
{?>
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<div id="confirmation" class="shadow p-4 mb-4 bg-white">
				<h1 style="margin-top: 60px;" class="text text-info"><U>Email Id Exist</U></h1>
				<h5>Try Using Diffferent Email Id or Category</h5>
			<a href="signup.php" class="btn btn-primary">Back</a>
			</div>
		</div>
	<div class="col-sm-2"></div>
	</div>
<?php
}
?>
<!DOCTYPE html>
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
<title>Process</title>
</head>
<body>
<?php
include 'header.php';
if(!isExisting($email))
	displaySuccessMessage($name,$email,$dob,$gender,$photo,$password,$mobile,$address,$category);
else displayFailMessage();
include 'footer.php';
?>
</body>
</html>