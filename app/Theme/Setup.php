<?php

namespace VANTI\Theme;

class Setup
{
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'setup']);
    }

    public function setup(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Theme Supports
        |--------------------------------------------------------------------------
        */

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]);

        /*
        |--------------------------------------------------------------------------
        | WooCommerce
        |--------------------------------------------------------------------------
        */

        add_theme_support('woocommerce');

        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        /*
        |--------------------------------------------------------------------------
        | Translation
        |--------------------------------------------------------------------------
        */

        load_theme_textdomain(
            'vanti',
            VANTI_PATH . '/languages'
        );
    }
}