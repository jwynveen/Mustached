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
	'scope' => 'read_stream, friends_likes',
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
