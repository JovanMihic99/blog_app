<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="stylesheet" href="/blog_app/public/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/blog_app/public/js/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="parallax-background"></div>
    <div class="main-content">

        <?php include 'partials/nav.php'; ?> <!-- Include the navigation -->

        <div class="content">
            <?php echo $content; ?> <!-- The view content gets injected here -->
        </div>

        <footer>
            <p>&copy; <?php echo date("Y"); ?> Blog Site</p>
        </footer>
    </div>
</body>

</html>