<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html');
session_start();
$_SESSION["login_visited"] = true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<form action="content1.php" method="POST">
		<p>
			Enter username: 
			<input type="text" name="username">
		</p>
		<p>
			<input type="submit" value="Login">
		</p>
	</form>
</body>
</html>