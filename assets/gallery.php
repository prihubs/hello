<?php 

// require_once "includes/Dbh.php";
require_once "class/RequestFile.class.php";

function Gallery($userId){
    $gallery = new RequestFile($userId);
    $gallery->Callgallery();
}
