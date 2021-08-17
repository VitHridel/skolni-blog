<?php
    if(!isset($_SESSION['email'])){
        header("Location: http://localhost/login.php");
    }