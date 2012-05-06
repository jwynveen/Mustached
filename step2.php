<?php
	$picFilename = $_POST["picFilename"];
	$mustacheFilename = $_POST["mustache-filename"][0];
	$mustacheX = $_POST["mustache-x"][0];
	$mustacheY = $_POST["mustache-y"][0];
	$mustacheWidth = $_POST["mustache-width"][0];
	$mustacheHeight = $_POST["mustache-height"][0];
	
	if ($picFilename == NULL) $picFilename = "images/profilePic.gif";
	if ($mustacheFilename == NULL) $mustacheFilename = "images/Mustache1.png";
	list($width, $height, $type, $attr) = getimagesize($picFilename);
	
	if($mustacheWidth == NULL && $mustacheHeight == null)
		list($mustacheWidth, $mustacheHeight, $mType, $mAttr) = getimagesize($mustacheFilename);
	if ($mustacheX == NULL && $mustacheY == NULL){
		$mustacheX = ($width - $mustacheWidth) / 2;
		$mustacheY = ($height - $mustacheHeight) / 2;
	}
?>

<h2>Step 2</h2>
<p><input type="text" value="<?php echo $picFilename ?>" /></p>
<div id="profile-pic" style="position:relative;width:<?php echo $width ?>px;height:<?php echo $height ?>px;">
	<img src="<?php echo $picFilename ?>" style="width:<?php echo $width ?>px;height:<?php echo $height ?>px;" />
	<div class="draggable resizable" style="border:1px dotted black;position:absolute;left:<?php echo $mustacheX ?>px;top:<?php echo $mustacheY ?>px;width:<?php echo $mustacheWidth ?>px;height:<?php echo $mustacheHeight ?>px;">
		<img src="<?php echo $mustacheFilename ?>" style="width:100%;height:100%;" />
	</div>
</div>
<div id="pic-selector">(mustache selector will be here)</div>

<input type="text" name="mustache-filename[0]" value="<?php echo $mustacheFilename ?>" />
<input type="text" name="mustache-x[0]" value="<?php echo $mustacheX ?>" />
<input type="text" name="mustache-y[0]" value="<?php echo $mustacheY ?>" />
<input type="text" name="mustache-width[0]" value="<?php echo $mustacheWidth ?>" />
<input type="text" name="mustache-height[0]" value="<?php echo $mustacheHeight ?>" />
<a href="step3.php" class="next">Next</a>
