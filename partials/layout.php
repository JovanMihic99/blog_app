<!-- views/layout.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?? 'Default Title'; ?></title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>

<body>
    <?php include 'partials/nav.php'; ?>
    <div class="container">
        <?php echo $content; ?>
    </div>
    <?php include 'partials/footer.php'; ?>
</body>

</html>