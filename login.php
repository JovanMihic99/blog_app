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
    // $username = trim($_POST['username']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Instantiate AuthController with the database connection
    $authController = new AuthController($connection);
    $authController->login($username, $password); // Pass the inputs to the method
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <?php
    include('partials/nav.php'); // Include the navigation 
    ?>
    <h1>Login</h1>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>

</html>