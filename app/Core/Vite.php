<?php

namespace Vanti\Core;

class Vite {
    private const DEV_SERVER = 'http://localhost:5173';
    private const DIST_DIR = 'dist';

    /**
     * بررسی اینکه آیا سرور توسعه Vite روشن است یا خیر
     */
    public static function isDev(): bool {
        // می‌توانید این مقدار را با یک ثابت در wp-config.php یا محیط داکر هماهنگ کنید
        if (defined('VANTI_DEV') && VANTI_DEV === true) {
            return true;
        }

        // یک راه هوشمندانه: اگر در محیط لوکال یا دیباگ بودیم، فرض را بر توسعه می‌گذاریم
        return defined('WP_DEBUG') && WP_DEBUG === true;
    }

    /**
     * لود کردن استایل‌ها و اسکریپت‌ها بر اساس وضعیت پروژه
     */
    public static function load(string $entry): void {
        if (self::isDev()) {
            self::loadDevAsset($entry);
        } else {
            self::loadProdAsset($entry);
        }
    }

    /**
     * لود کردن فایل‌ها در حالت توسعه (اتصال مستقیم به سرور Vite)
     */
    private static function loadDevAsset(string $entry): void {
        // تزریق کلاینت اصلی Vite برای قابلیت HMR (تغییرات آنی بدون رفرش)
        add_action('wp_head', function() {
            echo '<script type="module" src="' . self::DEV_SERVER . '/@vite/client"></script>';
        }, 1);

        // لود کردن فایل درخواستی (مثلاً resources/js/app.js)
        $url = self::DEV_SERVER . '/' . $entry;

        if (str_ends_with($entry, '.css')) {
            wp_enqueue_style('vanti-' . sanitize_title($entry), $url, [], null);
        } else {
            wp_enqueue_script('vanti-' . sanitize_title($entry), $url, [], null, true);
            self::addModuleTag('vanti-' . sanitize_title($entry));
        }
    }

    /**
     * لود کردن فایل‌ها در حالت پروداکشن (خواندن از فایل manifest.json)
     */
    private static function loadProdAsset(string $entry): void {
        // مسیر فایل مانیفست ویت ۵ در پوشه dist
        $manifest_path = get_theme_file_path(self::DIST_DIR . '/.vite/manifest.json');

        if (!file_exists($manifest_path)) {
            return;
        }

        $manifest = json_decode(file_get_contents($manifest_path), true);

        if (!isset($manifest[$entry])) {
            return;
        }

        // پیدا کردن نام فایل کامپایل شده (که یک هش رندوم دارد)
        $file_info = $manifest[$entry];
        $file_url = get_theme_file_uri(self::DIST_DIR . '/' . $file_info['file']);

        if (str_ends_with($entry, '.css')) {
            wp_enqueue_style('vanti-' . sanitize_title($entry), $file_url, [], null);
        } else {
            wp_enqueue_script('vanti-' . sanitize_title($entry), $file_url, [], null, true);
            self::addModuleTag('vanti-' . sanitize_title($entry));

            // اگر فایل جاوااسکریپت همراه خود فایل CSS خروجی داشته باشد
            if (!empty($file_info['css'])) {
                foreach ($file_info['css'] as $css_file) {
                    $css_url = get_theme_file_uri(self::DIST_DIR . '/' . $css_file);
                    wp_enqueue_style('vanti-' . sanitize_title($css_file), $css_url, [], null);
                }
            }
        }
    }

    /**
     * اضافه کردن تگ type="module" به اسکریپت‌های ویت (حیاتی برای کارکرد وایت)
     */
    private static function addModuleTag(string $handle): void {
        add_filter('script_loader_tag', function($tag, $script_handle, $src) use ($handle) {
            if ($script_handle !== $handle) {
                return $tag;
            }
            return '<script type="module" src="' . esc_url($src) . '" id="' . esc_attr($handle) . '-js"></script>';
        }, 10, 3);
    }
}