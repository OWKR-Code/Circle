<?php Session_Start(); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
             <title>Document</title>
             <link rel="stylesheet" href="CSS/main.css" >
              <link rel="stylesheet" href="CSS/userNotThere.css">
             <?php
             $_SESSION['username'] = "NILL";
              $username = $_SESSION['username'];
if ($username !== "NILL") {
  ?>
</head>
<body>
  <header>
  <?php include "include/header.php"; ?>



  </header>

  <?php } else {

  ?>

  <?php  include "include/userNotThere.php";?>

  <?php }?>
</body>
</html>