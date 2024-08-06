<?php
session_start();
require_once 'config.php';

// Database connection
$link = mysqli_connect("localhost", DBUSER, DBPASS, DBNAME);

function validateUser($username, $password){
    global $link;
    $sql = "SELECT salt, password_hash, email FROM users WHERE username='$username';";
    $result = mysqli_query($link, $sql);
    
    if($row = mysqli_fetch_assoc($result)){
        $salt = $row['salt'];
        $hashedPassword = md5($password . $salt);
        
        // Check if the provided password matches the stored password hash
        if ($hashedPassword === $row['password_hash']) {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $row['email'];
            header("Location: home.php");
            exit();
        }
    }
    return false;
}

// Handle the POST request from the sign-in form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if (!validateUser($username, $password)) {
            $_SESSION['error'] = "Invalid username or password!";
            header("Location: sign-in.php");
            exit();
        }
    }
}

// Retrieve error from the session
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';

// Clear session error
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-In Diamond Coast Hotel</title>
  <?php include 'links.php'; ?>
</head>
<body>

<div class="untree_co--site-wrap">
<div class="logo-wrap" style="font-family: 'Playfair Display', serif; font-size: 34px; font-weight: 900; color: #ffffff; padding: 10px 0; background-color: #000; text-align: center; text-transform: uppercase; letter-spacing: 4px;">
  Diamond Coast Hotel
</div>

  <div class="untree_co--site-main">
    <div class="untree_co--site-section">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6 section-heading">
            <h2 class="text-center whiteTxt">Sign In</h2>
            <p>Welcome back! Please enter your details to sign in.</p>
            <?php if($error): ?>
              <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6">
            <form action="sign-in.php" method="POST">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="show_password" onclick="togglePassword()">
                <label class="form-check-label" for="show_password">Show Password</label>
              </div>
              <button type="submit" class="btn btn-primary">Sign In</button>
              <p class="mt-3">Don't have an account? <a href="index.php">Sign Up</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="js/vendor/jquery-3.4.1.min.js"></script>
<script src="js/vendor/bootstrap.bundle.min.js"></script>
<script>
  function togglePassword() {
    var passwordField = document.getElementById('password');
    var showPasswordCheckbox = document.getElementById('show_password');
    
    if (showPasswordCheckbox.checked) {
      passwordField.type = 'text';
    } else {
      passwordField.type = 'password';
    }
  }
</script>
</body>
</html>
