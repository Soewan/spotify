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
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<style>
            .google-login-btn {
                display: flex; 
                align-items: center;
                text-decoration: none;
                font-size: 14px;
                font-weight: 500;
                height:auto;
                color: #fff;
                width: 100%;
                overflow: hidden;
                border-radius: 5px;
                background-color: #100c08 ;
                cursor: pointer;
            }
            .google-login-btn .icon {
                display: inline-flex;
                height: 100%;
                padding: 15px 20px;
                align-items: center;
                justify-content: center;
                background-color: transparent;
                margin-right: 15px;
            }
            .google-login-btn .icon svg {
                fill: #fff;
            }
            .google-login-btn:hover {
                background-color: #100c08 ;
            }
            .google-login-btn:hover .icon {
                background-color: transparent;
            }
            .login{
                margin-top: 100px;
            }
            .wrapper .btn:hover{
                background-color: #84bd00;
            }
        </style>
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
	<?php
	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}
	?>
	<!--  Login Form  -->
<center>
		<div class="login">
				<form id="loginForm" action="register.php" method="POST">
				<div class="wrapper">
					<h1>Please! Login</h1>
					<div class="input">
					<div class="form-floating mb-3">
					<!-- PHP Error Handling -->
					<?php echo $account->getError(Constants::$loginFailed); ?>									
					<!-- Input Field -->
					<input id="floatingInput" name="loginUsername" class="form-control" type="text" placeholder="Username" value="<?php getInputValue('loginUsername') ?>" required>
					<!-- Floating Label -->
					<label for="floatingInput" style="color:#3eb489;">Username</label>	
				    </div>
					</div>
					<div class="input">
					<div class="form-floating">
						<input type="password" class="form-control" id="floatingPassword" name="loginPassword"
						placeholder="Password" required>
						<label for="floatingPassword" style="color:#3eb489;">Password</label>
					</div>
				    </div>
					<div class="remember-forget" style="margin-left:215px;">
						<a href="forget.php">Forget Password</a>
					</div>
					<button type="submit" class="btn" style="background-color: #1db954;" name="loginButton">LOG IN</button>
					<div>
					<!-- Login with Google -->
					<!--<a href="#" class="google-login-btn" style="margin-top:15px;">
						<span class="icon">
							<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 488 512">! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
					<!--		<path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg>
						</span>
						Continue with Google
					</a>-->
					</div>
					<div class="hasAccountText">
						<p style="color:#3eb489;">Don't have an account? <span id="hideLogin" style="color:#b0c4de;"> Signup here.</span></p>
					</div>
				</div>
				</form>
			</div>
			<!--  Register Form	-->
			<div class="register">
			<form id="registerForm" action="register.php" method="POST">
				<div class="wrapper">
				<h1>Create account</h1>
						<p style="color:#ff0000;">
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?></p>
						<!-- Username -->
						<div class="input">
                        <div class="form-floating">
                            <input type="text" name="username" class="form-control" id="floatingInputGroup1" placeholder="Username" value="<?php getInputValue('username') ?>" required>
                            <label for="floatingInputGroup1" style="color: #3eb489;">Username</label>
                        </div>
                       </div>
						<!-- First Name -->
						<p style="color:#ff0000;">
						<?php echo $account->getError(Constants::$firstNameCharacters); ?></p>
						<div class="input">
                        <div class="form-floating">
                            <input type="text" name="firstName" class="form-control" id="floatingInputGroup1" placeholder="First name" value="<?php getInputValue('firstName') ?>" required>
                            <label for="floatingInputGroup1" style="color: #3eb489;">First name</label>
                        </div>
                        </div>
						<!-- Last Name -->
						<p style="color:#ff0000;">
						<?php echo $account->getError(Constants::$lastNameCharacters); ?></p>
						<div class="input">
                        <div class="form-floating">
                            <input type="text" name="lastName" class="form-control" id="floatingInputGroup1" placeholder="Last name" value="<?php getInputValue('lastName') ?>" required>
                            <label for="floatingInputGroup1" style="color: #3eb489;">Last name</label>
                        </div>
                        </div>
						<!-- Email -->
						<p style="color:#ff0000;">
						<?php echo $account->getError(Constants::$emailTaken); ?></p>
						<div class="input">
                        <div class="form-floating">
                            <input type="text" name="email" class="form-control" id="floatingInputGroup1" placeholder="Enter Email"  required>
                            <label for="floatingInputGroup1" style="color: #3eb489;">Enter Email</label>
                        </div>
                        </div>
						<!-- Password -->
						<p style="color:#ff0000;">
						<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?></p>
						<div class="input">
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="floatingInputGroup1" placeholder="Password" required>
                            <label for="floatingInputGroup1" style="color: #3eb489;">Password</label>
                        </div>
                        </div>
						<!-- Confirm Password -->
						<div class="input">
                        <div class="form-floating">
                            <input type="password" name="password2" class="form-control" id="floatingInputGroup1" placeholder="Confirm Password" required>
                            <label for="floatingInputGroup1" style="color: #3eb489;">Confirm Password</label>
                        </div>
                        </div>

					<button type="submit" name="registerButton" style="
                        width: 100%;
                        height: 45px;
                        background: #1db954;
                        border: none;
                        outline: none;
                        border-radius: 40px;
                        box-shadow: 0 0 120px rgb(135, 222, 219);
                        cursor: pointer;
                        font-size: 18px;
                        color:#000000                    
                    ">SIGN UP</button>

					<div class="hasAccountText">
					<p style="color:#3eb489;">Already have an account?<span id="hideRegister" style="color:#b0c4de;"> Log in here.</span>
					</div>
				</div>					
			</form>
			</div>
</center>
</body>
</html>