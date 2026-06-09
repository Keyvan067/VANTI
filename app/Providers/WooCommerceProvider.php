<?php

namespace VANTI\Providers;

use VANTI\Core\ServiceProvider;

class WooCommerceProvider extends ServiceProvider
{
    public function register(): void
    {
        // ردیف کردن کانتینرها در صورت نیاز
    }

    public function boot(): void
    {
        // اگر ووکامرس نصب و فعال نبود، کدهای زیر اجرا نشوند تا خطایی رخ ندهد
        if (!class_exists('WooCommerce')) {
            return;
        }

        // شخصی‌سازی هوک‌های ووکامرس (مثال: تغییر ساختار روت صفحات محصول)
        remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
        add_action('woocommerce_before_main_content', [$this, 'openWooCommerceWrapper'], 10);

        remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
        add_action('woocommerce_after_main_content', [$this, 'closeWooCommerceWrapper'], 10);
    }

    /**
     * باز کردن کانتینر با استایل‌های فوق‌العاده شیک و مدرن Franken UI
     */
    public function openWooCommerceWrapper(): void
    {
        echo '<main class="container mx-auto px-4 py-8 bg-background text-foreground min-h-screen">';
        echo '<div class="uk-card uk-card-body bg-card text-card-foreground rounded-xl border shadow-sm">';
    }

    /**
     * بستن کانتینرها
     */
    public function closeWooCommerceWrapper(): void
    {
        echo '</div>';
        echo '</main>';
    }
}