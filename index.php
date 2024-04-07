<?php 

require_once "includes/Dbh.php";

session_start();
// $_SESSION['userId'] = 3;
$_SESSION['usertype'] = "admin";
$usertype = "userdd";
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
        <?php 
            if($_SESSION['usertype'] === 'user' || 'admin'){

                if(isset($_SESSION['userId'])){
                    require_once "canAccess/uploadFunc.ca.php";
                }
                echo $_SESSION['userId'];
            }
        ?>

        <div class="divider"></div>

        <div class="main">
            <div class="sec1">
                <h1 class="sub">File/Gallery</h1>
                <em class="ssub">A range of Uploaded Files/Gallery</em>
            </div>

            <div class="sec3 ">
                <?php 
                    include_once "gallery.php"; 
                    Gallery($_SESSION['userId']);
                ?>
            </div>

            <div class="load">
                <input type="submit" name="upload" value="Load more" class="inp btn u l">
            </div>
        </div>

        
    </div>
    
</body>
</html>