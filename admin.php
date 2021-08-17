<?php require_once('partials/head.php');?>
<?php require_once('fce/check_permission.php');?>

    <?php include('partials/menu.php');?>
</header>

<main>
    <?php if(isset($_POST['confirm'])) {
            $idautor = $_SESSION['iduser'];
            $jmeno = $_POST['firstname'];
            $prijmeni = $_POST['lastname'];
            $email = $_POST['email'];
            $_SESSION['firstname'] = $_POST['firstname'];
            $_SESSION['lastname'] = $_POST['lastname'];
            $_SESSION['email'] = $_POST['email'];
            $stmt = $conn->prepare("UPDATE autor SET jmeno='$jmeno', prijmeni='$prijmeni', email='$email' WHERE idautor='$idautor'");
            $stmt->execute();
    } ?>
    <header class="admin-header">
        <div class="welcome">
            <h2 id="admin-name">
            Vítej <br> <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></h2>
        </div>
        <?php include('admin/menu-admin.php'); ?>
    </header>
    <div class="content">
        <?php
        if (isset($_GET['section']))  {
            $section = $_GET['section'];
            include 'admin/menu/'.$section.'.php';
        }
        
        ?>
    </div>
</main>
<?php include('partials/footer.php');?>