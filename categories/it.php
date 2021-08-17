<?php require_once('partials/head.php');?>

     </div>
      
     <?php include('partials/menu.php');?>
  </header>  
<?php

if(!isset($_GET['id'])) {
    echo '<p>ahoj</p>';
    $idclanku = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM `clanky-krizik`.`clanky`");
    $stmt->execute();

    while ($row = $stmt->fetch()) {
                echo '<article class="minor">';
                echo '<h2>'.$row['titulek'].'</h2>';
                echo '<span class="author">autor: <h3>'.$row['jmenoautor'].' '.$row['prijmeni'].'</h3></span>';
                echo '<p class="text">'.$row['obsah'].'</p>';
                echo '<p class="link"><a href="">Přečíst si více</a></p>';
                echo '</article>';
            }
            echo $_GET['id'];

} else {
    echo '<p>ahoj</p>';

            $stmt = $conn->prepare("SELECT clanky.idclanky, clanky.titulek, clanky.obsah, autor.jmeno  as jmenoautor, autor.prijmeni FROM clanky JOIN autor ON autor.idautor = clanky.idautor ORDER BY  clanky.idclanky DESC;");
            $stmt->execute();


            while ($row = $stmt->fetch()) {
                echo '<article class="minor">';
                echo '<h2>'.$row['titulek'].'</h2>';
                echo '<span class="author">autor: <h3>'.$row['jmenoautor'].' '.$row['prijmeni'].'</h3></span>';
                echo '<p class="text">'.$row['obsah'].'</p>';
                echo '<p class="link"><a href="">Přečíst si více</a></p>';
                echo '</article>';
            }
        }
?>