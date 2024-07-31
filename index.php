<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign-Up Diamond Coast Hotel</title>
  <link rel="stylesheet" href="css/vendor/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="favicon.png">
</head>
<body>

<div class="untree_co--site-wrap">


  <div class="untree_co--site-main">
    <div class="untree_co--site-section">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6 section-heading">
            <h2 class="text-center">Sign Up</h2>
            <p>Create an account to enjoy our exclusive services and offers.</p>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6">
            <form action="register-handler.php" method="POST">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
              </div>
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

<script src="js/vendor/jquery-3.4.1.min.js"></script>
<script src="js/vendor/bootstrap.bundle.min.js"></script>
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
