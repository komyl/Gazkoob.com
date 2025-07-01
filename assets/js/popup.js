(function($) {
    'use strict';
    
    $(document).ready(function() {
       
        // Show popup only once per session
        if (!sessionStorage.getItem('gazkoobPopupShown')) {
            setTimeout(function() {
                showPopup();
                // Set a flag in session storage so it doesn't show again
                sessionStorage.setItem('gazkoobPopupShown', 'true');
            }, 3000);
        }
        
        // Open popup when consultation button is clicked
        $(document).on('click', '.consultation-button', function() {
            showPopup();
        });
        
        // Close popup with the close button
        $(document).on('click', '.popup-close', function() {
            closePopup();
        });
        
        // Close popup by clicking on the overlay
        $(document).on('click', '.popup-overlay', function(e) {
            if ($(e.target).hasClass('popup-overlay')) {
                closePopup();
            }
        });
        
        // The old success message logic via cookie is now removed.
    });
    
    function showPopup() {
        if (!$('.popup-overlay').length) {
            $('body').append(`
                <div class="popup-overlay">
                    <div class="popup-container">
                        <div class="popup-header">
                            <div class="popup-logo">گازکوب</div>
                            <div class="popup-close">&times;</div>
                        </div>
                        <div class="popup-content">
                            <h3>مشاوره تخصصی رایگان</h3>
                            <p>برای دریافت مشاوره، فرم زیر را تکمیل کنید:</p>
                            <div class="popup-form">
                                <form method="post" action="">
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
                                    <button type="submit" class="btn-submit">
                                        <span> ارسال </span>
                                        <i class="icon-send">➤</i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            `);
            
            // Animate the popup appearance
            $('.popup-container').css('transform', 'scale(0.7)');
            setTimeout(function() {
                $('.popup-container').css({
                    'transform': 'scale(1)',
                    'transition': 'all 0.3s ease-in-out'
                });
            }, 10);
        }
    }
    
    function closePopup() {
        $('.popup-container').css({
            'transform': 'scale(0.7)',
            'opacity': '0',
            'transition': 'all 0.3s ease-in-out'
        });
        setTimeout(function() {
            // We remove the popup from DOM to reset its state for next opening
            $('.popup-overlay').remove();
        }, 300);
    }

    // The getCookie and showSuccessMessage functions are no longer needed here.
    
})(jQuery);