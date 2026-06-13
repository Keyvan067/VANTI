<?php

use VANTI\Menu\Menu;

?>

<nav class="hidden lg:flex items-center">
    <?php
    Menu::render(
        'primary_menu',
        [
            'menu_class' => 'flex items-center gap-6',
        ]
    );
    ?>
</nav>