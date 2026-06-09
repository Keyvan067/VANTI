<?php

namespace VANTI\Assets;

class AssetManager
{
    public function __construct()
    {
        add_action(
            'wp_enqueue_scripts',
            [$this, 'enqueueFrontend']
        );

        add_action(
            'admin_enqueue_scripts',
            [$this, 'enqueueAdmin']
        );
    }

    public function enqueueFrontend(): void
    {
        wp_enqueue_style(
            'vanti-main',
            VANTI_URL . '/public/css/main.css',
            [],
            VANTI_VERSION
        );

        wp_enqueue_script(
            'vanti-main',
            VANTI_URL . '/public/js/main.js',
            [],
            VANTI_VERSION,
            true
        );
    }

    public function enqueueAdmin(): void
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