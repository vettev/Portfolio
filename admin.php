<?php 
	session_start();
	if(!isset($_SESSION['login']) )
	{
		header("Location: login.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin panel</title>
	<link rel="stylesheet" href="css/style.css" />
	<style>
		table td, table th
		{
			border: 1px solid rgba(255, 255, 255, 0.25);
			padding: 1em;
		}
		table tr:nth-child(odd)
		{
			background: rgba(0, 0, 0, 0.15);
		}
		a
		{
			color: rgb(50, 128, 250)!important;
			transition: 0.3s color;
		}
		a:hover
		{
			color: rgb(80, 200, 255)!important;
		}
	</style>
</head>
<body>
	<table>
	<tr>
		<th>#</th>
		<th>Name</th>
		<th>Email</th>
		<th>Title</th>
		<th>Message</th>
		<th>Options</th>
	</tr>
	<?php
		require_once("config.php");
		try
		{
			$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
			$result = $db->query("SELECT * FROM messages");
			foreach ($result->fetchAll() as $val)
			{
				echo "<tr>";
				echo "<td>" . $val['id'] . "</td>";
				echo "<td>" . $val['name'] . "</td>";
				echo "<td>" . $val['email'] . "</td>";
				echo "<td>" . $val['title'] . "</td>";
				echo "<td>" . $val['content'] . "</td>";
				echo "<td>" . '<a href="message_delete.php?id='.$val['id'].'">Delete</a>' . "</td>";
				echo "</tr>";
			}
		}
		catch (PDOException $e)
		{
			echo "Database error: " . $e->getCode();			
		}
		if(isset($_SESSION['adminMessage']) )
		{
			echo '<script>alert("' .$_SESSION['adminMessage'].'")</script>';
			unset($_SESSION['adminMessage']);		
		}
	?>
	</table>
	<a href="logout.php" title="Logout">Logout</a>
</body>
</html>