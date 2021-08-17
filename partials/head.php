<?php session_start();?>
<?php include('fce/db_connect.php');?>


<!DOCTYPE html>
<html lang='cs'>
<head>
    <title>Křižík SuperBlog</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&family=Quicksand:wght@500&family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
        
    <script src="https://kit.fontawesome.com/4d97a9ee2c.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
      <div class="head-header">
        <img class="logo" src="assets/imgs/logo.png" alt="logo CoolBlog" width="200" height="110" />
        <h1 id='nazev'>Franty Křižíka</h1>
        
        <?php
            if (isset($_SESSION['iduser'])){
                    echo '<a class="log" href="logout.php">Logout</a>';
            } else {
                echo '<a class="log" href="login.php">Login</a>';
            }
        ?>
    </div>