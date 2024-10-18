<?php
session_start();
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

  <div class="container" id="signIn">
    <h1 class="form-title">Sign In</h1>

    <?php
    if (isset($errors['login'])) {
        echo '<div class="error-main"><p>' . $errors['login'] . '</p></div>';
        unset($errors['login']);
    }
    ?>

  <form method="POST" action="user-account.php">
      <div class="input-group">
       
        <input type="email" name="email" id="email" placeholder="Email" required>
        <?php
        if (isset($errors['email'])) {
            echo '<div class="error"><p>' . $errors['email'] . '</p></div>';
        }
        ?>
      </div>

      <div class="input-group password">
        
        <input type="password" name="password" id="password" placeholder="Password" required>
        
        <?php
        if (isset($errors['password'])) {
            echo '<div class="error"><p>' . $errors['password'] . '</p></div>';
        }
        ?>
      </div>

      <input type="submit" class="btn" value="Sign In" name="signin">
    </form>

    <div class="links">
      <p>Don't have an account yet?</p>
      <a href="register.php">Sign Up</a>
    </div>
  </div>

  <script src="../js/script.js"></script>
</body>
</html>

<?php

if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}
?>
