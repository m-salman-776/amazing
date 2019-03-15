<?php
function setNameForHeader()
{	$user="";
	if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==true))
	{
		$connection=createConnection();
		$email=$_SESSION['email'];
		$user=$connection->query("select name from user_info where email='{$email}'")->fetch_assoc()['name'];
	$connection->close();
	}
	if($user=="")
	$_SESSION['p']='Log in';
	else $_SESSION['p']=$user;
} 
function logOut()
{
	session_unset();
	session_destroy();
}
?>
	<div class="row nvbar stick-top" style="background-color: #232f3e;">
	<div class="col-sm-2"></div>
	<div class="col-sm-10">
	<form action="./search.php" method="POST">
	<div class="input-group" style="margin-top: 10px;">
		<select class="custom-select" style="flex: none; width: auto;" name ="category">
			<option value="*">All</option>
			<option value="Appliances">Appliances</option>
			<option value="App&Games">App&Games</option>
			<option value="Baby">Baby</option>
			<option value="Beauty">Beauty</option>
			<option value="Books">Books</option>
			<option value="Clothing">Clothing</option>
			<option value="Kitchen">Kitchen</option>
		</select>
		<input type="text" name="search_query" class="col-sm-6">
		<input type="submit" name="Search" value="Search" class="btn btn-primary" class="col-sm-1">
	</div>
	</form>
	<nav class="navbar fix-top navbar-expand-sm justify-content-center">
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="AddItem.php">Add Item</a></li>
			<li class="nav-item" id="drop" onmouseover="drop_div();" onmouseout="hide_div();" style="position: relative;"><a class="nav-link" href="login.php"><?php setNameForHeader();echo $_SESSION['p'];?></a>

				<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ ?>
				<ul id="signout" style="position: absolute;">
					<li><a href="">Control Panel</a></li>
					<li><a href="login.php?logout=true">Logout</a></li>
				</ul>
			<?php } ?>
			</li>
		</ul>
	</nav>
	</div>
</div>
