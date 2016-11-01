<?php
	session_start();
	if(!isset($_GET['id']) || intval($_GET['id']) === 0 || !isset($_SESSION['login']) )
	{
		header("Location: admin.php");
		$_SESSION['adminMessage'] = "Error";
	} 
	else
	{
		$id = intval($_GET['id']);
		require_once("config.php");
		try
		{
			$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
			$query = $db->prepare("DELETE FROM messages WHERE id=:id");
			$query->bindValue(":id", $id, PDO::PARAM_INT);
			$query->execute();
			$_SESSION['adminMessage'] = "Message deleted.";
			header("Location: admin.php");
		}
		catch (PDOException $e)
		{
			echo "Database error: " . $e->getCode();
		}	
	}
 ?>