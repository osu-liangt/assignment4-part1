<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html');
session_start();
// Case: logout
if (isset($_GET["logout"])) {
	session_destroy();
	header('Location: login.php');
}
// Case: login never visited
else if (!isset($_SESSION["login_visited"]) || $_SESSION["login_visited"] == false) {
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
	<title>Content 1</title>
</head>
<body>
<?php

// Case: login visited, invalid username submitted via post

if (isset($_POST["username"]) &&
		(empty($_POST["username"]) || is_null($_POST["username"]))) {

	echo "<p>A username must be entered. Click <a href=\"login.php\">here</a> to return to the login screen.</p>\n";

	if (isset($_SESSION["username_entered_before"]) &&
		$_SESSION["username_entered_before"] == true) {
		echo "<p>However, you've entered a valid username before, so here's a <a href=\"content2.php\">link to content2.php</a>.</p>\n";
	}

}

// Case: login visited, valid username submitted via post

// $case_1 =
// 	isset($_POST["username"]) &&
// 	!empty($_POST["username"]) &&
//	!is_null($_POST["username"]);

// Case: login visited, valid username submitted previously
// and not posting invalid username

// $case_2 =
// 	isset($_SESSION["username"]) &&
// 	!empty($_SESSION["username"]) &&
// 	!isset($_POST["username"]);
	
// ($case_1 || $case_2)

else {

	$_SESSION["username_entered_before"] = true;
	if (empty($_SESSION["visted_times"])) {
		$_SESSION["visted_times"] = 0;
	}
	$_SESSION["visted_times"]++;
	$visited_times = $_SESSION["visted_times"];
	if (isset($_POST["username"]) && ($_POST["username"] != "")) {
		$_SESSION["username"] = $_POST["username"];
	}
	$username = $_SESSION["username"];
	echo "<p>Hello <strong>$username</strong> you have visited this page $visited_times times before. Click <a href=\"content1.php?logout\">here</a> to logout.</p>\n";
	echo "<p><a href=\"content2.php\">Link to content2.php</a>\n";
}

?>
</body>
</html>