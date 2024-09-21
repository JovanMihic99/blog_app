<?php
class AuthController
{
    private $db;
    private $userModel;

    public function __construct($db)
    {
        $this->db = $db;
        $this->userModel = new User($db);
    }

    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            // Get user input
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            // Validate input
            if (empty($username) || empty($password)) {
                echo "Username and password are required.";
                return;
            }

            // Check if username exists
            if ($this->userModel->usernameExists($username)) {
                echo "Username already exists. Please choose another one.";
                return;
            }

            // Attempt to register the user
            if ($this->userModel->register($username, $email, $password)) {
                echo "Registration successful!";
                // Redirect or take additional actions (like login)
            } else {
                echo "Registration failed. Please try again.";
            }
        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get user input
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            // Validate input
            if (empty($username) || empty($password)) {
                echo "Username and password are required.";
                return;
            }

            // Attempt to log in the user
            $user = $this->userModel->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                // Password matches, log in the user
                // Start a session and set user data
                // session_start();
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['user_name'];

                echo "Login successful!";
                header("Location: /blog_app/index.php");
            } else {
                // Invalid credentials
                echo "Invalid username or password. Please try again.";
                header("Location: /blog_app/login.php");
            }
        }
    }
    public function logout()
    {
        // session_start();

        // Unset all session variables
        $_SESSION = [];
        // Destroy the session
        session_destroy();

        header("Location: /blog_app/index.php");
        exit();
    }
}
