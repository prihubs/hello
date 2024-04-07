<?php 

require_once "assets/includes/Dbh.php";

session_start();
$_SESSION['userId'] = 3;
$_SESSION['user'] = "Prince";

$_SESSION['usertype'] = "admin";
$user = $_SESSION['user'];
// $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="container">
        