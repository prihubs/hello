<?php 
    require_once "assets/HdnFt/header.hd.php";
?>  

    <?php 
        if($_SESSION['usertype'] === 'user' || 'admin'){

            if(isset($_SESSION['userId'])){
                require_once "assets/canAccess/uploadFunc.ca.php";
            }
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
                include_once "assets/gallery.php"; 
                Gallery($userId, $usertype);
            ?>
        </div>

        <div class="load">
            <input type="submit" name="upload" value="Load more" class="inp btn u l">
        </div>
    </div>

<?php 
    require_once "assets/HdnFt/footer.ft.php";
?>