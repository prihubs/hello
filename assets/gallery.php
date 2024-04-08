<?php 

// require_once "includes/Dbh.php";
require_once "class/RequestFile.class.php";

function Gallery($userId, $usertype){
    $gallery = new RequestFile($userId, $usertype);
    $gallery->Callgallery();
}
