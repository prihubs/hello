<?php 

require_once "includes/Dbh.php";

session_start();
$_SESSION['userId'] = 3;
// $_SESSION['userType'];
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
        <div class="maiin">
            <div class="main sticky">
                <div class="sec1">
                    <h1 class="sub">File_System</h1>
                    <em class="ssub">Uploading your File with Ease</em>
                </div>
                <div class="space"></div>
                <div class="messages">
                    <?php include_once "ErrorHandler.php"; ?>
                </div>

                <div class="space"></div>
                <div class="sec2">
                    <form action="includes/makeFile.inc.php" method="post" enctype="multipart/form-data">
                        <h2 class="sub2">Fill in all Required feilds!</h2>
    
                        <label for="name">Enter File Name</label> <br>
                        <input type="text" name="name" class="inp" id="name"> <br>
    
                        <label for="title">Enter File Title</label> <br>
                        <input type="text" name="title" class="inp" id="title"> <br>
    
                        <label for="desc">Enter File Description</label> <br>
                        <input type="text" name="desc" class="inp" id="desc"> </p>

                        <input type="file" name="file" class="inp file"> </p>
    
                        <input type="submit" name="submit" value="Upload" class="inp btn u">
                        <input type="submit" name="reset" value="Reset" class="inp btn r">
                    </form>
                    <em class="ssub2"> Upload only jpg, png, jpeg</em>
                </div>
            </div>
        </div>

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