<?php
$page_title = "Delete a User";
include("includes/header.html");
echo "<h1>Delete a User</h1>";

if ( (isset($_GET["id"])) && (is_numeric($_GET['id'])) ) {
	$id = $_GET["id"];
} elseif ( (isset($_POST["id"])) && (is_numeric($_POST["id"]))) {
	$id = $_POST["id"];
} else {
	echo '<p class="error">This page has been accessed in error.</p>';
	include("includes/footer.html");
	exit();
}

require_once("../mysqli_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_POST["sure"] == "Yes") {
		$q = "DELETE FROM users WHERE user_id=$id LIMIT 1";
		$r = @mysqli_query($dbc, $q);

		if (mysqli_affected_rows($dbc) == 1) {
			echo "<p>The user has been deleted.</p>";
		} else {
			echo '<p class="error">The user could not be deleted due to a system error';
			echo '<p>' . mysqli_error($dbc) . '<br />Query:' . '</p>';
		}
	} else {
		echo "<p>The user has NOT been deleted.</p>";
	}
} else {
	$q = "SELECT CONCAT(last_name, ', ', first_name) FROM users WHERE user_id =$id";
	$r = @mysqli_query($dbc, $q);

	if (mysqli_num_rows($r) == 1) {
		$row = mysqli_fetch_array($r, MYSQLI_NUM);

		echo "<h3>Name: $row[0]</h3>
		Are you sure that you want to delete this user?";

		echo '<form action="delete_user.php" method="post">
		<input type="radio" name="sure" value="Yes" />Yes
		<input type="radio" name="sure" value="No" checked="checked" />No
		<input type="submit" name="submit" value="Submit" />
		<input type="hidden" name="id" value="' . $id . '"/>
		</form>';
	} else {
		echo '<p class="error">This page has been accessed in error.</p>';
	}
}

mysqli_close($dbc);
include("includes/footer.html");
?>