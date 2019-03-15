<?php
session_start();
include 'connection.php';

function getResult($data)
{
	$connection=createConnection();
$result=$connection->query("select id,image,name,price from products where category='{$data}'");
	$data=[];
	while($row=$result->fetch_assoc())
	$data[]=$row;
	$connection->close();
	return $data;
}
function getCategories()
{
	$connection=createConnection();
	$result=$connection->query("select distinct category from products");
	$category=[];
	while($row=$result->fetch_assoc())	
		$category[]=$row['category'];
	$connection->close();
	return $category;
}
function display($item,$cat)
{?>
	<div class="col-sm-4">
	<div class="card shadow p-4 mb-4 bg-white" >
  	<img class="card-img-top image-fluid" src="<?php echo $item['image']?>" alt="image" id ="index_image">
  	<div class="card-body">
    <h4 class="card-title" style="text-align: center;"><?php echo $item['name']?> </h4>
    <p class="card-text">Price : <?php echo $item['price']?></p>
    <p class="card-text">Category : <?php echo $cat?></p>
   	<a href="details.php?id=<?php echo $item['id']?>" class="btn btn-primary" style="width: 100%">View Details</a>
 	</div>
	</div>
	</div>
<?php 
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
<title>Index</title>
</head>
<body style="background-color: #f7f7f7">
<?php 
include 'header.php';
include 'carousel.php';
?>
<div class="row">
	<div class="col-sm-3" style="background-color: red;"></div>
	<div class="col-sm-9">
		<?php
		$categories=getCategories();
		foreach($categories as $cat)
		{
			?><div class="row">
				<?php 
			$result=getResult($cat);
			foreach($result as $item)
			{ 
				display($item,$cat);
			}?>
			</div>
			<hr><hr>
		<?php
		}
		?>
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>
