<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Spotify</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script  defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link href="register.css" rel="stylesheet">
</head>
<body style="background-color: black;">
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
    <!--  Start Register  -->
<center>
    <div class="register">
    <h1>Enter number to recover account</h1>
  <form action="" method="post">
      <input type="text" id="number" name="number" placeholder="+95********">
      <div id="recaptcha-container"></div>
      <button type="button" name="code_btn" onclick="phoneAuth();">SendCode</button>
  </form><br>
  <h1>Enter Verification code</h1>
  <form>
      <input type="text" id="verificationCode" placeholder="Enter verification code">
      <button type="button" onclick="codeverify();">Verify code</button>
  </form>
  <!--  Send Phone Number  -->
  <!-- The core Firebase JS SDK is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
  <script>
      // Your web app's Firebase configuration
      var firebaseConfig = {
          apiKey: "AIzaSyBK-juZ6krPJCHHELQgOW9sFUXsS9h3wHI",
          authDomain: "fir-web-b823f.firebaseapp.com",
          databaseURL: "https://fir-web-b823f.firebaseio.com",
          projectId: "fir-web-b823f",
          storageBucket: "fir-web-b823f.appspot.com",
          messagingSenderId: "463332404757",
          appId: "1:463332404757:web:68d04d3fdeeb333f"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
  </script>
  <script src="OTP.js" type="text/javascript"></script>
   </div>
</center>
  </body>
</html>