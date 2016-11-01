<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	if(isset($_POST['submit']))
	{
		session_start();
		require_once("config.php");
		$name = htmlentities($_POST['name']);
		$email = htmlentities($_POST['email']);
		$title = htmlentities($_POST['title']);
		$content = htmlentities($_POST['content']);
		$error = "";
		$isOk = true;

		if(!$name || !$email || !$content)
		{
			$error = "You need to fill required fields.";
			$isOk = false;
		}
		if(!preg_match("/@/", $email))
		{
			$error +="<br/>Email seems to be not valid.";
			$isOk = false;
		}
		if($isOk)
		{
			try
			{
				$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
				$query = $db->prepare("INSERT INTO messages VALUES (NULL, :name, :email, :title, :content)");
				$query->bindValue(":name", $name, PDO::PARAM_STR);
				$query->bindValue(":email", $email, PDO::PARAM_STR);
				$query->bindValue(":title", $title, PDO::PARAM_STR);
				$query->bindValue(":content", $content, PDO::PARAM_STR);
				$query->execute();
				$query->closeCursor();
				$_SESSION['message'] = "Message sent successfully.";
				header("Location: index.php");

			}
			catch(PDOException $e)
			{
				echo "Database eror: " . $e->getCode();
			}
		}
		else
		{
			$_SESSION['message'] = $error;
			header("Location: index.php");
		}
	}
	else
	{
		header("Location: index.php");
	}
?>
</body>
</html>