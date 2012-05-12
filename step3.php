<?php
	require_once("includes/facebook.php");
	$accessToken = $_POST['access_token'];
	if (!$facebook) {
		$facebook = new Facebook();
		$facebook->setAccessToken($accessToken);
	}
	//ini_set('memory_limit', '-1');
	$picFilename = $_POST["picFilename"];
	$mustacheFilename = $_POST["mustache-filename"][0];
	$mustacheX = $_POST["mustache-x"][0];
	$mustacheY = $_POST["mustache-y"][0];
	$mustacheWidth = $_POST["mustache-width"][0];
	$mustacheHeight = $_POST["mustache-height"][0];
	$generatedFilename = "files/temp.jpg";
	
	if ($picFilename == NULL) $picFilename = "images/profilePic.gif";
	if ($mustacheFilename == NULL) $mustacheFilename = "images/Mustache1.png";
	if ($mustacheX == NULL) $mustacheX = 10;
	if ($mustacheY == NULL) $mustacheY = 10;
	if ($mustacheWidth == NULL) $mustacheWidth = 148;
	if ($mustacheHeight == NULL) $mustacheHeight = 37;
	
	//create image objects
	$bg = imagecreatefromjpeg($picFilename);
	$img = imagecreatefrompng($mustacheFilename);
	$canvas = imagecreatetruecolor(imagesx($bg), imagesy($bg));
	imagealphablending($canvas, true);
	$imgResized = imagecreatetruecolor($mustacheWidth, $mustacheHeight);
	imagealphablending($imgResized, false);
	
	// Resize mustache
	imagecopyresampled($imgResized, $img, 0, 0, 0, 0, $mustacheWidth, $mustacheHeight, imagesx($img), imagesy($img));
	
	// Copy and merge mustache onto background
	imagecopy($canvas, $bg, 0, 0, 0, 0, imagesx($bg), imagesy($bg));
	imagecopy($canvas, $imgResized, $mustacheX, $mustacheY, 0, 0, $mustacheWidth, $mustacheHeight);
	
	// Save merged image to file
	imagejpeg($canvas, $generatedFilename, 100);
	
?>

<h2>Step 3</h2>
<p><input type="text" value="<?php echo $picFilename ?>" /></p>
<div id="profile-pic">
	<img src="<?php echo $generatedFilename . "?" . date_format(date_create(), "YmdHis") ?>" />
</div>
<div id="confirm-message">
	<h3>Nice Stache!</h3>
	<p>Need some grooming yet? <a href="step2.php" class="next back">Go Back</a> and trim it up.</p>
	<p>Do you like it as much as I do? Then you should share it.</p>
	<ul>
		<li>
			<input type="checkbox" name="postAsProfile" id="postAsProfile" checked="checked" />
			<label for="postAsProfile">Save as my profile pic</label></li>
		<li>
			<input type="checkbox" name="postToTimeline" id="postToTimeline" checked="checked" />
			<label for="postToTimeline">Share to my profile</label></li>
	</ul>
	<a href="step4.php" class="share next">Share it!</a>
</div>

<input type="text" name="picFilename" value="<?php echo $picFilename ?>" />
<input type="text" name="generatedFilename" value="<?php echo $generatedFilename ?>" />
<input type="text" name="mustache-filename[0]" value="<?php echo $mustacheFilename ?>" />
<input type="text" name="mustache-x[0]" value="<?php echo $mustacheX ?>" />
<input type="text" name="mustache-y[0]" value="<?php echo $mustacheY ?>" />
<input type="text" name="mustache-width[0]" value="<?php echo $mustacheWidth ?>" />
<input type="text" name="mustache-height[0]" value="<?php echo $mustacheHeight ?>" />
<input type="hidden" name="access_token" value="<?php echo $accessToken ?>" />
<a href="step4.php" class="next">Next</a>
