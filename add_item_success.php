<?php
include 'connection.php';
$name=$_POST['name'];
$category=$_POST['category'];
$price=$_POST['price'];
$seller=$_POST['seller'];
$description=$_POST['description'];
$image='images/'.$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],$image);
	$conn=createConnection();
if($conn->query('select max(id)+1 from products')->fetch_assoc()['max(id)+1']==NULL)
	$id=date('m')*100000 + date('d')*1000;
else $id=$conn->query('select max(id)+1 from products')->fetch_assoc()['max(id)+1'];
$insert_date=date("d/m/Y");
	$statement=$conn->prepare("insert into products(id,name,category,seller,date,price,description,image) values(?,?,?,?,?,?,?,?)");
	$statement->bind_param('issssiss',$id,$name,$category,$seller,date("d/m/Y"),$price,$description,$image);
	$statement->execute();
	echo "".mysqli_error($conn);
	$statement->close();
	$conn->close();
	echo "Date added to data base";
?>