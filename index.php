<?php
// Start the session
session_start();

// Define constants for database connection (optional for reusability)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'Circle');

// Check if session variable 'USERNAME' is valid
$username = isset($_SESSION['USERNAME']) ? $_SESSION['USERNAME'] : null;
if ($username && $username !== "NILL" && !empty($username)) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/userNotThere.css">
</head>
<body>
    <header>
        <?php include "include/header.php"; ?>
    </header>
    <main>
    <?php include 'PHP/postBody.php'?>
    </main>
<?php
} else {
    // User not authenticated or session invalid
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Not Logged In</title>
        <link rel="stylesheet" href="CSS/userNotThere.css">
    </head>
    <body>
        <?php include "include/userNotThere.php"; ?>
    </body>
    </html>
<?php
}
?>
</body>
</html>
