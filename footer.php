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
             <iframe class="lazy-map" title="نقشه گوگل موقعیت مجموعه گازکوب در فوتر" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3212.519856358085!2d59.51986227500854!3d36.372407372372095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f6c8c542f0fac19%3A0x5b9430192d9417b5!2sDariush%20Car%20Wash!5e0!3m2!1sen!2sde!4v1751964685770!5m2!1sen!2sde" width="100%" height="100%" style="border:0;" loading="lazy"></iframe>
        </div>
        <div class="footer-map">
            <iframe class="lazy-map" title="نقشه نشان موقعیت مجموعه گازکوب در فوتر" data-src="https://neshan.org/maps/iframe/places/07c38e89c379137a305a82b83518d958#c36.372-59.525-16z-0p/36.3722511/59.52163990000001" width="100%" height="100%" style="border:0;" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
        </div>
    </div>

    <div class="site-credit">
        Designed & Developed by <a href="https://komyl.com" target="_blank" rel="noopener noreferrer">Komeyl Kalhorinia</a>
    </div>

    <div class="copyright">
        © <?php echo date('Y'); ?> تمام حقوق برای مجموعه گازکوب محفوظ است
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

