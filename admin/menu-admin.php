<nav class='admin-menu'>
    <ul>
    <?php
        $sections = glob('admin/menu/*.php');
        foreach ($sections as $section) {
            $section = basename($section, '.php');
            if ($section == 'clanek-edit') {
                continue;
            } elseif ($section == 'clanek-novy') {
                $section_name = 'Vytvořit článek';
                $badge = '<i class="far fa-plus-square"></i>';
            } elseif ($section == 'clanek-seznam') {
                $section_name = 'Seznam článků';
                $badge = '<i class="fas fa-list"></i>';
            } elseif ($section == 'profil') {
                $section_name = 'Profil';
                $badge = '<i class="far fa-id-badge"></i>';
            }
            echo '<li><a href="admin.php?section='. $section .'">'.$badge.'<h4>'. $section_name .'</h4></a></li>';
        }
    ?>
    </ul>
</nav>