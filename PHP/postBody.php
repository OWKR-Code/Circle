<?php Session_Start(); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
             <title>DEBUG: PostBody</title>
               <style>
               @import "CSS/root.css";
@import "CSS/font.css";
body {
margin: 2%}

.TopBarSelectView {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
grid-gap: 1%;

}

.SelectView {
    background-color: var(--ELECTROMAGNETIC);
  padding: 1%;
border-radius: 100px;
font-family: monospace;
font-weight: bold;
font-size: 1vw;
}
.Post {
background-color: var(--ELECTROMAGNETIC);
width: 40%;
padding: 1%;
}

.Post p {
padding: 1%;
}
.posts {
display: flex;
grid-gap: 4vh;
flex-direction: column;

}
               </style>

             <?php
                include "include/con.php";
                $CircleID = $_SESSION['CIRCLE'];
                $query = "SELECT * FROM `CIRCELS` WHERE `ID` LIKE $CircleID";
                $result = mysqli_query($DEFAULTS_CON, $query);
                while ($row = $result->fetch_assoc())
                   {
                      $CircleName = $row['name'];
                   }
?>
</head>
<body>
<div class="TopBarSelectView">
<p class="SelectView">For you</p>

<p class="SelectView"><?php echo $CircleName; ?></p>
</div>

<div class="posts">
<?php
$query = "SELECT * FROM `POSTS` WHERE `CircleID` = $CircleID";
$result = mysqli_query($DEFAULTS_CON, $query);
while ($row = $result->fetch_assoc()) {
   $posterID = $row['posterID'];

   $UserQuery = "SELECT * FROM `USERS` WHERE `ID` LIKE $posterID";
   $result = mysqli_query($DEFAULTS_CON, $UserQuery);
   while ($uqr = $result->fetch_assoc()) {
      $LP_USERNAME = $uqr['username'];

   }
   ?>
<div class="Post">
<p><?php echo $LP_USERNAME; ?></p>
<p><?php echo $row['content'] ?></p>

</div>


<?php

}

?>

</div>
</body>
</html>