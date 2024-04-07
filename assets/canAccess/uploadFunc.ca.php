<?php
?>

<div class="maiin">
            <div class="main sticky">
                <div class="sec1">
                    <h1 class="sub">File_System</h1>
                    <em class="ssub">Uploading your File with Ease</em>
                </div>
                <div class="space"></div>
                <div class="messages">
                    <?php include_once "assets/ErrorHandler.php"; ?>
                </div>

                <div class="space"></div>
                <div class="sec2">
                    <form action="assets/includes/makeFile.inc.php" method="post" enctype="multipart/form-data">
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
