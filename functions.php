<?php

defined('ABSPATH') || exit;

/*
|--------------------------------------------------------------------------
| Constants
|--------------------------------------------------------------------------
*/

define('VANTI_PATH', get_template_directory());
define('VANTI_URL', get_template_directory_uri());
define('VANTI_VERSION', '1.0.0');
/*
|--------------------------------------------------------------------------
| Composer
|--------------------------------------------------------------------------
*/

if (file_exists(VANTI_PATH . '/vendor/autoload.php')) {
    require_once VANTI_PATH . '/vendor/autoload.php';
}

/*
|--------------------------------------------------------------------------
| Err Handler
|--------------------------------------------------------------------------
*/

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    error_log("[VANTI PHP ERROR] $errstr in $errfile:$errline");
    return true; // جلوگیری از crash
});

set_exception_handler(function ($e) {
    error_log("[VANTI EXCEPTION] " . $e->getMessage());
});
add_action('admin_menu', function () {
    add_menu_page(
        'VANTI Debug',
        'VANTI Debug',
        'manage_options',
        'vanti-debug',
        function () {
            include __DIR__ . '/debug-panel.php';
        },
        'dashicons-warning',
        99
    );
});
/*
|--------------------------------------------------------------------------
| Bootstrap
|--------------------------------------------------------------------------
*/
if (file_exists(__DIR__ . '/app/Bootstrap.php')) {
    require_once __DIR__ . '/app/Bootstrap.php';
}