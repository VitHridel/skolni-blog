<?php
    if(isset($_GET['id'])){
        $idclanek = $_GET['id'];
        echo '<section class="edit-article">';
        echo '<form action="./admin.php?section=clanek-seznam" method="post">';
        $stmnt = $conn->prepare("SELECT * FROM clanky WHERE idclanky = $idclanek");
        $stmnt->execute();
        while ($rown = $stmnt->fetch()) {
            $idkategorie = $rown['idkategorie'];
            echo '<input id="'.$rown['idclanky'].'" class="id" type="text" name="idclanku" value="'.$rown['idclanky'].'" style="display: none">';
            echo '<input type="text" name="title" value="'.$rown['titulek'].'" required>';?>
            <select class="category-choose" name="kategorie">
                <?php
                $stmt = $conn->prepare("SELECT idkategorie, nazev FROM kategorie");
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                    if($row['nazev'] == 'Databaze') {
                        $nazev_kategorie = 'Databáze';
                    } elseif($row['nazev'] == 'Programovani') {
                        $nazev_kategorie = 'Programování';
                    } else {
                        $nazev_kategorie = $row['nazev'];
                    }
                    if ($row['idkategorie'] == $idkategorie){
                        echo '<option value="'.$row['idkategorie'].'" selected>'.$nazev_kategorie.'</option>';
                    } else {
                        echo '<option value="'.$row['idkategorie'].'">'.$nazev_kategorie.'</option>';
                    }
                }
                ?>
            </select>
            <textarea name="content" placeholder="Obsah nového článku" required rows="15"><?php echo $rown['obsah'];?></textarea>
            <p class="form-btn">
                <input class="submit" type="submit" name="update" value="Odeslat">
                <input class="reset" type="submit" name="reset" value="Odstranit">
            </p>
        <?php } ?>
        </form>
    </section>
<?php } ?>
