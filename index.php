<?php
/**
 * Main template file
 *
 * @package VANTI
 */


use VANTI\View\View;

ob_start();

View::render('pages.home');

$content = ob_get_clean();

View::render(
        'layouts.app',
        [
                'content' => $content,
        ]
);
