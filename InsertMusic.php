<?php
include('db_conn.php');
include('upload.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Song</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        
        .add-info {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
        }
        
        h3.notice {
            color: #333;
            font-size: 24px;
            text-align: center;
        }
        
        .form-insert label {
            color: #333;
            display: block;
            margin-top: 15px;
        }
        
        .form-insert input[type="text"],
        .form-insert select,
        .form-insert button,
        .form-insert input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        
        .form-insert button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
        }
        
        .form-insert button:hover {
            background-color: #45a049;
        }
        
        .form-insert .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
        
        .form-insert a.ca {
            color: #4CAF50;
            font-size: 18px;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }
        
        .form-insert a.ca:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="add-info">
        <h3 class="notice">UPLOAD SONGS</h3>
        <form class="form-insert" method="POST" enctype="multipart/form-data">
            <?php foreach ($errors as $error) : ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endforeach; ?>
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" value="<?php echo $titleUpdate; ?>">
            <label>Duration</label>
            <input type="text" name="duration" placeholder="Duration" value="<?php echo $DurationUpdate; ?>">
            <label>Singer</label>
            <select name="singer">
                <?php foreach ($singers as $singer) : ?>
                    <option value='<?php echo $singer['id'] ?>' <?php if ($singer['id'] === $singerIDfff) : ?> selected="selected" <?php endif; ?>>
                        <?php echo $singer['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label>Album</label>
            <select name="album">
                <?php foreach ($albums as $album) : ?>
                    <option value='<?php echo $album['id'] ?>' <?php if ($album['id'] === $albumupdate) : ?> selected="selected" <?php endif; ?>>
                        <?php echo $album['title']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label>MP3 File</label>
            <input type="file" name="mp3" accept="audio/*">
            <button style="background-color:#99A3A0">
            <a href="view.php" style="text-decoration:none;">BACK</a></button>
            <button type="submit" name="submit">SUBMIT</button>
        </form>
    </div>
</body>
</html>
