<?php

global $content;

use VANTI\View\View;

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php View::render('partials.header'); ?>

<main id="site-content">
    <?php echo $content; ?>
</main>

<?php View::render('partials.footer'); ?>

<?php wp_footer(); ?>

</body>
</html>