<?php require_once('partials/head.php');?>

     </div>
      
     <?php include('partials/menu.php');?>
     <?php include 'partials/articles-menu.php'; ?>
   </header>

    <div class="content">
      <?php 
      $stmnt = $conn->prepare("SELECT * FROM `clanky-krizik`.`kategorie` ORDER BY `idkategorie` ASC");
      $stmnt->execute();
      while ($rown = $stmnt->fetch()) { 
      echo '<section id="scroll-'.$rown['nazev'].'">';
      echo '<span class="podnadpis">';
      $nadpis = ucfirst($rown['nazev']);
      if($nadpis == 'Programovani') {
        $nadpis = 'Programování';
      } elseif ($nadpis == 'Databaze') {
        $nadpis = 'Databáze';
      }
        echo '<h2>'.$nadpis.'</h2>';
        echo '<a class="category-link" href="categories.php?section='.strtolower($rown['nazev']).'">Zobrazit všechny články</a>';
      echo '</span>';
      $idkategorie = $rown['idkategorie'];
      ?>
      <div class="articles">
      <?php
        $stmt = $conn->prepare("SELECT * FROM `clanky-krizik`.`clanky` WHERE `idkategorie` = $idkategorie ORDER BY `idclanky` DESC LIMIT 3");
        $stmt->execute();
        $i = 1;
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
          $i++;
        };
      echo '</div>';
      echo '</section>';
      }
      ?>
           
    </div>
    <script src="assets/js/article-scroll.js"></script>

<?php include('partials/footer.php');?>