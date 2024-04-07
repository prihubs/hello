<?php

if(isset($_GET['error'])){ 
    $error = $_GET['error'];
    
    echo '<div class="ssub error maxH">
              <em>'. $error .'</em>
          </div>';
} 

if(isset($_GET['success'])){ 
    $success = $_GET['success'];
    
    echo '<div class="ssub success maxH">
              <em>'. $success .'</em>
          </div>';
} 

if(isset($_GET['message'])){ 
    $message = $_GET['message'];
    
    echo '<div class="ssub messagea maxH">
              <em>'. $message .'</em>
          </div>';
} 

?>