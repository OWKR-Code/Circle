<?php
Session_Start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/userNotThere.css">
    <?php
    // Check if 'username' exists in the session and is not null or empty
    if (isset($_SESSION['USERNAME']) && $_SESSION['USERNAME'] !== "NILL" && !empty($_SESSION['USERNAME'])) {
    ?>
</head>
<body>
    <header>
        <?php include "include/header.php"; ?>
    </header>

    <?php
        include "PHP/postBody.php";
    ?>


    <?php
    } else {
    ?>
        <?php include "include/userNotThere.php"; ?>
    <?php
    }
    ?>
</body>
</html>
