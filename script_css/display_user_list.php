<?php
include 'connection.php';
$img="4";
$connection=createConnection();
if(isset($_GET['remove']))
{
	$id=$_GET['id'];
	if($_GET['name']=='remove' && isset($_GET['remove']))
	{
		if($connection->query("delete from user_info where id=$id")==TRUE)
		{
			$connection->query("set @num=0");
			$connection->query("update user_info set id=@num:=(@num+1)");
		}
		else echo "Some error has been occured!";
	}
	if($_GET['name']=='view')
		$img=$connection->query("Select photo from user_info where id=$id")->fetch_assoc()['photo'];
	else echo "Error has occured!";
echo "44545".$img;
}
?>
<!DOCTYPE html>
<html>
<head>
<!-- <link rel="stylesheet" type="text/css" href="style_sheet.css"> -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="validation_script.js"></script>
<title>DisplayUser</title>
</head>
<body>
<?php include 'header.php' ?>;

<div class="container">
	<table class="table table-responsive-sm table-striped table-hover">
		<thead class="thead-dark">
			<tr>
				<th>Id</th> <th>Name</th> <th>EmailId</th> <th>Roll Number</th> 
				<th>DOB</th> <th>Branch</th> <th>gender</th><th>Photo</th><th>Remove</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$connection=createConnection();
			$query="Select * from user_info";
			$result=$connection->query($query);
			if($result->num_rows > 0)
				while($row=$result->fetch_assoc())
				{
					$id=$row['id'];
					$name=$row['name'];
					$email=$row['email_id'];
					$roll=$row['roll'];
					$dob=$row['dob'];
					$branch=$row['branch'];
					$gender=$row['gender'];
					$photo=$row['photo'];
					?>
					<tr>
						<td><?php echo $id;?></td>
						<td><?php echo $name;?></td>
						<td><?php echo $email;?></td>
						<td><?php echo $roll;?></td>
						<td><?php echo $dob;?></td>
						<td><?php echo $branch;?></td>
						<td><?php echo $gender;?></td>
						<td><a href="display_user_list.php?id=<?php echo $id;?>$name=view"><button class="btn btn-dark" name="view" data-toggle="modal" data-target="#myModal">View</button></a></td>

						<td><a href="display_user_list.php?id=<?php echo $id;?>&name=remove"><button class="btn btn-primary" name="remove">&times;</button></a></td>
					</tr>
				<?php }

			?>
		</tbody>
	</table>	
	</div>

  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
     <!--    <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
         -->
        <!-- Modal body -->
        <div class="modal-body">
          <img src="<?php echo($id) ?>">
        </div>
        
        <!-- Modal footer -->
      <!--   <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> -->
        
      </div>
    </div>
  </div>



<?php include 'footer.php';?>
</body>
</html>