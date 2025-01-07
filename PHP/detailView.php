<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
             <?php
             include "include/con.php";

               $PostID = $_GET['ident'];
               $query = "SELECT * FROM `POSTS` WHERE `ID` = $PostID";
               $result = mysqli_query($con, $query);
               while ($row = $result->fetch_assoc()) {
                   $Content = $row['content'];

               }


?>
             <title>Document</title>
</head>
<body>

</body>
</html>