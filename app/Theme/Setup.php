<?php

namespace VANTI\Theme;

use VANTI\Core\Logger;

class Setup
{
    public function init(): void
    {
        $this->addThemeSupports();
        $this->registerMenus();
//        $this->elementorCompatibility();
    }

    /**
     * فعال‌سازی ویژگی‌های استاندارد، ووکامرس و المنتور
     */
    protected function addThemeSupports(): void
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);

        // ۱. فعال‌سازی رسمی پشتیبانی از ووکامرس
        add_theme_support('woocommerce');

        // فعال‌سازی ویژگی‌های گالری پیشرفته ووکامرس
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        add_theme_support('custom-logo');
        add_theme_support('automatic-feed-links');
        add_theme_support('customize-selective-refresh-widgets');


        //if (WP_DEBUG) {
        //Logger::log('WooCommerce Theme Supports Activated.');
        //}
    }

    protected function registerMenus(): void
    {
        register_nav_menus([
            'primary_menu' => __('منوی اصلی (هدر)', 'vanti'),
            'footer_menu' => __('منوی فوتر', 'vanti'),
        ]);
    }

    /**
     * ۲. هماهنگی‌ها و پپکربندی‌های اختصاصی برای صفحه ساز المنتور
     */
//    protected function elementorCompatibility(): void
//    {
//        // معرفی عرض پیش‌فرض کانتینر قالب به المنتور (اختیاری اما حرفه‌ای)
//        update_option('elementor_container_width', '1280');
//
//        // اضافه کردن پپکربندی‌های بیشتر المنتور در صورت نیاز
//        Logger::log('Elementor Theme Integration Initialized.');
//    }
}