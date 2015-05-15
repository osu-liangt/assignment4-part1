<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/plain'); // JSON output

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$type = "GET";
	if (count($_GET) == 0) {
		$parameters = "null";
	}
	else {
		$parameters = json_encode($_GET);
	}
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$type = "POST";
	if (count($_POST) == 0) {
		$parameters = "null";
	}
	else {
		$parameters = json_encode($_POST);
	}
}

echo "{\"Type\":\"$type\",\"parameters\":$parameters}";

?>