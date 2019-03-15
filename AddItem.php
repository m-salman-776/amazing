<?php
session_start();
include 'connection.php';?>
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
<title>AddItem</title>
</head>
<body style="background-color: #f7f7f7">
<?php include 'header.php'?>
<div class="container-fluid">
	<div class="row">
		<di class="col-sm-3"></di>
		<div class="col-sm-6 shadow p-4 mb-4 bg-white" style="margin-top: 12px;">
			<form action="add_item_success.php" method="post" enctype="multipart/form-data" name = "Add_remove" onsubmit="return validateForm(this,5);">
				<div class="form-group">
					<label for="">Name : </label>
					<input type="text" name="name" class="form-control">
					<span id="nameErr" class="text text-danger"></span>
				</div>
				<div class="form-group">
					<label for="">Category : </label>
					<select class="form-control custom-select" name="category">
						<option value="" selected>Choose Category</option>
						<option value="Alliances">Alliances</option>
						<option value="App & Games">App & Games</option>
						<option value="Baby">Baby</option>
						<option value="Beauty">Beauty</option>
						<option value="Books">Books</option>
						<option value="Clothings">Clothings</option>
						<option value="Kitchen">Kitchen</option>
					</select>
					<span id="categoryErr" class="text text-danger"></span>
				</div>
				<div class="form-group">
					<label for="">Price : </label>
					<input type="number" name="price" class="form-control">
					<span id="priceErr" class="text text-danger"></span>
				</div> 
				<div class="form-group custom-file">
					<label for="" class="custom-file-label">Images :</label>
					<input type="file" name="image" class="form-control custom-file-input">
					<span id="imageErr" class="text text-danger"></span>
				</div>
				<div class="form-group">
					<label for="">Seller</label>
					<input type="text" name="seller" class="form-control">
					<span id="sellerErr" class="text text-danger"></span>
				</div>
				<div class="form-group">
					<label for="">Description : </label>
					<textarea name="description" class="form-control" rows="6" col="15" placeholder="Optional"></textarea>
					<span id="descriptionErr" class="text text-danger"></span>
				</div>
				<input type="submit" name="add" value="Add Product" class="btn btn-primary">
				<input type="reset" name="clear" class="btn btn-primary">
			</form>
		</div>
		<di class="col-sm-3"></di>
	</div>	
</div>
<?php include 'footer.php'?>
</body>
</html>
