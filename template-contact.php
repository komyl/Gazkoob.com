<?php
/**
 * Template Name: صفحه تماس با ما
 *
 * @package Gazkoob
 */

get_header();
?>

<div class="contact-page-wrapper">
    <div class="contact-header">
        <h1>تماس با ما</h1>
        <p>ما همیشه برای ارائه مشاوره و پاسخ به سوالات شما آماده‌ایم.</p>
    </div>

    <div class="contact-content-area">
        <div class="contact-details">
            <h3>اطلاعات تماس</h3>
            <div class="info-item">
                <span class="info-icon">📍</span>
                <p><?php echo get_theme_mod('gazkoob_address', 'آدرس: خراسان رضوی، مشهد، اندیشه 75، مجموعه گازکوب'); ?></p>
            </div>
            <div class="info-item">
                <span class="info-icon">📱</span>
                <a href="tel:<?php echo preg_replace('/[^0-9]/', '', get_theme_mod('gazkoob_phone', '09154300200')); ?>">
                    <?php echo get_theme_mod('gazkoob_phone', '09154300200'); ?> (همراه)
                </a>
            </div>
             <div class="info-item">
                <span class="info-icon">📞</span>
                <a href="tel:05132100000">
                    05132100000 (ثابت)
                </a>
            </div>
            <div class="info-item">
                <span class="info-icon">✉️</span>
                <a href="mailto:<?php echo get_theme_mod('gazkoob_email', 'info@gazkoob.com'); ?>">
                    <?php echo get_theme_mod('gazkoob_email', 'info@gazkoob.com'); ?>
                </a>
            </div>
        </div>

        <div class="maps-section">
            <div class="map-container">
                <h4>موقعیت ما در گوگل مپ</h4>
                <div class="map-iframe-wrapper">
                    <iframe class="lazy-map" title="نقشه گوگل موقعیت مجموعه گازکوب" data-src="https://storage.googleapis.com/maps-solutions-(Your_APi_Key)/locator-plus/eb7g/locator-plus.html" width="100%" height="100%" style="border:0;" loading="lazy"></iframe>
                </div>
            </div>
            <div class="map-container">
                <h4>موقعیت ما در نقشه نشان</h4>
                <div class="map-iframe-wrapper">
                    <iframe class="lazy-map" title="نقشه نشان موقعیت مجموعه گازکوب" data-src="https://nshn.ir/_(Your_APi_Key)?iframe=true" width="100%" height="100%" style="border:0;" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>