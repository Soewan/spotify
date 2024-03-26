<?php  
include("includes/includedFiles.php");
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "sociallogin";
$con = mysqli_connect($sname, $uname, $password, $db_name);
if (!$con) {
	echo "Connection failed!";
	exit();
}
?>
<?php
// Function to retrieve trending songs (you need to define this function)
function getTrendingSongs($con) {
    // Query to get the trending songs, you need to customize this according to your database schema
    $query = mysqli_query($con, "SELECT * FROM songs Where plays >= 5 Order By plays DESC");
    $songs = array();
    while ($row = mysqli_fetch_array($query)) {
        $songs[] = new Song($con, $row['id']);
    }
    return $songs;
}

// Get trending songs
$trendingSongs = getTrendingSongs($con);
?>

<div class="container">
   <center><h1 style="margin-top:15px;color:#1DB954;">Trending Songs</h1></center>
   <br>
    <div class="tracklistContainer">
        <ul class="tracklist">
            <?php
            $i = 1;
            foreach ($trendingSongs as $song) {
                $artist = $song->getArtist();
                echo "<table class='tracklistTable' style='width: 100%;'>
                        <tr class='tracklistRow'>
                            <td class='trackCount'>
                            <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $song->getId() . "\", tempPlaylist, true)'>
                            <span class='trackNumber'>$i</span>
                        </td>
                        <td class='trackInfo'>
                            <span class='trackName'>" . $song->getTitle() . "</span>
                            <span class='artistName'>" . $artist->getName() . "</span>
                        </td>
                        <td class='trackOptions'>
                            <input type='hidden' class='songId' value='". $song->getId() . "'>
                            <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
                        </td>
                        <td class='trackDuration'>
                            <span class='duration'>" . $song->getDuration() . "</span>
                        </td>
                        </tr>
                        </table>";                    
                $i++;
            }
            ?>
            <script>			
                var tempSongIds = '<?php echo json_encode(array_map(function($song) { return $song->getId(); }, $trendingSongs)); ?>';		
                tempPlaylist = JSON.parse(tempSongIds);
            </script>
        </ul>
    </div>
</div>
<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>
