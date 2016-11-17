<!DOCTYPE HTML>
<html>
<head>
	<title>Gallery</title>
	<link rel="stylesheet" type="text/css" href="css/gallery.css">
	<meta charset="utf-8">
</head>
<body>
	<div id="simple-gallery">
	<?php
		function compressImage($source_url, $destination_url, $quality) 
		{
    		$info = getimagesize($source_url);
    		if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
    		elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
    		elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
		    imagejpeg($image, $destination_url, $quality);
		
    		return $destination_url;
    	}
		$files = scandir("img/", 0);
		$optfiles = scandir("img/opt-img", 0);

		//CHECK AND COMPRESS IMAGES BEFORE DISPLAYING THEM
		if (count($files) > count($optfiles))
		{
				for ($i = 2; $i < count($files); $i += 1)
				{
						if (!in_array($files[$i], $optfiles))
						{
							compressImage("img/" . $files[$i], "img/opt-img/" . $files[$i], 20);
						}
				}
		}

		//NOW THEY ARE DISPLAYED
		if (count($files) > 2)
		{
			for ($i = 2; $i < count($optfiles); $i += 1)
			{
				echo '<span class="img-bloc" style="background-image:url(\'img/opt-img/' . $optfiles[$i] . '\' );"></span>';
			}
		}
	?>
	</div>
	<!-- P147x | Lucas DEBOUTÉ | 2016 -->
	<!-- Simple gallery for GitHub (https://github.com/P147x/simple-gallery) -->
</body>
</html>