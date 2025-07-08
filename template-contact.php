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
                    <iframe class="lazy-map" title="نقشه گوگل موقعیت مجموعه گازکوب" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3212.519856358085!2d59.51986227500854!3d36.372407372372095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f6c8c542f0fac19%3A0x5b9430192d9417b5!2sDariush%20Car%20Wash!5e0!3m2!1sen!2sde!4v1751964685770!5m2!1sen!2sde" width="100%" height="100%" style="border:0;" loading="lazy"></iframe>
                </div>
            </div>
            <div class="map-container">
                <h4>موقعیت ما در نقشه نشان</h4>
                <div class="map-iframe-wrapper">
                    <iframe class="lazy-map" title="نقشه نشان موقعیت مجموعه گازکوب" data-src="https://neshan.org/maps/iframe/places/07c38e89c379137a305a82b83518d958#c36.372-59.525-16z-0p/36.3722511/59.52163990000001" width="100%" height="100%" style="border:0;" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>