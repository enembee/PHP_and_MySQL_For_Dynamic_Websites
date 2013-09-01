<?php
$page_title = "Edit a User";
include("includes/header.html");
echo "<h1>Edit a User</h1>";

if ((isset($_GET["id"])) && (is_numeric($_GET["id"])) ) {
	$id = $_GET["id"];
} elseif ((isset($_POST["id"])) && (is_numeric($_POST["id"]))) {
	$id = $_POST["id"];
} else {
	echo '<p class="error">This page has been accessed in error.</p>';
	include("includes/footer.html");
	exit();
}

require_once("../mysqli_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$errors = array();

	if (empty($_POST["first_name"])) {
		$errors[] = "You forgot to enter your first name";
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST["first_name"]));
	}

	if (empty($_POST["last_name"])) {
		$errors[] = "You forgot to enter your last name";
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST["last_name"]));
	}

	if (empty($_POST["email"])) {
		$errors[] = "You forgot to enter your email address";
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST["email"]));
	}

	if (empty($errors)) {
		$q = "SELECT user_id FROM users WHERE email ='$e' AND user_id != $id";
		$r = @mysqli_query($dbc, $q);

		if (mysqli_num_rows($r) == 0) {
			$q = "UPDATE users SET first_name = '$fn', last_name = '$ln', email = '$e' WHERE user_id = $id LIMIT 1";
			$r = @mysqli_query($dbc, $q);

			if (mysqli_affected_rows($dbc) == 1) {
				echo "<p>The user has been edited.</p>";
			} else {
				echo '<p class="error">The user could not be edited due to a system error.</p>';
				echo "<p>" . mysqli_error($dbc) . "<br />Query:" . $q . "</p>";
			}
		} else {
			echo '<p class="error">The email address has already been registered.</p>';
		}
	} else {
		echo '<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) {
			echo "- $msg<br />\n";
		}
		echo "</p><p>Please try again.</p>";
	}
} // End submit conditional

$q = "SELECT first_name, last_name, email FROM users WHERE user_id = $id";
$r = @mysqli_query($dbc, $q);

if (mysqli_num_rows($r) == 1) {
	$row = mysqli_fetch_array($r, MYSQLI_NUM);

	echo '<form action="edit_user.php" method="post">
	<p>First Name:<input type="text" name="first_name" size="15" maxlength="15" value="' . $row[0] . '"/></p>
	<p>Last Name:<input type="text" name="last_name" size="15" maxlength="30" value="' . $row[1] . '"/></p>
	<p>Email Address:<input type="text" name="email" size="20" maxlength="60" value="' . $row[2] . '"/></p>
	<p><input type="submit" name="submit" value="Submit" /></p>
	<input type="hidden" name="id" value="' . $id . '" />
	</form>';
} else {
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($dbc);
include('includes/footer.html');

?>