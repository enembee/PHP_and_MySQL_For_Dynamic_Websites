<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhmtl" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Sorting Arrays</title>
</head>
<body>
	<table border="0" cellspacing="3" cellpadding="3" align="center">
		<tr>
			<td><h2>Rating</h2></td>
			<td><h2>Title</h2></td>
			<?php
			//Create the array of movies
			$movies = array(
				"Casablanca" => 10,
				"To Kill A Mockingbird" => 10,
				"The English Patient" => 2,
				"Stranger Than Fiction" => 9,
				"Story Of The Weeping Camel" => 5,
				"Donnie Darko" => 7
				);

			//Print in the original order
			echo "<tr><td colspan='2'><b>In their original order:</b></td></tr>";
			foreach ($movies as $title => $rating) {
				echo "<tr><td>$rating</td><td>$title</td></tr>\n";
			}
			
			//Print in alphabetical order
			ksort($movies);
			echo "<tr><td colspan='2'><b>Sorted by title:</b></td></tr>";
			foreach ($movies as $title => $rating) {
				echo "<tr><td>$rating</td><td>$title</td></tr>\n";
			}

			//Print in order of rating
			arsort($movies);
			echo "<tr><td colspan='2'><b>Sorted by rating:</b></td></tr>";
			foreach ($movies as $title => $rating) {
				echo "<tr><td>$rating</td><td>$title</td></tr>\n";
			}
			?>
		</tr>
	</table>
</body>
</html>