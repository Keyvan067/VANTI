<?php

namespace VANTI\Admin;

class AssetManager
{
    protected string $manifest;

    public function __construct()
    {
        // مسیر فایل manifest که Vite خروجی می‌دهد
        $manifestPath = VANTI_PATH . '/dist/manifest.json';

        if (file_exists($manifestPath)) {
            $this->manifest = json_decode(file_get_contents($manifestPath), true);
        } else {
            $this->manifest = [];
        }

        add_action('wp_enqueue_scripts', [$this, 'enqueueFrontend']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdmin']);
    }

    public function asset(string $key): string
    {
        return isset($this->manifest[$key])
            ? VANTI_URL . '/dist/' . $this->manifest[$key]['file']
            : '';
    }

    public function enqueueFrontend(): void
    {
        // Tailwind-->PROD MODE
        wp_enqueue_style(
            'tw-app',
            VANTI_URL . 'resources/assets/output.css',
            [],
            VANTI_VERSION
        );

        wp_enqueue_style(
            'vanti-main',
            $this->asset('resources/css/app.css'),
            [],
            VANTI_VERSION
        );

        wp_enqueue_script(
            'vanti-main',
            $this->asset('resources/js/app.js'),
            [],
            VANTI_VERSION,
            true
        );
    }

    public function enqueueAdmin(): void
    {
        wp_enqueue_style(
            'vanti-admin',
            VANTI_URL . '/dist/css/admin.css',
            [],
            VANTI_VERSION
        );

        wp_enqueue_script(
            'vanti-admin',
            VANTI_URL . '/dist/js/admin.js',
            [],
            VANTI_VERSION,
            true
        );
    }
}