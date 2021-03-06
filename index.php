<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.20/themes/base/jquery-ui.css" type="text/css" media="all" />
	<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
	<script src="js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>
</head>
<body>
	<?php 
		$requireAuth = false;
		require_once("includes/fbAuthorize.php");
	?>
	<div id="header-container">
		<header class="wrapper clearfix">
			<h1 id="title"><span class="ir">Mustache'd</span></h1>
		</header>
	</div>
	<div id="main-container">
		<div id="main" class="wrapper clearfix">
			
			<article>
				<section class="col">
					<h2>The mustache</h1>
					<p>is most often relegated to the select few who manage to make it work. Men like Tom Selleck, Burt Reynolds, Hulk Hogan, and Yosemite Same.</p>
				</section>
				<section class="col">
					<h2>But fear not,</h2>
					<p>for the failing fortitude of your facial folicles shall not force you to forfeit this artful feature any longer.</p>
				</section>
				<div class="clearfix"></div>
				<section id="step-container">
					<h2 class="get-started"><a href="<?php echo $loginUrl ?>" target="_top">Get Started</a></h2>
				</section>
			</article>
		</div> <!-- #main -->
	</div> <!-- #main-container -->

	<div id="footer-container">
		<footer class="wrapper">
			<h3><!--footer--></h3>
		</footer>
	</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

<script src="js/script.js"></script>
</body>
</html>
