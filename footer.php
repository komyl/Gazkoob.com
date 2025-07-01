<?php
/**
 * فوتر سایت
 *
 * @package Gazkoob
 */
?>

<footer class="footer" id="contact">
    <div class="footer-container">
        <div class="footer-contact">
            <h3>اطلاعات تماس</h3>
            <p class="contact-info"><?php echo get_theme_mod('gazkoob_address', 'آدرس:خراسان رضوی، مشهد، اندیشه 75، مجموعه گازکوب'); ?></p>
            <p class="contact-info">تلفن همراه: <a href="tel:<?php echo preg_replace('/[^0-9]/', '', get_theme_mod('gazkoob_phone', '09154300200')); ?>" style="color: inherit; text-decoration: none;"><?php echo get_theme_mod('gazkoob_phone', '09154300200'); ?></a></p>
            <p class="contact-info">تلفن ثابت: <a href="tel:05132100000" style="color: inherit; text-decoration: none;">05132100000</a></p>
            <p class="contact-info">ایمیل: <a href="mailto:<?php echo get_theme_mod('gazkoob_email', 'info@gazkoob.com'); ?>" style="color: inherit; text-decoration: none;"><?php echo get_theme_mod('gazkoob_email', 'info@gazkoob.com'); ?></a></p>
        </div>
    </div>
    
    <div class="footer-maps-container">
        <div class="footer-map">
             <iframe class="lazy-map" title="نقشه گوگل موقعیت مجموعه گازکوب در فوتر" data-src="https://storage.googleapis.com/maps-solutions-(Your_APi_Key)/locator-plus/eb7g/locator-plus.html" width="100%" height="100%" style="border:0;" loading="lazy"></iframe>
        </div>
        <div class="footer-map">
            <iframe class="lazy-map" title="نقشه نشان موقعیت مجموعه گازکوب در فوتر" data-src="https://nshn.ir/(Your_APi_Key)?iframe=true" width="100%" height="100%" style="border:0;" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
        </div>
    </div>

    <div class="copyright">
    © <?php echo date('Y'); ?> تمام حقوق برای مجموعه گازکوب محفوظ است
</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>