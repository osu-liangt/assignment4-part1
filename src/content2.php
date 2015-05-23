<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html');
session_start();
// Case: login never visited
if (!isset($_SESSION["login_visited"]) || $_SESSION["login_visited"] == false) {
	header('Location: login.php');
}
// Case: login visited, no username posted and no username previously posted
else if (!isset($_POST["username"]) && !isset($_SESSION["username"])) {
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Content 2</title>
</head>
<body>
	<a href="content1.php">Link to content1.php</a>
</body>
</html>