<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Predefined Variables</title>
</head>
<body>
	<?php
	$file = $_SERVER['SCRIPT_FILENAME'];
	$user = $_SERVER['HTTP_USER_AGENT'];
	$server = $_SERVER['SERVER_SOFTWARE'];

	echo "<p>You are running the file:<br /><b>$file</b></p>";
	echo "<p>You are viewing this page using:<br /><b>$user</b></p>";
	echo "<p>The server is running:<br /><b>$server</b></p>";
	?>
</body>
</html>