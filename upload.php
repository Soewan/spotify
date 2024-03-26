<?php 
include('db_conn.php');
$getSingers = "SELECT * from artists";
$result = mysqli_query($conn, $getSingers);
$singers = mysqli_fetch_all($result, MYSQLI_ASSOC);

$getalbums = "SELECT * from albums";
$res = mysqli_query($conn, $getalbums);
$albums = mysqli_fetch_all($res, MYSQLI_ASSOC);

$titleUpdate = $singerIDfff = $albumupdate = $DurationUpdate = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql2 = "SELECT * FROM songs WHERE id= '$id' ";
    $res2 = mysqli_query($conn, $sql2);
    $data = mysqli_fetch_array($res2);
    $DurationUpdate = $data["duration"];
    $titleUpdate = $data["title"];
    $singerIDfff = $data["artist"];
	$albumupdate = $data["album"];
}

$errors = array('title' => '', 'mp3' => '', 'img' => '');
$title = $mp3 = $img = $singerID = '';

// Save file to sv
function saveFile($fileInfo)
{
    $filename = $fileInfo['name'];
    $type = $fileInfo['type'];
    $folder = (strpos($type, "image") !== false) ? 'images/' : 'assets/music/';

    $tmpPath = $fileInfo['tmp_name'];
    $destinationPath = $folder . $filename;

    if (move_uploaded_file($tmpPath, 'assets/music/' . $destinationPath)) {
        echo "Successfully uploaded";
    } else {
        echo "Upload fail";
    }

    return $destinationPath;
}

// Handle submit
if (isset($_POST['submit'])) {
    // Title
    if (empty($_POST['title'])) {
        $errors['title'] = "Title cannot be empty";
    } else {
        $title = $_POST['title'];
    }

    // Singer
    $singerID = $_POST['singer'];
	// Album
	$albumID = $_POST['album'];
	// Duration
	$Duration = $_POST['duration'];

    // File mp3
    if (empty($_FILES["mp3"]["name"])) {
        $errors['mp3'] = "Music File cannot be empty";
    } else {
        $mp3 = $_FILES['mp3'];
    }
    // Checking for errors
    if (array_filter($errors)) {
        echo 'Form not valid';
    } else {
        // Insert or Update to db
        $mp3Path = saveFile($mp3);

        if (isset($_GET['id'])) {
            $updateSong = "UPDATE songs SET title = '$title', artist = '$singerID',album = '$albumID',duration = '$Duration',path = '$mp3Path' WHERE id =$id";
            $res3 = mysqli_query($conn, $updateSong);
            header("Location: editSong.php");
        } else {
            $insertSong = "INSERT INTO songs(title,artist,album,duration,path) 
                             VALUES ('$title', '$singerID', '$albumID', '$Duration', '$mp3Path')";
            if (!mysqli_query($conn, $insertSong)) {
                echo  "Error: " . "<br>" . mysqli_error($conn);
            } else {
                header("Location:index.php");
            }
        }
    }
}







/*
if (isset($_POST['submit']) && isset($_FILES['my_audio'])) {
	include "conn.php";
    $video_name = $_FILES['my_audio']['name'];//to get original name
    $tmp_name = $_FILES['my_audio']['tmp_name'];//temp name
    $error = $_FILES['my_audio']['error'];//

    if ($error === 0) {
    	$video_ex = pathinfo($video_name, PATHINFO_EXTENSION);//return only the last extension.

    	$video_ex_lc = strtolower($video_ex);//path change to lower case.

    	$allowed_exs = array("3gp", 'webm', 'mp3','mp4','wav', 'm4a');

    	if (in_array($video_ex_lc, $allowed_exs)) // find the value of $video_ex_lc, $allowed_exs in array.
		{
			$title=$_POST['title'];
    		$singer=$_POST['singer'];
			$album=$_POST['album'];
            $genre=$_POST['genre'];
			$duration=$_POST['duration'];
    		$new_video_name = uniqid("audio-", true) . '.' . $video_ex_lc;
            $video_upload_path = 'assets/music/' . $new_video_name;
            move_uploaded_file($tmp_name, $video_upload_path);

            // Modify the path to match the desired format
            $audio_database_path = 'assets/music/' . $new_video_name;

    		// Now let's Insert the video path into database
            $sql = "INSERT INTO songs(title,artist,album,genre,duration,path) 
                   VALUES('$title','$singer','$album','$genre','$duration',' $audio_database_path')";
            mysqli_query($conn, $sql);
            header("Location: InsertMusic.php");
    	}else {
    		$em = "You can't upload files of this type";
    		header("Location: index.php?error=$em");
    	}
    }


}else{
	header("Location: InsertMusic.php");
}*/