<?php

namespace VANTI\Providers;

use VANTI\Core\ServiceProvider;
use VANTI\Core\Vite;
use Vanti\Core\Hookable;

class AssetsProvider extends ServiceProvider
{

    // Hot Reload...
    private bool $isDev;
    private string $devUrl = 'http://localhost:5173';

    public function __construct()
    {
        $this->isDev = (getenv('VITE_DEV') === 'true');
    }

    /**
     * ثبت خدمات در سنترال کانتینر (اجباری به خاطر کلاس ServiceProvider)
     */
    public function register(): void
    {

        // Hot Reload...
        // در حال حاضر برای Assets نیازی به ثبت چیزی در کانتینر نداریم،
        // اما متد را خالی می‌گذاریم تا خطای PHP برطرف شود.
        add_action('wp_enqueue_scripts', [$this, 'enqueue']);
        add_action('wp_head', [$this, 'injectViteClient'], 1);
    }

    /**
     * اجرای هوک‌های مربوط به پیکربندی استایل‌ها و اسکریپت‌ها
     */
    public function boot(): void
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueFrontendAssets']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminAssets']);
    }

    // Hot Reload...
    public function enqueue(): void
    {
        $this->isDev ? $this->dev() : $this->prod();
    }

// ─── Dev: مستقیم از Vite ─────────────────────────────
    private function dev(): void
    {
        wp_enqueue_script(
            'vanti-main',
            "{$this->devUrl}/assets/src/js/app.js",
            [], null, true
        );
        // CSS را Vite خودش inject می‌کند — نیازی به enqueue جداگانه نیست
    }

    // ─── Prod: از فایل‌های build شده ────────────────────
    private function prod(): void
    {
        $manifest = $this->manifest();
        $base = get_template_directory_uri() . '/assets/dist/';

        wp_enqueue_style(
            'vanti-style',
            $base . $manifest['assets/src/css/main.css']['file'],
            [], null
        );

        wp_enqueue_script(
            'vanti-main',
            $base . $manifest['assets/src/js/app.js']['file'],
            [], null, true
        );
    }

    // ─── Vite HMR Client ─────────────────────────────────
    public function injectViteClient(): void
    {
        if (!$this->isDev) return;
        echo '<script type="module" src="' . $this->devUrl . '/@vite/client"></script>' . PHP_EOL;
    }

    private function manifest(): array
    {
        $path = get_template_directory() . '/assets/dist/.vite/manifest.json';
        return json_decode(file_get_contents($path), true);
    }

    /**
     * بارگذاری فایل‌های اصلی قالب با استفاده از Vite
     */
    public function enqueueFrontendAssets(): void
    {
        Vite::load('resources/css/app.css');
        Vite::load('resources/js/app.js');

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    /**
     * بارگذاری فایل‌های مربوط به پنل مدیریت وردپرس
     */
    public function enqueueAdminAssets(): void
    {
        // در صورت نیاز در آینده استفاده می‌شود
    }
}