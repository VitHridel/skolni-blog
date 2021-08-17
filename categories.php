<?php require_once('partials/head.php');?>

     </div>
      
     <?php include('partials/menu.php');?>
  </header>
    
    <div class="content">
        <div class="articles">
<?php
if(isset($_GET['section'])) {
    $section = $_GET['section'];
    if($section == 'it') {
        $section = 'IT';
    } elseif($section == 'programovani') {
        $section = 'Programování';
    } elseif($section == 'databaze') {
        $section = 'Databáze';
    } else {
        $section = ucfirst($section);
    };
    if(isset($_GET['id'])) {
        $idclanku = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM `clanky-krizik`.`clanky` WHERE idclanky=$idclanku");
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $idautor = $row['idautor'];
            echo '<a class="back-btn" href="articles.php">&#8810 Zpět</a>';
            echo '<article class="only-article">';            
            echo '<h2>'.$row['titulek'].'</h2>';
            echo '<p class="text">'.$row['obsah'].'</p>';
            $stmts = $conn->prepare("SELECT * FROM `clanky-krizik`.`autor` WHERE idautor=$idautor");
            $stmts->execute();
            while ($rows = $stmts->fetch()){
                echo '<span class="author">autor: <i class="author-name">'.$rows['jmeno'].' '.$rows['prijmeni'].'</i></span>';
            };
            if (isset($_SESSION['iduser'])) {
                echo '<a class="edit" href="admin.php?section=clanek-edit&id='.$idclanku.'">Edit</a>';
            }
            echo '</article>';
        }
    } else {
        $stmnt = $conn->prepare("SELECT * FROM `clanky-krizik`.`kategorie` ORDER BY `idkategorie` ASC");
        $stmnt->execute();
        echo '<span class="podnadpis"><h2>'.$section.'</h2><a class="back-btn" href="articles.php">&#8810 Zpět</a></span>';
        while ($rown = $stmnt->fetch()) {
            $idkategorie = $rown['idkategorie'];
            if($_GET['section'] == strtolower($rown['nazev'])) {
                $stmt = $conn->prepare("SELECT * FROM `clanky-krizik`.`clanky` WHERE idkategorie=$idkategorie ORDER BY idclanky DESC");
                $stmt->execute();

                while ($row = $stmt->fetch()) {
                    $idautor = $row['idautor'];
                    echo '<a class="article" href="categories.php?section='.strtolower($rown['nazev']).'&id='.$row['idclanky'].'">';
                    echo '<article>';
                    echo '<p class="text">'.$row['obsah'].'</p>';
                    echo '</article>';
                    echo '<h2>'.$row['titulek'].'</h2>';
                    $stmts = $conn->prepare("SELECT * FROM `clanky-krizik`.`autor` WHERE idautor=$idautor");
                    $stmts->execute();
                    while ($rows = $stmts->fetch()){
                        echo '<span class="author">autor: <i class="author-name">'.$rows['jmeno'].' '.$rows['prijmeni'].'</i></span>';
                    };
                    echo '</a>';
                }
            }
        }
    }
}       
        echo '</div>';
        