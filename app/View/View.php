<?php

namespace VANTI\View;

use VANTI\Core\Logger;

class View
{
    public static function render(string $view, array $data = []): void
    {
        $view = str_replace('.', '/', $view);

        $file = VANTI_DIR_PATH . '/templates/' . $view . '.php';

        if (!file_exists($file)) {
            Logger::log("View not found: {$view}", 'ERROR');

            wp_die(
                sprintf(
                    'View <strong>%s</strong> not found.',
                    esc_html($view)
                )
            );
        }

        extract($data, EXTR_SKIP);

        require $file;
    }

    public static function exists(string $view): bool
    {
        $view = str_replace('.', '/', $view);

        return file_exists(
            VANTI_DIR_PATH . '/templates/' . $view . '.php'
        );
    }
}