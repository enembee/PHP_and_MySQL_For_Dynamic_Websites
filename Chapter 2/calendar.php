<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Calendar</title>
</head>
<body>
	<form action="calendar.php" method="post">
		<?php
		
		$months = array(1=>"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

		//Generate month dropdown
		echo "<select name='month'>";
		foreach ($months as $key => $value) {
			echo "<option value=\"$key\">$value</option>\n";
		}
		echo "</select>";

		//Generate day dropdown
		echo "<select name='day'";
		for ($day=0; $day <= 31 ; $day++) { 
			echo "<option value=\"$day\">$day</value>";
		}
		echo "</select>";

		//Generate year dropdown
		echo "<select name='year'>";
		for ($year=2011; $year <= 2021 ; $year++) { 
			echo "<option value=\"$year\">$year</value>";
		}
		echo "</select>";
		?>
	</form>
</body>
</html>