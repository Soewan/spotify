<?php include("includes/includedFiles.php");
if(isset($_GET['id'])) {
	$albumId = $_GET['id'];
}
else {
	header("Location: index.php");
}
$album = new Album($con, $albumId);
$artist = $album->getArtist();
?>
<div class="entityInfo">
	<div class="leftSection">
		<img src="Admin/admin_images/<?php echo $album->getArtworkPath(); ?>">
	</div>
	<div class="rightSection">
		<h2><?php echo $album->getTitle(); ?></h2>
		<p>By <?php echo $artist->getName(); ?></p>
		<p><?php echo $album->getNumberOfSongs(); ?> songs</p>
	</div>
</div>
<div class="tracklistContainer">
	<ul class="tracklist">	
		<?php
		$songIdArray = $album->getSongIds();
		$i = 1;
		foreach($songIdArray as $songId) {
			$albumSong = new Song($con, $songId);
			$albumArtist = $albumSong->getArtist();
			echo "<table class='tracklistTable' style='width: 100%;'>
					<tr class='tracklistRow'>
						<td class='trackCount'>
							<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'>
							<span class='trackNumber'>$i</span>
						</td>
						<td class='trackInfo'>
							<span class='trackName'>" . $albumSong->getTitle() . "</span>
							<span class='artistName'>" . $albumArtist->getName() . "</span>
						</td>
						<td class='trackOptions'>
							<input type='hidden' class='songId' value='". $albumSong->getId() . "'>
							<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
						</td>
						<td class='trackDuration'>
							<span class='duration'>" . $albumSong->getDuration() . "</span>
						</td>
					</tr>
				</table>";
			$i = $i + 1;
		}
?>
		<script>			
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';		
			tempPlaylist = JSON.parse(tempSongIds);
			console.log(tempPlaylist);
		</script>
	</ul>
</div>
<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>