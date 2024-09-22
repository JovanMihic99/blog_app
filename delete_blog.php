<?php
require_once "config/init.php";
require_once "controllers/BlogController.php";
$blogController = new BlogController($connection);

if (!$_SERVER['REQUEST_METHOD'] === "POST") {
    header("Location: index.php");
    die();
}

if (!$post['user-id'] === $_SESSION['user_id']) {
    header("Location: /post.php?blog_id=" . $_GET['blog_id']);
    die();
}

$blogController->remove_blog($_GET['blog_id'], $_SESSION['user_id']);

// var_dump($_GET['blog_id']);
// exit
