<?php 

function Returnn($error){
    die(header("Location: ../?error=$error"));
}
function Returnm($message){
    die(header("Location: ../?message=$message"));
}
function Returns($success){
    die(header("Location: ../?success=$success"));
}

