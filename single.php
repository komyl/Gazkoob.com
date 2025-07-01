<?php
/**
 * نمایش تکی پست
 *
 * @package Gazkoob
 */

get_header();
?>

<div class="single-post">
    <?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/content', 'single');
    endwhile;
    ?>
</div>

<?php get_footer(); ?>