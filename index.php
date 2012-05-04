<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head lang="en" xml:lang="en">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Test page</title>
	<style type="text/css">
		body {
			font-family: Arial, Helvetica, sans-serif;
			font-size: .9em;
			color: #000000;
			background-color: #FFFFFF;
			margin: 0;
			padding: 10px 20px 20px 20px;
		}

		samp {
			font-size: 1.3em;
		}

		a {
			color: #000000;
			background-color: #FFFFFF;
		}
		
		sup a {
			text-decoration: none;
		}

		hr {
			margin-left: 90px;
		    height: 1px;
		    color: #000000;
			background-color: #000000;
		    border: none;
		}

		#logo {
			margin-bottom: 10px;
		}

		.text {
			width: 80%;
			margin-left: 90px;
			line-height: 140%;
		}
	</style>
</head>

<body>
	<div id="fb-root"></div>
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
    FB.login(function(response) {
      // handle the response
    }, {scope: 'email,user_likes'});
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>
	Test page...
</body>
</html>