<?php 

require_once "includes/Dbh.php";

session_start();
$_SESSION['userId'] = 3;
$_SESSION['usertype'] = "admin";
// $_SESSION['user'];
// $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        