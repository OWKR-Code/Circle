<?php
session_start();

$userID 

// Given data:

$inputString = $_POST['content'];

// includes
include 'include/con.php';

// Check if user has ban
$query = "SELECT * FROM `Banned` WHERE `UserID` = '$userID'";
$result = mysqli_query($con, $query);
if($result)
{
    header("Location: errors/banned.php");
} 


function contentCheck($inputString) {
    
}