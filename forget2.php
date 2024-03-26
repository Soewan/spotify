<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "sociallogin";
$tablename = "users";
$connect = mysqli_connect($host, $user, $password, $dbname) or die("Could not connect to database");

if (isset($_POST['rest'])) {
    $Email = mysqli_real_escape_string($connect, $_POST['email']);
    $Password = mysqli_real_escape_string($connect, $_POST['Pass2']);
    $Pass = mysqli_real_escape_string($connect, $_POST['Pass']);
    $newMd5 = md5($Password);

    // Check if the email exists in the database
    $check_query = "SELECT * FROM $tablename WHERE email='$Email'";
    $result = mysqli_query($connect, $check_query);
    $count = mysqli_num_rows($result);

    if ($count == 0) {
        echo "Your account does not exist.";
    } else {
        if ($Pass == $Password) {
            $sql = "UPDATE $tablename SET password='$newMd5' WHERE email='$Email'";
            if (mysqli_query($connect, $sql)) {
                header("Location: register.php");
                exit();
            } else {
                die('Error:' . mysqli_error($connect));
            }
        } else {
            echo "<script>alert('Password doesn't match')</script>";
        }
    }
    mysqli_close($connect);
}
?>

<html>
<head>
	<title>Welcome to Slotify!</title>
	<link href="Login.css" rel="stylesheet">
	<link href="register.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script  defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="row.css" rel="stylesheet">
    <link href="forget.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body style="background: #171717;">
<!--  Start Header  -->
	<nav>
        <div style="background-color: #1db954;">
          <img src="logo3.png" class="logo" alt="logo">
          <a class="navbar-brand" href="#" style="font-size: 20px;
          text-decoration: solid;
          font-weight: bolder;">Spotify</a>
        </div>
    </nav>
<!--  End Header  -->
<!--  Start Forget  -->
<h1 id="page-title" class="text-center" style="margin-top:50px;">Forgot Password Page</h1>
    <hr id="title_hr" class="mx-auto">
    <?php
        $forget=$_POST["email"];
    ?>
    <div id="login-wrapper" style="margin-top:80px;">
        <form action="" method="POST">
        <div class="input-field" style="color:#ECFFDC;">
            <label for="email" class="input-label">Email</label>
            <?php echo $forget; ?><input type="hidden" id="email" name="email" value="<?php echo $forget; ?>" required="required">
        </div>
            <div class="input-field">
                <label for="Pass" class="input-label">New Password</label>
                <input type="password" id="password" name="Pass"  required="required">
            </div>
            <div class="input-field">
                <label for="Pass2" class="input-label">Confirm Password</label>
                <input type="password" id="password" name="Pass2"  required="required">
            </div>
            <input type="submit" class="login-btn" name="rest" id="rest" value="Reset Password"></button>
        </form>
    </div>
<!--  End Forget  -->
</body>
</html>