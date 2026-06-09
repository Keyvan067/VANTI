<?php

namespace VANTI\Providers;

use VANTI\Core\ServiceProvider;
use VANTI\Core\Vite;

class AssetsProvider extends ServiceProvider
{

    /**
     * ثبت خدمات در سنترال کانتینر (اجباری به خاطر کلاس ServiceProvider)
     */
    public function register(): void
    {
    }

    /**
     * اجرای هوک‌های مربوط به پیکربندی استایل‌ها و اسکریپت‌ها
     */
    public function boot(): void
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueFrontendAssets']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminAssets']);
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