<?php
require_once 'config/init.php';
require_once 'models/User.php';
require_once 'controllers/AuthController.php';

// Initialize the User model with the database connection
$userModel = new User($connection);
// Initialize the AuthController with the user model
$authController = new AuthController($connection);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Instantiate AuthController with the database connection
    $authController = new AuthController($connection);
    $authController->register($username, $email, $password); // Pass the inputs to the method
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>

<body>
    <h1>Register</h1>
    <form method="POST" action="register.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Register</button>
    </form>
</body>

</html>