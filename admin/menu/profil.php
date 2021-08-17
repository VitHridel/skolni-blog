<?php if(!isset($_GET['page'])) { ?>

    <span class="podnadpis">
        <h2>Admin</h2>
        <a href="admin.php?section=profil&page=edit">Úprava osobních údajů</a>
    </span>
    <div class="profil">
        <p>
            <strong>Jméno: </strong><?php echo $_SESSION['firstname']; ?><br>
            <strong>Příjmení: </strong><?php echo $_SESSION['lastname']; ?><br>
            <strong>E-mail: </strong><?php echo $_SESSION['email']; ?><br>
            <strong>Počet článků:</strong> 
            <?php
                $idautor = $_SESSION['iduser'];
                $stmt = $conn->prepare("SELECT * FROM `clanky-krizik`.`clanky` WHERE `idautor` = $idautor");
                $stmt->execute(); 
                $i = 0;
                while ($row = $stmt->fetch()) {
                    $i++;
                }
                echo $i;
            ?>
        </p>
        </div>
<?php } elseif ($_GET['page'] == 'edit') { ?>
    <h2 class="podnadpis">Úprava osobních údajů</h2>
    <form class="edit-profile" action="./admin.php" method="POST">
        <label for="firstname"><strong>Jméno: </strong>
            <input type="text" name="firstname" id="firstname" value="<?php echo $_SESSION['firstname']; ?>">
            </label>
        <label for="lastname"><strong>Příjmení: </strong>
            <input type="text" name="lastname" id="lastname" value="<?php echo $_SESSION['lastname']; ?>">
        </label>
        <label for="email"><strong>E-mail: </strong>
            <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>">
        </label>
        <input class="submit" type="submit" name="confirm" value="Potvrdit">
    </form>


            
<?php } ?>