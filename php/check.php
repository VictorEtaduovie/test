<?php
    if(!isset($_SESSION['user'])) 
    {
     $_SESSION['no-login-message'] = "<div class='error-one'>Please login or register first</div>";
     
     header('location: ../../index.php');
    }
?>