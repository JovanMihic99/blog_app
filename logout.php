<?php
require_once 'config/init.php'; // Include your init file
require_once 'controllers/AuthController.php';

$authController = new AuthController($connection);
$authController->logout();
