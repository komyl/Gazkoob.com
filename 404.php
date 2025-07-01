<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Gazkoob
 */

get_header();
?>

<section class="error-404-section">
    <div class="animated-bg" id="animatedBg"></div>
    <div class="error-404-content">
        <h1 class="error-404-title">404</h1>
        <h2 class="error-404-subtitle">صفحه مورد نظر یافت نشد</h2>
        <p class="error-404-text">متاسفانه صفحه‌ای که به دنبال آن بودید وجود ندارد. می‌توانید به صفحه اصلی بازگردید یا با ما تماس بگیرید.</p>
        
        <div class="error-404-contact-info">
            <a href="tel:+989154300200" class="contact-link">
                <span class="contact-icon">📞</span>
                <span>تماس با شماره 09154300200</span>
            </a>
            <a href="mailto:info@gazkoob.com" class="contact-link">
                <span class="contact-icon">✉️</span>
                <span>ارسال ایمیل به info@gazkoob.com</span>
            </a>
        </div>

        <div class="error-404-actions">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn">بازگشت به صفحه اصلی</a>
            <?php // The "View Contact Page" button has been removed. ?>
        </div>
    </div>
</section>

<?php
// We need to re-trigger the particle script for this page
?>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        function createParticlesFor404() {
            const bg = document.getElementById('animatedBg');
            if (!bg) return;
            
            while (bg.firstChild) {
                bg.removeChild(bg.firstChild);
            }

            const particleCount = 80;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                const size = Math.random() * 6 + 1;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                particle.style.left = `${posX}%`;
                particle.style.top = `${posY}%`;
                
                const delay = Math.random() * 5;
                particle.style.animationDelay = `${delay}s`;
                
                bg.appendChild(particle);
            }
        }
        createParticlesFor404();
    });
</script>

<?php
get_footer();
?>