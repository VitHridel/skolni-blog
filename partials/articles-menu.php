<nav id="article-menu" class="articles-menu">
    <ul>
        <?php 
        $stmt = $conn->prepare("SELECT * FROM `clanky-krizik`.`kategorie` ORDER BY `idkategorie`");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
        $nazev = $row['nazev'];
        if ($nazev == 'Programovani') {
            $nazev = 'Programování';
        } elseif ($nazev == 'Databaze') {
            $nazev = 'Databáze';
        }
        echo '<li id="'.$row['nazev'].'" class="menu-section">'.$nazev.'</li>'; 
        }
        ?>
    </ul>
</nav>