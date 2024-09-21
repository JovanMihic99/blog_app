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
    public function login() {}
}
