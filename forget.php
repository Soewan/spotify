<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
    
	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
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
    <div id="login-wrapper" style="margin-top:100px;">
        <div class="text-muted"><small><em>Please Fill all the required fields</em></small></div>
        <?php if(isset($error) && !empty($error)): ?>
            <div class="message-error"><?= $error ?></div>
        <?php endif; ?>
        <form action="forget2.php" method="POST">
            <div class="input-field">
                <label for="email" class="input-label">Email</label>
                <input type="email" id="email" name="email" required="required">
            </div>
            <div class="input-field ">
                <a href="register.php" tabindex="-1"><small><strong>Go back to login page</strong></small></a>
            </div>
            <button class="login-btn">Reset Password</button>
        </form>
    </div>
<!--  End Forget  -->
</body>
</html>