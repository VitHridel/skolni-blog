<?php require_once('partials/head.php');?>

      
     <?php include('partials/menu.php');?>
  </header>
  <div class="content">
    <?php 
    if(!isset($_GET['page'])){ ?>
        <h2 class="podnadpis">Hlavní článek</h2>
            <a id="main-article-holder" href="index.php?page=main-article">
                <section id="main" class="main-article">
                        <?php include 'partials/main-article.php' ?>
                </section>
            </a>
            
            
            <div id="news" class="row">          
            <h2 class="podnadpis">Nejnovější články</h2>  
                <?php

                $stmt = $conn->prepare("SELECT clanky.idclanky, clanky.titulek, clanky.obsah, autor.jmeno as jmenoautor, autor.prijmeni FROM clanky JOIN autor ON autor.idautor = clanky.idautor ORDER BY  clanky.idclanky DESC LIMIT 3;");
                $stmt->execute();

                $i = 1;
                while ($row = $stmt->fetch()) {
                    echo '<article id="new-'. $i .'" class="minor">';
                    echo '<div id ="text-'.$i.'" class="clicked">';              
                    echo '<h2>'.$row['titulek'].'</h2>';
                    echo '<span class="author">autor: <i class="author-name">'.$row['jmenoautor'].' '.$row['prijmeni'].'</i></span>';
                    echo '<p class="article-content">'.$row['obsah'].'</p>';
                    echo '</div>';
                    echo '<button id="up-'.$i.'" class="up-btn">Zobrazit méně</button>';                
                    echo '</article>';
                    $i++;
                }
                
            echo '</div>';
    } else { ?>
        <a class="back-btn" href="index.php">&#8810 Zpět</a>
        <div class="whole-main-article">
            <h1>Jak se staví webová stránka?!</h1>
            <?php include 'partials/main-article.php' ?>
        </div>
        <a class="back-btn" href="index.php">&#8810 Zpět</a>
    <?php } ?>
    </div>
        
    <?php include('partials/footer.php');?>
