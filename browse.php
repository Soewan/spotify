<?php 
include("includes/includedFiles.php");
?>
<h1 class="pageHeadingBig">Enjoy The Music</h1>
<div class="gridViewContainer">
<?php
$albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

while($row = mysqli_fetch_array($albumQuery)) {	
    echo "<div class='gridViewItem' style='margin-left:70px;'>
            <span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
                <img src='Admin/admin_images/" . $row['artworkPath'] . "' style='width: 200px; height: 200px;'> <!-- Adjust width and height as needed -->

                <div class='gridViewInfo' style='color:#1DB954;'>"
                    . $row['title'] .
                "</div>
            </span>
        </div>";
}
?>

</div>
