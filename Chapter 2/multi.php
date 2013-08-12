<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Multidimensional Arrays</title>
</head>
<body>
	<p>Some North American States, Provinces, and Territories</p>
	<?php
	//Mexican states
	$mexico = array(
		"YU" => "Yucatan",
		"BC" => "Baja California",
		"OA" => "Oaxaca"
		);

	//US states
	$us = array(
		"MD" => "Maryland",
		"IL" => "Illinois",
		"PA" => "Pennsylvania",
		"IA" => "Iowa"
		);

	//Canadian provinces
	$canada = array(
		"QC" => "Quebec",
		"AB" => "Alberta",
		"NT" => "Northwest Territories",
		"YT" => "Yukon",
		"PE" => "Prince Edward Island",
		"ON" => "Ontario"
		);

	//Combine all to make a multidimensional array
	$n_america = array(
		"Mexico" => $mexico,
		"United States" => $us,
		"Canada" => $canada
		);

	foreach ($n_america as $country => $list) {
		echo "<h2>$country</h2><ul>";
		foreach ($list as $key => $value) {
			echo "<li>$key - $value</li>\n";
		}
		echo "</ul>";
	}
	?>
</body>
</html>