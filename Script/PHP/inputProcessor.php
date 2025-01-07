<?php
session_start();

// includes
include 'include/con.php';

// Check if user has ban
$query = "SELECT * FROM `Banned` WHERE "