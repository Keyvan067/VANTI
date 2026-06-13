<?php
/**
 * Header template
 *
 * @package VANTI
 */

use VANTI\View\View;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl" lang="fa" data-theme="light">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VANTI</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-base-100 text-foreground selection:bg-primary selection:text-white'); ?>>
<?php wp_body_open(); ?>
<div id="bg-overlay" class="fixed inset-0 bg-black/25 opacity-0 pointer-events-none airbnb-timing z-40"></div>

<header
        class="bg-base-100 border-b border-accent sticky top-0 w-full z-50 py-4 px-5 flex items-center justify-between"
        id="main-header"
>
    <?php View::render('components.header.logo'); ?>

    <?php View::render('components.header.search'); ?>

    <div class="w-xs flex flex-row items-center justify-end gap-3">

        <?php View::render('components.header.cart'); ?>

        <?php View::render('components.header.account'); ?>

        <!-- --><?php //View::render('components.header.mobile-trigger'); ?>

    </div>
</header>

<?php View::render('components.mega-menu.categories'); ?>