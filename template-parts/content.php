<?php
/**
 * قسمت محتوای پست برای نمایش در گرید
 *
 * @package Gazkoob
 */
?>

<div class="portfolio-item">
    <a href="<?php the_permalink(); ?>">
        <?php if(has_post_thumbnail()): ?>
            <?php // Set alt attribute to empty to avoid redundancy for screen readers ?>
            <?php the_post_thumbnail('large', array('class' => 'portfolio-item-img', 'alt' => '')); ?>
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" alt="" class="portfolio-item-img">
        <?php endif; ?>
        <div class="portfolio-item-caption">
            <?php // Changed from h3 to h2 to fix heading order ?>
            <h2 class="portfolio-item-title"><?php the_title(); ?></h2>
        </div>
    </a>
</div>