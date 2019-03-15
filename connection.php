<?php
function createConnection()
{
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="myprojectdb";
	$connection = new mysqli($servername,$username,$password,$dbname);
	if($connection->connect_error)
		die("Connection was not established!<br>".$connection->connect_error);
	else return $connection;
	$connection->query("set @num=0");
	$connection->query("update user_info set id=@num:=(@num+1)");
}
function cleanData($data)
{
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
?>
</body>
</html>