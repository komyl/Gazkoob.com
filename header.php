<?php
/**
* هدر سایت
*
* @package Gazkoob
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
    <div class="logo">
        <a href="<?php echo esc_url(home_url('/')); ?>">گازکوب</a>
    </div>
    <nav class="nav">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => '',
            'fallback_cb'    => false,
            'items_wrap'     => '<ul>%3$s</ul>',
        ));
        ?>
    </nav>
</header>

<?php if(is_front_page()) : ?>
<section class="banner" id="home">
    <div class="animated-bg" id="animatedBg"></div>
    <div class="banner-content">
        <h1 class="animated-text">گازکوب | <span class="highlight">کاور و سرامیک خودرو</span></h1>
        
        <p class="banner-text">
            ارائه دهنده خدمات تخصصی سرامیک،<span class="mobile-break"><br></span> کاور و صافکاری PDR در <span class="highlight">مشهد</span>
        </p>
        
        <div class="banner-phone-container">
            <a id="typing-phone-mobile" class="banner-phone-static" href="tel:09154300200"></a>
            <a id="typing-phone-landline" class="banner-phone" href="tel:05132100000"></a>
        </div>

        <div class="banner-buttons">
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn">تماس با ما</a>
            <button class="btn consultation-button">مشاوره تخصصی رایگان</button>
        </div>
    </div>
</section>
<?php endif; ?>