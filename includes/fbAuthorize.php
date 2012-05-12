<?php
require_once("facebook.php");
$appId = '380172018700591';
$appSecret = '82ad2f37fdf603ad5efa1ba1eac6a0bc';
$canvasUrl = 'http://localhost:8888/Mustached';
$canvasPage = "http://apps.facebook.com/Mustache-d/";

$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret,
));

$params = array(
	'client_id'    => $appId,
	'scope' => 'user_photos, user_photo_video_tags',
	'redirect_uri' => $canvasPage.'process.php',
	'state' => 'some-generated-string-I-need-to-validate'
);
$loginUrl = $facebook->getLoginUrl($params);

// if we just returned from a cancelled authentication, redirect url to home page
if ($_REQUEST["error"] == "access_denied")
	$loginUrl = $canvasPage;

// get user info if available
$user = $facebook->getUser();
$accessToken = $facebook->getAccessToken();
?>
<?php if ($requireAuth): ?>
	<?php if ($user): ?>
		<input type="text" name="FB.uid" value="<?php echo $user ?>" />
		<input type="text" name="FB.accessToken" value="<?php echo $accessToken ?>" />
	<?php else: ?>
		<script>window.top.location = '<?php echo $loginUrl ?>';</script>
	<?php endif ?>
<?php endif ?>

	<div id="fb-root"></div>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '<?php echo $appId ?>', // App ID
	      channelUrl : '<?php echo $canvasUrl ?>/channel.html', // Channel File
	      status     : true, // check login status
	      cookie     : true, // enable cookies to allow the server to access the session
	      xfbml      : true  // parse XFBML
	    });
	
	    // Additional initialization code here
	    FB.Canvas.setAutoGrow();
	    /*FB.login(function(response) {
	      // handle the response
	    }, {scope: 'email,user_likes'});*/
	   /*FB.login(function(response) {
		if (response.authResponse) {
			$("input[name='FB.uid']").val(response.authResponse.uid);
			$("input[name='FB.accessToken']").val(response.authResponse.accessToken);
		}
	   });*/
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
