<?php 
function item_selected($item) {
    if ($item == basename($_SERVER['PHP_SELF'])) {
        return 'class="selected"';
    } elseif (basename($_SERVER['PHP_SELF']) == 'categories.php' && $item == 'articles.php') {
        return 'class="selected"';
    }
}

?>