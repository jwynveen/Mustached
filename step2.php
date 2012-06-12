<?php
	require_once("includes/facebook.php");
	$accessToken = $_POST['access_token'];
	if (!$facebook) {
		$facebook = new Facebook();
		$facebook->setAccessToken($accessToken);
	}
	$photo = $_POST['photo'];
	if ($photo) {
		$picture = $facebook->api($photo);
		$picFilename = $picture['source'];
	} else {
		$picFilename = $_POST['picFilename'];
	}
	$mustacheFilename = $_POST["mustache-filename"][0];
	$mustacheX = $_POST["mustache-x"][0];
	$mustacheY = $_POST["mustache-y"][0];
	$mustacheWidth = $_POST["mustache-width"][0];
	$mustacheHeight = $_POST["mustache-height"][0];
	
	if ($picFilename == NULL) $picFilename = "images/profilePic.gif";
	if ($mustacheFilename == NULL) $mustacheFilename = "images/Connoisseur.png";
	list($width, $height, $type, $attr) = getimagesize($picFilename);
	
	if($mustacheWidth == NULL && $mustacheHeight == null)
		list($mustacheWidth, $mustacheHeight, $mType, $mAttr) = getimagesize($mustacheFilename);
	if ($mustacheX == NULL && $mustacheY == NULL){
		$mustacheX = ($width - $mustacheWidth) / 2;
		$mustacheY = ($height - $mustacheHeight) / 2;
	}
?>

<h2>Step 2</h2>
<div id="picture-canvas" style="position:relative;width:<?php echo $width ?>px;height:<?php echo $height ?>px;">
	<img src="<?php echo $picFilename ?>" style="width:<?php echo $width ?>px;height:<?php echo $height ?>px;" />
	<div class="draggable resizable" style="border:1px dotted black;position:absolute;left:<?php echo $mustacheX ?>px;top:<?php echo $mustacheY ?>px;width:<?php echo $mustacheWidth ?>px;height:<?php echo $mustacheHeight ?>px;">
		<img src="<?php echo $mustacheFilename ?>" style="width:100%;height:100%;" />
	</div>
</div>
<div id="mustache-selector">
	<ul>
		<li><img src="images/Abrakadabra.png" alt="Abrakadabra" data-height="70px" /></li>
		<li><img src="images/AfterEight.png" alt="After Eight" data-height="20px" /></li>
		<li><img src="images/BoxCar.png" alt="Box Car" data-height="45px" /></li>
		<li><img src="images/BusinessMan.png" alt="Business Man" data-height="85px" /></li>
		<li><img src="images/Connoisseur.png" alt="Connoisseur" data-height="65px" /></li>
		<li><img src="images/Regent.png" alt="Regent" data-height="35px" /></li>
		<li><img src="images/RockStar.png" alt="RockStar" data-height="100px" /></li>
		<li><img src="images/Trucker.png" alt="Trucker" data-height="130px" /></li>
		<li><img src="images/UndercoverBrother.png" alt="Undercover Brother" data-height="55px" /></li>
		<li><img src="images/Wispy.png" alt="Wispy" data-height="20px" /></li>
	</ul>
</div>

<input type="text" name="picFilename" value="<?php echo $picFilename ?>" />
<input type="text" name="mustache-filename[0]" value="<?php echo $mustacheFilename ?>" />
<input type="text" name="mustache-x[0]" value="<?php echo $mustacheX ?>" />
<input type="text" name="mustache-y[0]" value="<?php echo $mustacheY ?>" />
<input type="text" name="mustache-width[0]" value="<?php echo $mustacheWidth ?>" />
<input type="text" name="mustache-height[0]" value="<?php echo $mustacheHeight ?>" />
<input type="hidden" name="access_token" value="<?php echo $accessToken ?>" />
<a href="step3.php" class="next">Next</a>
