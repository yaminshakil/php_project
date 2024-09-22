 <?php
	
	session_start();

	$conn=mysqli_connect("localhost","root","","php_ecom");


	if(!isset($_SESSION['user_email']))
	{

		header("location:../home/login.php");

	}

	else if ($_SESSION['usertype'] =="user") 
	{
		header("location:../home/login.php");
	}

	$is_user="user";

	$sql="SELECT * from users Where usertype='$is_user'";

	$result = mysqli_query($conn,$sql);


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link rel="stylesheet" type="text/css" href="admin_style.css">
</head>
<body>

	<div class="wrapper">

		<div class="sidebar">

			<h2>Ecom Admin</h2>

			<ul>
				<li>
					<a href="adminpage.php">Dashboard</a>
				</li>

				<li>
					<a href="users.php">Users</a>
				</li>

				<li>
					<a href="add_product.php">Add products</a>
				</li>

				<li>
					<a href="display_product.php">View Products</a>
				</li>

				<li>
					<a href="all_orders.php">Orders</a>
				</li>
			</ul>
			

		</div>


		<div class="header">

			<div class="admin_header">
				<a href="../logout.php">Logout</a>
			</div>

			<div class="info">

				 <h1>All Users</h1>

				 <table>
				 	<tr>
				 		<th>User Name</th>
				 		<th>Email</th>
				 		<th>Phone</th>
				 		<th>Address</th>
				 	</tr>


				 	<?php

				 	while($row=mysqli_fetch_assoc($result))

				 	{

				 	?>


				 	<tr>
				 		<td><?php echo $row['name'] ?></td>
				 		<td><?php echo $row['email'] ?></td>
				 		<td><?php echo $row['phone'] ?></td>
				 		<td><?php echo $row['address'] ?></td>
				 	</tr>


				 	<?php 

				 	}

				 	?>

				 	


				 </table>
				

			</div>
			
		</div>
		


	</div>

</body>
</html>