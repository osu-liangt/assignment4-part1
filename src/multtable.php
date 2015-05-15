<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html'); // text/plain for raw html output
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Multiplication Table</title>
</head>
<body>
<?php

	$bad_input = false;

	$input_parameters = array(
		"min-multiplicand",
		"max-multiplicand",
		"min-multiplier",
		"max-multiplier");

	$integer_inputs = array();

	foreach ($input_parameters as $item) {
		if (empty($_GET[$item])) {
			echo "<p>Missing parameter $item.</p>\n";
			$bad_input = true;
		}
		else if (strval(intval($_GET[$item])) != $_GET[$item]) {
			echo "<p>$item must be an integer.</p>\n";
			$bad_input = true;
		}
		else {
			$integer_inputs[$item] = intval($_GET[$item]);
		}
	}

	if ($integer_inputs["min-multiplicand"] > $integer_inputs["max-multiplicand"]) {
		echo "<p>Minimum multiplicand larger than maximum</p>\n";
		$bad_input = true;
	}

	if ($integer_inputs["min-multiplier"] > $integer_inputs["max-multiplier"]) {
		echo "<p>Minimum multiplier larger than maximum</p>\n";
		$bad_input = true;
	}

	// If everything good, generate table

	if (!$bad_input) {

		$min_multiplicand = $integer_inputs["min-multiplicand"];
		$max_multiplicand = $integer_inputs["max-multiplicand"];
		$min_multiplier = $integer_inputs["min-multiplier"];
		$max_multiplier = $integer_inputs["max-multiplier"];

		$width =
			$max_multiplier -
			$min_multiplier + 2;

		$height = 
			$max_multiplicand - 
			$min_multiplicand + 2;

		echo "<table>\n";
		echo "<caption>Multiplication Table</caption>\n";
			echo "<thead>\n";
				echo "<tr>\n";
				for ($i = 0; $i < $width; $i++) {
					if ($i == 0) {
						echo "<th></th>\n";
					}
					else {
						$value = $min_multiplier + $i - 1;
						echo "<th>$value</th>\n";
					}
				}
				echo "</tr>\n";
			echo "</thead>\n";
			echo "<tbody>\n";
				for ($j = 1; $j < $height; $j++) {
					echo "<tr>\n";
					for ($i = 0; $i < $width; $i++) {
						if ($i == 0) {
							$value = $min_multiplicand + $j - 1;
							echo "<th>$value</th>\n"; 
						}
						else {
							$value =
								($min_multiplier + $i - 1) *
								($min_multiplicand + $j - 1);
							echo "<td>$value</td>\n";
						}
					}
					echo "</tr>\n";
				}
			echo "</tbody>\n";
		echo "</table>\n";
	}
?>
</body>
</html>