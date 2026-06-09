<?php

namespace VANTI\Assets;

use VANTI\Core\Vite;

class Manager
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_assets']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_assets']);
    }

    public function enqueue_frontend_assets()
    {
        // DEV MODE
        if (defined('VANTI_VITE_DEV') && VANTI_DEV) {

            wp_enqueue_script(
                'vanti-vite-client',
                'http://localhost:5173/@vite/client',
                [],
                null,
                true
            );

            wp_enqueue_script(
                'vanti-vite-app',
                'http://localhost:5173/resources/js/app.js',
                [],
                null,
                true
            );

            return;
        }

        // PROD MODE
        wp_enqueue_style(
            'vanti-app',
            VANTI_URL . '/dist/assets/app.css',
            [],
            VANTI_VERSION
        );

        wp_enqueue_script(
            'vanti-app',
            VANTI_URL . '/dist/assets/app.js',
            [],
            VANTI_VERSION,
            true
        );
    }

    public function enqueue_admin_assets()
    {

        wp_enqueue_style(
            'vanti-admin',
            VANTI_URL . '/public/css/admin.css',
            [],
            VANTI_VERSION
        );

        wp_enqueue_script(
            'vanti-admin',
            VANTI_URL . '/public/js/admin.js',
            [],
            VANTI_VERSION,
            true
        );
    }
}