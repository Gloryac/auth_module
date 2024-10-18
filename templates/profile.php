<?php
session_start();
require_once '../db/dbConnect.php'; 


if (!isset($_SESSION['user'])) {
    header('Location: login.php'); 
    exit();
}


$userId = $_SESSION['user']['id'];
$username = $_SESSION['user']['name'];
$email = $_SESSION['user']['email'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $newEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    
    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        
        $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
        $stmt->execute([
            'name' => $newName,
            'email' => $newEmail,
            'id' => $userId
        ]);

        
        $_SESSION['user']['name'] = $newName;
        $_SESSION['user']['email'] = $newEmail;

        
        header('Location: home.php'); 
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>
    <h1>Edit Profile</h1>

    <?php if (isset($error)) { ?>
        <div class="error-message">
            <p><?php echo htmlspecialchars($error); ?></p>
        </div>
    <?php } ?>

    <form action="profile.php" method="POST">
        <input type="hidden" name="user_id" value="<?php echo $userId; ?>">

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($username); ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" required>

        <button type="submit">Update</button>
    </form>

    <p><a href="home.php">Cancel</a></p>
</body>
</html>
