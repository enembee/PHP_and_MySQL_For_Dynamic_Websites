<?php #Calculator script
function create_gallon_radio($value, $name="gallon_price"){
	//Start element
	echo '<input type="radio" name="' . $name . '" value="' . $value . '"';
	//Check for stickiness
	if (isset($_POST[$name]) && ($_POST[$name] == $value)) {
		echo 'checked="checked"';
	}
	//Complete the element
	echo "/> $value ";
}//End create_gallon_radio function

function calculate_trip_cost($miles, $mpg, $ppg){
	$gallons = $miles/$mpg;
	$dollars = $gallons/$ppg;
	return number_format($dollars, 2);
}//End calculate_trip_cost function

$page_title = "Trip Cost Calculator";
include("includes/header.html");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["distance"], $_POST["gallon_price"], $_POST["efficiency"]) && is_numeric($_POST["distance"]) && is_numeric($_POST["gallon_price"]) && is_numeric($_POST["efficiency"])) {
		$cost = calculate_trip_cost($_POST["distance"], $_POST["efficiency"], $_POST["gallon_price"]);
		$hours = $_POST["distance"] / 65;

		// Print the results of the calculation
		echo "<h1>Total Estimated Cost</h1>
		<p>The total cost of driving " . $_POST["distance"] . " miles, averaging " . $_POST["efficiency"] . " miles per gallon and paying an average of $" . $_POST["gallon_price"] . " per gallon, is $" . $cost . ". If you drive at an average of 65 miles per hour, the trip will take approximately " . number_format($hours, 2) . " hours.</p>";
	}
	else { // Invalid values submitted
		echo "<h1>Error!</h1>
		<p class=\"error\">Please enter a valid distance, price per gallon, and fuel efficiency</p>";
	}
}
?>
<h1>Trip Cost Calculator</h1>
<form action="calculator.php" method="post">
	<p>Distance (in miles): <input type="text" name="distance" value="<?php if (isset($_POST['distance'])){
		echo $_POST['distance'];
		} ?>" /></p>
	<p>Ave. Price Per Gallon: <span class="input">
		<?php
		create_gallon_radio("3.00");
		create_gallon_radio("3.50");
		create_gallon_radio("4.00");
		?>
	</span></p>
	<p>Fuel Efficiency: <select name="efficiency">
		<option value="10" <?php if(isset($_POST["efficiency"]) && ($_POST["efficiency"] == "10")) echo "selected=\"selected\""; ?>>Terrible</option>
		<option value="20" <?php if(isset($_POST["efficiency"]) && ($_POST["efficiency"] == "20")) echo "selected=\"selected\""; ?>>Decent</option>
		<option value="30" <?php if(isset($_POST["efficiency"]) && ($_POST["efficiency"] == "30")) echo "selected=\"selected\""; ?>>Very Good</option>
		<option value="50" <?php if(isset($_POST["efficiency"]) && ($_POST["efficiency"] == "50")) echo "selected=\"selected\""; ?>>Outstanding</option>
	</select></p>
	<p><input type="submit" name="submit" value="Calculate!" /></p>
</form>
<?php include("includes/footer.html"); ?>