<?php 
function display($data)
{
	if(isset($_GET['name']))
		{
		$connection=createConnection();
		$id=$_GET['id'];
		if($_GET['name']=="remove")
		{
			if($connection->query("delete from user_info where id=$id")==TRUE)
			{
				$connection->query("set @num=0");
				$connection->query("update user_info set id=@num:=(@num+1)");
			}
			else echo "Some error has been occured!";
		}
		elseif($_GET['name']=='view'){
			$img=$connection->query("Select photo from user_info where id=$id")->fetch_assoc()['photo'];
			echo $img;
			die();
			exit();
		}
		else echo "Error has occured!";
		$connection->close();
		}
?>

<div class="container" style="margin-top: 10px;">
	<table class="table table-responsive-sm table-striped table-hover">
		<thead class="thead-light">
			<tr>
				<th>Id</th> <th>Name</th> <th>EmailId</th>
				<th>DOB<th>gender</th><th>Category</th><th>Mobile</th><th>Photo</th><th>Remove</th>
			</tr>
		</thead>
		<tbody>

			<?php
			$connection=createConnection();
			$query="Select * from user_info where category='{$data}'";
			$result=$connection->query($query);
			if($result->num_rows > 0)
				while($row=$result->fetch_assoc())
				{
					$id=$row['id'];
					$name=$row['name'];
					$email=$row['email'];
					$dob=$row['dob'];
					$gender=$row['gender'];
					$category=$row['category'];
					$mobile=$row['mobile'];
					$photo=$row['photo'];
					
					$password=$row['password'];
					$address=$row['address'];
			?>
					<tr>
						<td><?php echo $id;?></td>
						<td><?php echo $name;?></td>
						<td><?php echo $email;?></td>
						<td><?php echo $dob;?></td>
						<td><?php echo $gender;?></td>
						<td><?php echo $category;?></td>
						<td><?php echo $mobile;?></td>
						<td><button class="btn btn-dark" name="view">View</button></td>
						<td><a href="portal.php?id=<?php echo $id;?>&name=remove"><button class="btn btn-primary" name="remove">&times;</button></a></td>
					</tr>
				<?php

				}
				else echo "Nothing to display";
						
					?>
		</tbody>
	</table>	
	</div>
<?php 
}
?>