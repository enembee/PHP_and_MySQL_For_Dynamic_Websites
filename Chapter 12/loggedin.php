<?php
session_start();

if (!isset($_SESSION["agent"]) OR ($_SESSION["agent"] != md5($_SESSION["HTTP_USER_AGENT"]))) {
	require("includes/login_functions.inc.php");
	redirect_user();
}

$page_title = "Logged In!";
include("includes/header.html");

// Greet user
echo "<h1>Logged In!</h1>
		<p>You are now logged in, {$_SESSION['first_name']}!</p>
		<p><a href=\"logout.php\">Logout</p>";

include("includes/footer.html");
?>