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
    <?php
    // Inline Critical CSS for faster rendering
    $critical_css = "
        .header{position:fixed;top:0;right:0;left:0;width:100%;padding:20px 40px;display:flex;justify-content:space-between;align-items:center;z-index:1000;background-color:rgba(17,17,17,.8);backdrop-filter:blur(5px)}.logo{font-size:24px;font-weight:700}.logo a,.nav ul li a{color:#fff;text-decoration:none}.nav ul{display:flex;list-style:none}.nav ul li{margin-right:30px}.nav ul li a{font-size:16px}.banner{height:100vh;display:flex;align-items:center;justify-content:center;background:linear-gradient(45deg,#1a1a1a,#000);position:relative;overflow:hidden}.banner-content{text-align:center;z-index:2;padding:20px}.animated-text{font-size:65px;font-weight:800;color:#fff;margin-bottom:20px;animation:fadeIn 1s ease-in-out}.highlight{color:#e74c3c}.banner-text{font-size:18px;color:#ddd;margin-bottom:30px;animation:fadeIn 1s ease-in-out .3s both}@media (max-width:768px){.animated-text{font-size:32px}}@media (max-width:576px){.animated-text{font-size:24px;line-height:1.4}}
    ";
    echo '<style>' . preg_replace('/\s+/', ' ', trim($critical_css)) . '</style>';

    // Asynchronously load the main stylesheet
    echo '<link rel="stylesheet" id="gazkoob-style-css" href="' . get_template_directory_uri() . '/assets/css/main.css?ver=' . GAZKOOB_VERSION . '" media="print" onload="this.media=\'all\'">';
    echo '<noscript><link rel="stylesheet" href="' . get_template_directory_uri() . '/assets/css/main.css?ver=' . GAZKOOB_VERSION . '"></noscript>';
    
    wp_head();
    ?>
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
        <p class="banner-text">مجموعه کاور و سرامیک خودرو گازکوب،<span class="mobile-break"><br></span> ارائه دهنده خدمات حرفه‌ای با بهترین کیفیت</p>
        
        <a id="typing-phone" class="banner-phone" href="tel:05132100000"></a>

        <div class="banner-buttons">
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn">تماس با ما</a>
            <button class="btn consultation-button">مشاوره تخصصی رایگان</button>
        </div>
    </div>
</section>
<?php endif; ?>