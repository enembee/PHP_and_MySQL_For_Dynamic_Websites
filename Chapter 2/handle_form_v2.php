<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Form Feedback</title>
</head>
<body>
	<?php
	$name = $_REQUEST["name"];
	$email = $_REQUEST["email"];
	$comments = $_REQUEST["comments"];

	// Conditional
	if (isset($_REQUEST["gender"])) {
		$gender = $_REQUEST["gender"];
	}
	else{
		$gender = NULL;
	}

	//Print out the received values
	echo "<p>Thankyou, <b>$name</b>, for the following comments:<br /><tt>$comments</tt></p><p>We will reply to you at <i>$email</i>.</p>\n";

	//Print extra message dependent on gender
	if ($gender == "M") {
		echo "<p><b>Good day, Sir!</b></p>";
	}
	elseif ($gender == "F") {
		echo "<p><b>Good day, Madam!</b></p>";
	}
	else{
		echo "<p><b>You did not specify a gender</b><p>";
	}
	
	?>
</body>
</html>