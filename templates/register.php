<?php
session_start();
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    
</head>

<body>
    <div class="container" id="signup">
        <h1 class="form-title">Register</h1>
        
        <?php
        if (isset($errors['user_exist'])) {
            echo '<div class="error-main">
                    <p>' . $errors['user_exist'] . '</p>
                  </div>';
            unset($errors['user_exist']);
        }
        ?>
        
        <form method="POST" action="user-account.php">
            <div class="input-group">
                <input type="text" name="name" id="name" placeholder="Name" required>
                <?php
                if (isset($errors['name'])) {
                    echo ' <div class="error">
                            <p>' . $errors['name'] . '</p>
                           </div>';
                }
                ?>
            </div>

            <div class="input-group">
                <input type="email" name="email" id="email" placeholder="Email" required>
                <?php
                if (isset($errors['email'])) {
                    echo '<div class="error">
                            <p>' . $errors['email'] . '</p>
                          </div>';
                    unset($errors['email']);
                }
                ?>
            </div>

            <div class="input-group password">
                <input type="password" name="password" id="password" placeholder="Password" required>
                
                <?php
                if (isset($errors['password'])) {
                    echo '<div class="error">
                            <p>' . $errors['password'] . '</p>
                          </div>';
                    unset($errors['password']);
                }
                ?>
            </div>

            <div class="input-group">
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <?php
                if (isset($errors['confirm_password'])) {
                    echo '<div class="error">
                            <p>' . $errors['confirm_password'] . '</p>
                          </div>';
                    unset($errors['confirm_password']);
                }
                ?>
            </div>

            <input type="submit" class="btn" value="Sign Up" name="signup">
        </form>

        
        <div class="links">
            <p>Already Have Account?</p>
            <a href="login.php">Sign In</a>
        </div>
    </div>

    <script src="../js/script.js"></script>
</body>

</html>

<?php
unset($_SESSION['errors']);
?>