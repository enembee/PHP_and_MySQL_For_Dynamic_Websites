<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Strings</title>
</head>
<body>
	<?php
	$first_name = "Haruki";
	$last_name = "Murakami";

	$author = $first_name . " " . $last_name;

	$book = "Kafka On The Shore";

	echo "<p>The book <em>$book</em> was written by $author</p>";
	?>
</body>
</html>