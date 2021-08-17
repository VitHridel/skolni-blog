
<section class="content">
    <?php
    
    if (isset($_POST['update'])) {
        
        $titulek = $_POST['title'];
        $kategorie = $_POST['kategorie'];
        $obsah = $_POST['content'];
        $idclanku = $_POST['idclanku'];
        $iduser = $_SESSION['iduser'];

        $stmt = $conn->prepare("UPDATE clanky SET titulek='$titulek', obsah='$obsah', idkategorie='$kategorie' WHERE idclanky='$idclanku'");
        $stmt->execute();
        
    } elseif (isset($_POST['reset'])) {
        $idclanku = $_POST['idclanku'];
        $stmt = $conn->prepare("DELETE FROM clanky WHERE idclanky=$idclanku");
        $stmt->execute();
    }
      $stmnt = $conn->prepare("SELECT * FROM `clanky-krizik`.`kategorie` ORDER BY `idkategorie` ASC");
      $stmnt->execute();
      while ($rown = $stmnt->fetch()) { 
      echo '<section>';
      echo '<span class="podnadpis">';
      $nadpis = ucfirst($rown['nazev']);
      if($nadpis == 'Programovani') {
        $nadpis = 'Programování';
      } elseif ($nadpis == 'Databaze') {
        $nadpis = 'Databáze';
      }
        echo '<h2>'.$nadpis.'</h2>';
      echo '</span>';
      $idkategorie = $rown['idkategorie'];
      ?>
      <div class="list-of-articles">
      <?php
        $stmt = $conn->prepare("SELECT * FROM `clanky-krizik`.`clanky` WHERE `idkategorie` = $idkategorie ORDER BY `idclanky` DESC");
        $stmt->execute();
        $i = 1;
        while ($row = $stmt->fetch()) {
          $idautor = $row['idautor'];
          echo '<a class="articles-item" href="admin.php?section=clanek-edit&id='.$row['idclanky'].'">';
          echo '<p>'.$row['titulek'].'</p>';
          $stmts = $conn->prepare("SELECT * FROM `clanky-krizik`.`autor` WHERE idautor=$idautor");
          $stmts->execute();
          while ($rows = $stmts->fetch()){
              echo '<span class="author">autor: <i class="author-name">'.$rows['jmeno'].' '.$rows['prijmeni'].'</i></span>';
          };
          echo '</a>';
          $i++;
        };
      echo '</div>';
      echo '</section>';
      }
    ?>
</section>
