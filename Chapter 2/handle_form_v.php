<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Form Feedback</title>
	<style type="text/css" title="text/css" media="all">
	.error {
		font-weight: bold;
		color: #C00;
	}
	</style>
</head>
<body>
	<?php
	if (!empty($_REQUEST["name"])) {
		$name = $_REQUEST["name"];
	}
	else{
		$name = NULL;
		echo "<p class='error'>You forgot to enter your name!</p>";
	}

	if (!empty($_REQUEST["email"])) {
		$email = $_REQUEST["email"];
	}
	else{
		$email = NULL;
		echo "<p class='error'>You forgot to enter your e-mail address!</p>";
	}

	if (!empty($_REQUEST["comments"])) {
		$comments = $_REQUEST["comments"];
	}
	else{
		$comments = NULL;
		echo "<p class='error'>You forgot to add comments!</p>";
	}

	if (isset($_REQUEST["gender"])) {
		$gender = $_REQUEST["gender"];

		if ($gender == "M") {
			$greeting = "<p><b>Good day, Sir!</b></p>";
		}
		elseif ($gender == "F") {
			$greeting = "<p><b>Good day, Madam!</b></p>";
		}
		else{
			$gender = NULL;
			echo "<p class='error'>You did not specify a gender</p>";
		}
	}
	else{
		$gender = NULL;
		echo "<p class='error'>You did not specify a gender</p>";
	}

	if ($name && $email && $gender && $comments) {
		echo "<p>Thankyou, <b>$name</b>, for the following comments<br/>
			$comments
			</p>
			<p>We will reply to you at <i>$email</i>.</p>\n";
			echo $greeting;
	}
	else{
		echo "<p class='error'>Please go back and fill out the form again.</p>";
	}
	?>
</body>
</html>