<?php
    
    if (isset($_POST['submit'])) {
        
        $titulek = $_POST['title'];
        $kategorie = $_POST['kategorie'];
        $obsah = $_POST['content'];
        $iduser = $_SESSION['iduser'];

        $stmt = $conn->prepare("INSERT INTO clanky (titulek,obsah,idkategorie,idautor) VALUES ('".$titulek."','".$obsah."','".$kategorie."','".$iduser."')");
        $stmt->execute();
    }
?>
<section class="create-article">
    <form action="./admin.php?section=clanek-novy" method="post">
        <input type="text" name="title" placeholder="Titulek nového článku" required>
        <select class="category-choose" name="kategorie">
            <?php
            $stmt = $conn->prepare("SELECT idkategorie, nazev FROM kategorie ORDER BY idkategorie");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                if($row['nazev'] == 'Databaze') {
                    echo '<option value="'.$row['idkategorie'].'">Databáze</option>';
                } elseif($row['nazev'] == 'Programovani') {
                    echo '<option value="'.$row['idkategorie'].'">Programování</option>';
                } else {
                echo '<option value="'.$row['idkategorie'].'">'.$row['nazev'].'</option>';
                }
            }
            ?>
        </select>
        <textarea name="content" placeholder="Obsah nového článku" required rows="15"></textarea>
        <p class="form-btn">
            <input class="submit" type="submit" name="submit" value="Odeslat">
            <input class="reset" type="reset" name="reset" value="Reset">
        </p>
    </form>
</section>
<?php
    
?>
