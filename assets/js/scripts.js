/**
 * Main scripts for Gazkoob Theme
 */
(function($) {
    'use strict';
    
    // Creates the animated particle background
    function createParticles() {
        const bg = document.getElementById('animatedBg');
        if (!bg) return;
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
    
    // Adds a 'scrolled' class to the header on scroll
    function headerScroll() {
        const header = $('.header');
        $(window).scroll(function() {
            if ($(window).scrollTop() > 100) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }
        });
    }
    
    // Handles the "Load More" functionality for posts via AJAX
    function loadMorePosts() {
        const loadMoreBtn = $('#load-more');
        loadMoreBtn.on('click', function() {
            const button = $(this);
            const currentPage = button.data('page');
            const maxPages = button.data('max');
            $.ajax({
                url: gazkoob_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'gazkoob_load_more_posts',
                    nonce: gazkoob_ajax.load_more_nonce,
                    page: currentPage
                },
                beforeSend: function() {
                    button.text('در حال بارگذاری...');
                },
                success: function(response) {
                    if (response) {
                        $('.portfolio-grid').append(response);
                        button.text('نمایش بیشتر');
                        if (currentPage >= maxPages) {
                            button.hide();
                        } else {
                            button.data('page', currentPage + 1);
                        }
                    } else {
                        button.hide();
                    }
                }
            });
        });
    }

    // Handles AJAX submission for all consultation forms
    function handleConsultationForms() {
        $(document).on('submit', '.popup-form form, .post-consultation-form form', function(e) {
            e.preventDefault(); 
            const form = $(this);
            const button = form.find('.btn-submit');
            const originalButtonText = button.html();
            
            let successContainer;
            if (form.closest('.popup-container').length > 0) {
                successContainer = form.closest('.popup-content');
            } else {
                successContainer = form.closest('.post-consultation-form');
            }

            $.ajax({
                url: gazkoob_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'gazkoob_submit_consultation',
                    nonce: gazkoob_ajax.consultation_nonce,
                    phone: form.find('input[name="phone"]').val(),
                    car_model: form.find('input[name="car_model"]').val()
                },
                beforeSend: function() {
                    button.html('<span>در حال ارسال...</span>').prop('disabled', true);
                },
                success: function(response) {
                    if (response.success) {
                        const successHtml = `
                            <div class="form-success-message">
                                <div class="success-icon">✓</div>
                                <h4>درخواست شما ثبت شد!</h4>
                                <p>کارشناسان ما در اسرع وقت با شما تماس خواهند گرفت.</p>
                            </div>`;
                        successContainer.html(successHtml);
                    } else {
                        alert(response.data.message || 'خطایی رخ داد. لطفاً دوباره تلاش کنید.');
                        button.html(originalButtonText).prop('disabled', false);
                    }
                },
                error: function() {
                    alert('خطای سرور. لطفاً بعداً تلاش کنید.');
                    button.html(originalButtonText).prop('disabled', false);
                }
            });
        });
    }

    // Reusable Typing Animation Function
    function typeWriter(element, text, speed) {
        let i = 0;
        element.innerHTML = '<span class="blinking-cursor">|</span>';

        const typingInterval = setInterval(() => {
            if (i < text.length) {
                element.innerHTML = text.substring(0, i + 1) + '<span class="blinking-cursor">|</span>';
                i++;
            } else {
                clearInterval(typingInterval);
                element.innerHTML = text; // Remove cursor at the end
            }
        }, speed);
    }

    // Initializes the typing animations for phone numbers
    function initTypingAnimations() {
        const mobilePhoneEl = document.getElementById('typing-phone-mobile');
        const landlinePhoneEl = document.getElementById('typing-phone-landline');

        if (mobilePhoneEl && landlinePhoneEl) {
            const mobileNumber = '۰۹۱۵-۴۳۰۰-۲۰۰';
            const landlineNumber = '۰۵۱-۳۲۱-۰۰۰-۰۰';

            // Start typing both numbers simultaneously
            typeWriter(mobilePhoneEl, mobileNumber, 120);
            typeWriter(landlinePhoneEl, landlineNumber, 120);
        }
    }
    
    // Lazy loads map iframes when they enter the viewport
    function lazyLoadMaps() {
        const lazyMaps = Array.from(document.querySelectorAll('iframe.lazy-map'));
        if (lazyMaps.length === 0) return;

        if ('IntersectionObserver' in window) {
            const mapObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const map = entry.target;
                        map.src = map.dataset.src;
                        map.classList.remove('lazy-map');
                        observer.unobserve(map);
                    }
                });
            });
            lazyMaps.forEach(function(map) {
                mapObserver.observe(map);
            });
        } else { // Fallback for older browsers
            lazyMaps.forEach(function(map) {
                map.src = map.dataset.src;
            });
        }
    }

    // Run all initializations on page load
    $(document).ready(function() {
        createParticles();
        headerScroll();
        loadMorePosts();
        handleConsultationForms();
        lazyLoadMaps();
        
        // Start typing animation after a delay
        setTimeout(initTypingAnimations, 1500); 
    });
    
})(jQuery);