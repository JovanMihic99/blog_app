<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="stylesheet" href="/blog_app/public/css/styles.css">
</head>

<body>
    <?php include 'partials/nav.php'; ?> <!-- Include the navigation -->

    <div class="content">
        <?php echo $content; ?> <!-- The view content gets injected here -->
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Blog Site</p>
    </footer>
</body>

</html>