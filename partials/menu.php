<nav class='main-menu'>
    <ul>
    <?php    
        include 'fce/menu-selected.php';

        $menu = glob('*.php');
        unset($menu[4]);
        array_unshift($menu, 'index.php');
        foreach ($menu as $item) {
            $item_name = basename($item, '.php');
            if ($item_name == 'index') {
                $item_name = 'Úvod';

            } elseif ($item_name == 'articles') {
                $item_name = 'Články';
            } elseif ($item_name == 'contact') {
                $item_name = 'kontakt';
            } elseif ($item_name == 'admin') {
                continue;
            } elseif ($item_name == 'login') {
                continue;
            } elseif ($item_name == 'logout') {
                continue;
            } elseif ($item_name == 'categories') {
                continue;
            };
            echo '<li><a '.item_selected($item).' href="'.$item.'">'.ucfirst($item_name).'</a></li>';
        }

        ?>
 
        <!--<li><a href="index.php">Úvod</a></li>
        <li><a href="articles.php">Články</a></li>
        <li><a href="contact.php">Kontakt</a></li>-->

        <?php
            if (isset($_SESSION['iduser'])) {
                if (basename($_SERVER['PHP_SELF']) == 'admin.php'){
                echo '<li><a '.item_selected('admin.php').' href="admin.php">Admin</a></li>';
                } else {
                    echo '<li><a href="admin.php">Admin</a></li>';
                }
            }
        ?>
    </ul>
</nav>