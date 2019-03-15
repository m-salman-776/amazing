<?php
include 'connection.php';
$connection=createConnection();
$id=$_GET['id'];
$query="select * from products where id=".$id;
$result=$connection->query($query);
$image=$connection->query('select image from products where id='.$id)->fetch_assoc()['image'];
$name=$connection->query('select name from products where id='.$id)->fetch_assoc()['name'];
?>
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
<title>details</title>
</head>
<body>
	<?php include 'header.php';?>
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<div class="row" style="margin-top: 10px;">
				<div class="col-sm-5">
					<img src="<?php echo $image;?>" class="img-fluid rounded">
				</div>
				<span class="col-sm-1"></span>
				<div class="col-sm-4" style="margin-top: 20px;">
					<h1><?php echo $name?></h1>
					<table class="table">
						<?php
						if($result!=NULL)
						{
							echo "<tbody>";
							$row=$result->fetch_assoc();
							foreach ($row as $key => $value) 
							if($key!='image')
							echo '<tr>'.'<td>'.$key.'</td>'.'<td>'.$value.'</td>'.'</tr>';
							echo "</tbody>";
						}
						else echo "No result obtained";
					?>			
					</table>
				</div>
			</div>
		</div>
		<div class="col-sm-1"></div>
	</div>
	<?php include 'footer.php';?>
</body>
</html>
