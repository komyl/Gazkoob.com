<?php
/**
 * صفحه اصلی قالب
 *
 * @package Gazkoob
 */

get_header();
?>


<section class="portfolio" id="portfolio">
    <div class="portfolio-grid">
        <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 9,
            'paged'          => 1,
        );
        
        $query = new WP_Query($args);
        
        if($query->have_posts()) :
            while($query->have_posts()) :
                $query->the_post();
                get_template_part('template-parts/content');
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p class="no-posts">هنوز پستی منتشر نشده است!</p>';
        endif;
        ?>
    </div>
    
    <?php if($query->max_num_pages > 1) : ?>
        <button class="load-more" id="load-more" data-page="2" data-max="<?php echo $query->max_num_pages; ?>">نمایش بیشتر</button>
    <?php endif; ?>
</section>

<?php
get_footer();