<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
</head>
<body>
	<?php
		session_start();
		if(isset($_SESSION['login']))
		{
			header("Location: admin.php");
		}
		if(isset($_POST['submit']))
		{
			require_once("config.php");
			$login = $_POST['login'];
			$password = $_POST['password'];
			try
			{
				$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
				$query = $db->prepare("SELECT * FROM admins WHERE login = :login");
				$query->bindValue(":login", $login, PDO::PARAM_STR);
				$query->execute();
				$result = $query->fetch();
				$success = password_verify($password, $result['password']);
				$query->closeCursor();
				if($success)
				{
					$_SESSION['login'] = $login;
					header("Location: admin.php");
				}
				else
				{
					echo "Invalid login or password";
				}
			}
			catch (PDOException $e)
			{
				echo "Database error: " . $e->getCode();
			}	
		}
	?>
	<form method="post">
		<label for="login">Login</label><input type="text" name="login" id="login" />
		<label for="password">Password</label><input type="password" name="password" id="password" />
		<input type="submit" name="submit" value="Login" />
	</form>
</body>
</html>