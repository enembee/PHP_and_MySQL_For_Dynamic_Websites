<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Images</title>
	<script type="text/javascript" charset="utf-8" src="js/function.js"></script>
</head>
<body>
	<p>Click on an image to view it in a seperate window.</p>
	<ul>
	<?php
	date_default_timezone_set('America/Toronto');
	$dir = "../uploads";
	$files = scandir($dir);
	foreach ($files as $image) {
		if (substr($image, 0, 1)!='.') {
			$image_size = getimagesize("$dir/$image");
			$image_name = urlencode($image);
			$file_size = round((filesize("$dir/$image"))/1024) . "kb";
		$image_date = date("F d, Y H:i:s", filemtime("$dir/$image"));
			echo "<li><a href=\"javascript:create_window('$image_name',$image_size[0],$image_size[1])\">$image</a> $file_size ($image_date)</li>\n";
		}
	}
	?>
	</ul>
</body>
</html>