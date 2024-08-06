<?php
session_start();

require_once 'config.php';

// Start the session

// Include the necessary functions for salting and hashing
function generateRandomSalt() {
    return bin2hex(random_bytes(12)); // Generate a 24-character hexadecimal salt
}

// Function to check if username exists
function usernameExists($username, $link) {
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $num_rows = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);
    return $num_rows > 0;
}

function insertUser($username, $password , $email) {
    $link = mysqli_connect("localhost", DBUSER, DBPASS, DBNAME);
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Check if username exists
    if (usernameExists($username, $link)) {
        $_SESSION['error'] = "Username already exists!";
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        header("Location: index.php");
        exit();
    }
    
    $salt = generateRandomSalt();
    $hashedPassword = md5($password . $salt);
    $sql = "INSERT INTO users (username, password_hash, salt, email) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $username, $hashedPassword, $salt, $email);
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        header("Location: home.php");
        exit(); // Always exit after redirecting
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}

// Handle the POST request from the sign-up form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ((isset($_POST["username"]) && $_POST["username"] != "") &&
        (isset($_POST["email"]) && $_POST["email"] != "") &&
        (isset($_POST["password"]) && $_POST["password"] != "") &&
        (isset($_POST["confirm_password"]) && $_POST["confirm_password"] != "")) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        
        // Check if passwords match
        if ($password !== $confirm_password) {
            $_SESSION['error'] = "Passwords do not match!";
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit();
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,16}$/', $password)) {
            $_SESSION['error'] = "Password must be 8-16 characters long and include at least one lowercase letter, one uppercase letter, and one special character.";
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit();
        } else {
            insertUser($username, $password, $email);
        }
    }
}

// Retrieve error and input data from the session
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

// Clear session data
unset($_SESSION['error']);
unset($_SESSION['username']);
unset($_SESSION['email']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-Up Diamond Coast Hotel</title>
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
            <h2 class="text-center whiteTxt">Sign Up</h2>
            <p>Create an account to enjoy our exclusive services and offers.</p>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6">
            <form action="index.php" method="POST">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
              </div>
              <?php if ($error): ?>
                <div class="text-danger" role="alert"><?php echo htmlspecialchars($error); ?></div>
              <?php endif; ?>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="show_passwords" onclick="togglePasswords()">
                <label class="form-check-label" for="show_passwords">Show Passwords</label>
              </div>
              <button type="submit" class="btn btn-primary">Sign Up</button>
              <p class="mt-3">Already have an account? <a href="sign-in.php">Sign In</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function togglePasswords() {
    var passwordField = document.getElementById('password');
    var confirmPasswordField = document.getElementById('confirm_password');
    var showPasswordsCheckbox = document.getElementById('show_passwords');
    
    if (showPasswordsCheckbox.checked) {
      passwordField.type = 'text';
      confirmPasswordField.type = 'text';
    } else {
      passwordField.type = 'password';
      confirmPasswordField.type = 'password';
    }
  }
</script>
</body>
</html>
