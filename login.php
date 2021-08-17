<?php require_once('partials/head.php');?>

    <?php include('partials/menu.php');?>
</header>

<div class="content">

    <?php
    if (isset($_POST['submit'])){

        $email = $_POST['email'];
        $heslo = md5($_POST['password']);

        $stmt = $conn->prepare("SELECT idautor, heslo FROM autor WHERE email = '" . $email . "'");
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            if ($heslo == $row['heslo']) {

                $stmt = $conn->prepare("SELECT * FROM autor WHERE idautor = '" . $row['idautor'] . "'");
                $stmt->execute();

                while ($row = $stmt->fetch()) {
                    $_SESSION['firstname'] = $row['jmeno'];
                    $_SESSION['lastname'] = $row['prijmeni'];
                    $_SESSION['iduser'] = $row['idautor'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['telefonni_cislo'] = '3464256532655';

                    header("Location: index.php");
                }
            } 
            else {
                echo "<p>Přihlášení se nezdařilo!</p>";
            }
        }
    } else {
    ?>
    <section class="login">
        <h2>Přihlášení</h2>
        <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
            <input type="email" name="email" size="39" placeholder="E-mail" required>
            <input type="password" name="password" size="39"placeholder="Heslo" required>
            <p class="form-btn">
                <input class="submit" type="submit" name="submit" value="Přihlásit se">
                <input id="reset" type="reset" name="reset" value="Reset">
            </p>    
        </form>
    </section>

    <?php
    }
    ?>
</div>
<?php include('partials/footer.php');?>

</body>
</html>