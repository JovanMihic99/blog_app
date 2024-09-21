<?php
// db.php (Database connection)
// try {
//     $db = new PDO('mysql:host=localhost;dbname=blog_site_schema;charset=utf8', 'root', 'password');
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     echo "Database connection failed: " . $e->getMessage();
// }

// index.php (Registration form submission)
// require_once('models/User.php');
// require_once('controllers/AuthController.php');

// $userModel = new User($db);
// $authController = new AuthController($userModel);

// // Call the register method
// $authController->register();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="register.php">Register</a></li>
        </ul>
        <ul>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
</body>

</html>