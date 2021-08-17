<?php require_once('partials/head.php');?>
<body>
<header>
    <img class="logo" src="logo.png" alt="logo CoolBlog" width="200" height="110" />
    <?php include('partials/menu.php');?>
</header>

<div class="content">

    <?php

    session_destroy();
    header("Location: index.php");

    ?>

</div>
<?php include('partials/footer.php');?>

</body>
</html>