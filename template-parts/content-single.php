<?php
/**
 * قسمت محتوای پست برای نمایش تکی
 *
 * @package Gazkoob
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post-content'); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        
        <div class="entry-meta">
            <span class="posted-on">تاریخ: <?php echo get_the_date(); ?></span>
            <span class="cat-links">دسته‌بندی: <?php the_category(', '); ?></span>
        </div>
    </header>
    
    <div class="featured-image">
        <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('full'); ?>
        <?php endif; ?>
    </div>
    
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    
    <footer class="entry-footer">
        <?php if(has_tag()): ?>
            <div class="tags-links">برچسب‌ها: <?php the_tags('', ', ', ''); ?></div>
        <?php endif; ?>
    </footer>
    
    <div class="post-consultation-form">
    <div class="consultation-icon">💬</div>
    <h4>نیاز به مشاوره تخصصی دارید؟</h4>
    <p>کارشناسان ما آماده ارائه مشاوره تخصصی رایگان به شما هستند</p>
    <form method="post" action="" class="animated-form">
        <div class="form-group">
            <div class="input-icon">
                <i class="icon-phone">📱</i>
                <input type="text" name="phone" placeholder="شماره تماس" required>
            </div>
        </div>
        <div class="form-group">
            <div class="input-icon">
                <i class="icon-car">🚗</i>
                <input type="text" name="car_model" placeholder="مدل خودرو" required>
            </div>
        </div>
        <button type="submit" name="gazkoob_consultation_submit" class="btn-submit">
            <span> ارسال </span>
            <i class="icon-send">➤</i>
        </button>
    </form>
</div>
</article>