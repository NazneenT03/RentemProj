<html>
<head>
  <title>RENTEM</title>
  <link rel="stylesheet"href="signup.css">
</head>
<body>
  <div class="hero">
<div class="form-box">
  <div class="button-box">
    <div id="btn"></div>
    <button type="button" class="toggle-btn" onclick="login()">Log In</button>
    <button type="button" class="toggle-btn" onclick="register()">Register</button>
  </div>
  
  <form id="login" class="input-group" action="login.php" method="POST" >
    <input type="text" class="input-field" placeholder="User Id" name="uname" required>
    <input type="password" class="input-field" placeholder="Enter Password" name="pass" required>
    <button type="submit" name="login" class="submit-btn">Log In</button>
</form>
<form id="register" class="input-group" action="register.php" method="POST">
    <input type="text" class="input-field" placeholder="User Id" name="uname" required >
    <input type="email" class="input-field" placeholder="Email Id" name="email" required>
    <input type="text" class="input-field" placeholder="Enter Password" name="pass" required>
    <button type="submit" name="register" class="submit-btn">Register</button>
</form>
</div>

    </div>

    <script>
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");
    
    function register(){
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110";
    
    }
    function login(){
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0";
     
    }
    </script>
    </body>
    </html>