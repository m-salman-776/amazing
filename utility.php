<?php
session_start();
include("connection.php");
if(isset($_POST["Search"]))
{
	$cat = $_POST['category'];
	$search_query = $_POST["search_query"];
	$cat = cleanData($cat);
	$search_query = cleanData($search_query);
	if($cat == "*")
		$query = "select * from products where name like '%{$search_query}%'";
	else
		$query = "select * from products where category='{$cat}' and name like '%{$search_query}%'";
}
else $query = "select * from products";

$conn = createConnection();
$result = $conn->query($query);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="script_css/style_sheet.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="script_css/script.js"></script>
<title>SignIn/UP</title>
</head>
<body style="background-color: #f7f7f7">
<?php
include 'header.php';?>
<div class ="row">
<div class ="col-sm-3"></div>
<div class="col-sm-9">
<?php 
if($result != NULL)
{
	while($row=$result->fetch_assoc())
	{?>
		<span style="height: 450px;margin-top: 30px;" class="row shadow p-4 mb-10 bg-white">
		<div class="col-sm-6" style="background-color: yellow"><img src="<?php echo $row['image'];?>" class="img-fluid rounded"style="height: 380px;"></div>
		<div class="col-sm-6" style="background-color: green;"> 
			<h2 style="margin-top: 10px;"><?php echo($row['name']); ?></h2><br>
			<h5>Lorem ipsdipisicing elit, sed do eiusmod
			tempor it enim ad minim m</h5><br>
			<h6>Lorem ipsum dolocing elit, sed do eiusmod</h6><br>
			<a href="./details.php?id=<?php echo $row['id'];?>"><button class="btn btn-primary">View Details</button></a>
		</div>
		</span>
		<hr>
<?php	}
}
?>
</div>
</div>
<?php include 'footer.php';?>
</body>