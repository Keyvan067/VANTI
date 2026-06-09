<?php
/**
 * Main template file
 *
 * @package VANTI
 */

//get_header();
get_template_part('templates/header');
?>

    <main class="vanti-main">
        <div class="container">
<!--            --><?php
//            if (have_posts()) {
//                while (have_posts()) {
//                    the_post();
//                    ?>
<!--                    <article class="vanti-post">-->
<!--                        <h2>--><?php //the_title(); ?><!--</h2>-->
<!--                        <div class="vanti-post-content">-->
<!--                            --><?php //the_content(); ?>
<!--                        </div>-->
<!--                    </article>-->
<!--                    --><?php
//                }
//            } else {
//                ?>
<!--                <p>-->
<!--                    --><?php //esc_html_e('No posts found.', 'vanti'); ?><!--</p>-->
<!--            --><?php //} ?>
        </div>
    </main>

<?php
get_template_part('templates/footer');
