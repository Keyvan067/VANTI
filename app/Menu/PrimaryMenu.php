<?php

namespace VANTI\Menu;

class Menu
{
    public static function render(string $location, array $args = []): void
    {
        $defaults = [
            'theme_location' => $location,
            'container'      => false,
            'fallback_cb'    => false,
            'menu_class'     => '',
        ];

        wp_nav_menu(array_merge($defaults, $args));
    }
}