<?php
    //phpinfo();
    $picFilename = $_POST["picFilename"];
	if ($picFilename == NULL) $picFilename = "images/profilePic.gif";
	list($width, $height, $type, $attr) = getimagesize($picFilename);
	$width *= 2;
	$height *= 2;
	list($mWidth, $mHeight, $mType, $mAttr) = getimagesize("images/Mustache1.png");
?>

<h2>Step 2</h2>
<p><input type="text" value="<?php echo $picFilename ?>" /></p>
<div id="profile-pic" style="position:relative;width:<?php echo $width ?>px;height:<?php echo $height ?>px;">
	<img src="<?php echo $picFilename ?>" style="width:<?php echo $width ?>px;height:<?php echo $height ?>px;" />
	<div class="draggable resizable" style="border:1px dotted black;position:absolute;left:<?php echo ($width-$mWidth)/2 ?>px;top:<?php echo (($height*1) - ($mHeight*1))/2 ?>px">
		<img src="images/Mustache1.png" style="width:100%;height:100%;" />
	</div>
</div>
<div id="pic-selector">(mustache selector will be here)</div>

<input type="hidden" name="mustache-x" value="0" />
<input type="hidden" name="mustache-y" value="0" />
<input type="hidden" name="mustache-width" value="0" />
<input type="hidden" name="mustache-height" value="0" />
<a href="step3.php" class="next">Next</a>
