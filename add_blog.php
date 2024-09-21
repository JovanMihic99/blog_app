<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include('partials/nav.php'); // Include the navigation 

    ?>
    <?php

    echo "<h1>Loggde in:" . $_SESSION['user_name'] . "</h1>";


    ?>
</body>

</html>