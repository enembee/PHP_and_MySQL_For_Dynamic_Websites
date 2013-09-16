<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	require("includes/login_functions.inc.php");
	require("../mysqli_connect.php");

	list($check, $data) = check_login($dbc, $_POST["email"], $_POST["pass"]);

	if ($check) {
		//setcookie("user_id", $data["user_id"], time()+3600,'/','', 0, 0);
		//setcookie("first_name", $data["first_name"], time()+3600, '/','',0, 0);
		session_start();
		$_SESSION["user_id"] = $data["user_id"];
		$_SESSION["first_name"] = $data["first_name"];
		$_SESSION["agent"] = md5($_SERVER["HTTP_USER_AGENT"]);
		//Redirect user
		redirect_user("loggedin.php");
	} else {
		$errors = $data;
	}

	mysqli_close($dbc);
}
include("includes/login_page.inc.php");
?>