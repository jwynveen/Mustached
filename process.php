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
		$requireAuth = true;
		require_once("includes/fbAuthorize.php");
	?>
	<!--<div id="fb-root"></div>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '380172018700591', // App ID
	      channelUrl : '//localhost:8888/Mustached/channel.html', // Channel File
	      status     : true, // check login status
	      cookie     : true, // enable cookies to allow the server to access the session
	      xfbml      : true  // parse XFBML
	    });
	
	    // Additional initialization code here
	    FB.Canvas.setAutoGrow();
	    /*FB.login(function(response) {
	      // handle the response
	    }, {scope: 'email,user_likes'});*/
	   FB.login(function(response) {
		if (response.authResponse) {
			$("input[name='FB.uid']").val(response.authResponse.uid);
			$("input[name='FB.accessToken']").val(response.authResponse.accessToken);
		}
	   });
	  };
	
	  // Load the SDK Asynchronously
	  (function(d){
	     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement('script'); js.id = id; js.async = true;
	     js.src = "//connect.facebook.net/en_US/all.js";
	     ref.parentNode.insertBefore(js, ref);
	   }(document));
	</script>-->
	<div id="header-container">
		<header class="wrapper clearfix">
			<h1 id="title"><span class="ir">Mustache'd</span></h1>
			<!--
			<nav>
							<ul>
								<li><a href="#">nav ul li a</a></li>
								<li><a href="#">nav ul li a</a></li>
								<li><a href="#">nav ul li a</a></li>
							</ul>
						</nav>-->
			
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
					<?php include("step1.php") ?>
					<?php //include("step2.php") ?>
				</section>
			</article>
			
			<!--
			<aside>
				<h3>aside</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices.</p>
			</aside>-->
			
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
