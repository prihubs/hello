<?php
session_start();


if(isset($_POST['reset'])){
    die(header('Location: ../../'));
}

if(isset($_POST['submit'])){

    require_once "Dbh.php";
    include_once "myFunc.inc.php";
    include_once "../class/File.class.php";
    
    $pName = $_POST['name'];
    $pTitle = $_POST['title'];
    $pDesc = $_POST['desc'];
    $userId = $_SESSION['userId'];


    $file = $_FILES['file'];

    $fName = $file['name'];
    $fSize = $file['size'];
    $fErr = $file['error'];
    $fTLocation = $file['tmp_name'];

    // var_dump($fSize[0]);
    // var_dump($fSize[0]);
    // echo var_dump($fAExt);
    // echo $fSize[0]." Years Old";
    // Returnn(print_r($file));

    $filesystem = new File($userId, $pName, $pTitle, $pDesc, $fName, $fSize, $fErr, $fTLocation);
    $filesystem->Spit();

}