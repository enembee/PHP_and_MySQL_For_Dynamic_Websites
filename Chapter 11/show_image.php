<?php
$name = FALSE;
if (isset($_GET["image"])) {
	$ext = strtolower(substr($_GET["image"], -4));
	if (($ext == ".jpg") OR ($ext == ".jpeg") OR ($ext == ".png")) {
		$image = "../uploads/{$_GET['image']}";
		if (file_exists($image) && (is_file($image))) {
			$name = $_GET["image"];
		} // END of file_exists() IF
	} // end of $ext IF
} // End of isset($_GET['image']) IF
//echo $name;
if (!$name) {
	$image = "images/unavailable.png";
	$name = "unavailable.png";
}

$info = getimagesize($image);
$fs = filesize($image);

// Send file
header("Content-Type:{$info['mime']}\n");
header("Content-Disposition:inline;filename=\"$name\"\n ");
header("Content-Length:$fs\n");

//Send file
readfile($image);

?>