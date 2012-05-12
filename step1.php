<?php
if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me?fields=name,picture&type=large');

	$albumFql = 'select aid,object_id,cover_pid,name,description,size,link,can_upload FROM album WHERE owner=me() ORDER BY name';
	$pictureFql = 'select pid,object_id,aid,src,src_width,src_height,link,caption FROM photo WHERE aid IN (SELECT aid FROM #query0)';
	$fqlResult = $facebook->api( array(
                         'method' => 'fql.multiquery',
                         'queries' => array(
                         				'query0' => $albumFql,
                         				'query1' => $pictureFql
                         				)
                     ));

	$albums = array();
	$profileAlbumIndex = -1;
	//Create albums array
	foreach ($fqlResult[0]['fql_result_set'] as $key => $album) {
		if ($album['name'] == 'Profile Pictures') $profileAlbumIndex = $key;
		$albums[] = array(
			'aid' => $album['aid'],
			'object_id' => $album['object_id'],
			'name' => $album['name'],
			'pictures' => array()
		);
	}
	// Move Profile Pictures album to start
	if ($profileAlbumIndex > 0) {
		$profileAlbum = $albums[$profileAlbumIndex];
		unset($albums[$profileAlbumIndex]);
		array_unshift($albums, $profileAlbum);
	}
	// Assign each picture to its album
	foreach ($fqlResult[1]['fql_result_set'] as $picture) {
		$albumId = $picture['aid'];
		foreach ($albums as $key => $album) {
			if($album['aid'] != $albumId) continue;
			$albums[$key]['pictures'][] = array(
				'pid' => $picture['pid'],
				'object_id' => $picture['object_id'],
				'src' => $picture['src']
			);
		}
	}
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}
?>

<h2><?php echo $user_profile['name'] ?>, select Your Pic</h2>
<!--<div id="profile-pic"><img src="<?php echo $user_profile['picture'] ?>" /></div>
<div id="or-separator">...OR...</div>-->
<div id="pic-selector">
	<ul>
	<?php  foreach ($albums as $album): ?>
		<?php if(count($album['pictures']) <= 0) continue; ?>
		<li><?php echo $album['name'] ?>
			<ul>
			<?php foreach($album['pictures'] as $photo): ?>
				<li>
				<label for="photo<?php echo $photo['pid'] ?>">
					<input type="radio" name="photo" id="photo<?php echo $photo['pid'] ?>" value="<?php echo $photo['object_id'] ?>" />
					<img src="<?php echo $photo['src'] ?>" />
				</label>
				</li>
			<?php endforeach; ?>
			</ul>
		</li>
	<?php endforeach;  ?>
	</ul>
</div>

<input type="hidden" name="access_token" value="<?php echo $accessToken ?>" />
<!--<input type="hidden" name="picFilename" value="<?php echo $user_profile['picture'] ?>" />-->
<a href="step2.php" class="next">Next</a>
