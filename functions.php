<?php
/**
 * Gazkoob functions and definitions
 *
 * @package Gazkoob
 */

define('GAZKOOB_VERSION', '1.2'); // Stable Version Revert

function gazkoob_setup() {
    load_theme_textdomain('gazkoob', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => esc_html__('منوی اصلی', 'gazkoob'),
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'gazkoob_setup');

function gazkoob_scripts() {
    // Re-enable the standard and reliable way of loading the main stylesheet.
    wp_enqueue_style('gazkoob-style', get_template_directory_uri() . '/assets/css/main.css', array(), GAZKOOB_VERSION);
    
    // Dequeue and re-register a modern version of jQuery
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', false, '3.6.0');
    wp_enqueue_script('jquery');

    // Enqueue theme scripts
    wp_enqueue_script('gazkoob-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), GAZKOOB_VERSION, true);
    wp_enqueue_script('gazkoob-popup', get_template_directory_uri() . '/assets/js/popup.js', array('jquery'), GAZKOOB_VERSION, true);
    
    // Localize script to pass AJAX URL and nonces to our JS files
    wp_localize_script('gazkoob-scripts', 'gazkoob_ajax', array(
        'ajax_url'           => admin_url('admin-ajax.php'),
        'load_more_nonce'    => wp_create_nonce('gazkoob-load-more'),
        'consultation_nonce' => wp_create_nonce('gazkoob-consultation-nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'gazkoob_scripts');

function gazkoob_defer_scripts( $tag, $handle, $src ) {
    // Defer all theme scripts and jQuery for better performance
    $defer_scripts = array('jquery-core', 'jquery', 'gazkoob-scripts', 'gazkoob-popup');
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . esc_url( $src ) . '" defer type="text/javascript"></script>' . "\n";
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'gazkoob_defer_scripts', 10, 3 );

/**
 * Disable WordPress emoji scripts for performance.
 */
function gazkoob_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'gazkoob_disable_emojis');

function gazkoob_load_more_posts() {
    check_ajax_referer('gazkoob-load-more', 'nonce');
    
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 9,
        'paged'          => $paged,
    );
    
    $query = new WP_Query($args);
    
    if($query->have_posts()) {
        while($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content');
        }
    }
    
    wp_reset_postdata();
    
    die();
}
add_action('wp_ajax_gazkoob_load_more_posts', 'gazkoob_load_more_posts');
add_action('wp_ajax_nopriv_gazkoob_load_more_posts', 'gazkoob_load_more_posts');


function gazkoob_consultation_ajax_handler() {
    check_ajax_referer('gazkoob-consultation-nonce', 'nonce');
    
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $car_model = isset($_POST['car_model']) ? sanitize_text_field($_POST['car_model']) : '';
    
    if(empty($phone) || empty($car_model)) {
        wp_send_json_error(array('message' => 'لطفاً تمام فیلدها را تکمیل کنید.'));
        return;
    }
    
    $post_id = wp_insert_post(array(
        'post_title'    => 'درخواست مشاوره - ' . $phone,
        'post_type'     => 'consultation',
        'post_status'   => 'publish',
    ));
    
    if (is_wp_error($post_id)) {
        wp_send_json_error(array('message' => 'خطایی در ثبت اطلاعات رخ داد.'));
        return;
    }
    
    update_post_meta($post_id, 'phone', $phone);
    update_post_meta($post_id, 'car_model', $car_model);
    update_post_meta($post_id, 'date', current_time('mysql'));
    
    wp_send_json_success(array('message' => 'درخواست شما با موفقیت ثبت شد.'));
}
add_action('wp_ajax_gazkoob_submit_consultation', 'gazkoob_consultation_ajax_handler');
add_action('wp_ajax_nopriv_gazkoob_submit_consultation', 'gazkoob_consultation_ajax_handler');


function gazkoob_menu_item_class($classes, $item) {
    $classes[] = 'nav-item';
    return $classes;
}
add_filter('nav_menu_css_class', 'gazkoob_menu_item_class', 10, 2);

function gazkoob_menu_link_attrs($atts, $item, $args) {
    $atts['class'] = 'nav-link';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'gazkoob_menu_link_attrs', 10, 3);


function gazkoob_register_consultation_post_type() {
    register_post_type('consultation', array(
        'labels' => array(
            'name' => 'درخواست‌های مشاوره',
            'singular_name' => 'درخواست مشاوره',
            'add_new' => 'افزودن',
            'add_new_item' => 'افزودن درخواست مشاوره جدید',
            'edit_item' => 'ویرایش درخواست مشاوره',
            'view_item' => 'مشاهده درخواست مشاوره',
            'search_items' => 'جستجوی درخواست‌های مشاوره',
            'not_found' => 'درخواست مشاوره‌ای یافت نشد',
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => 'do_not_allow',
        ),
        'map_meta_cap' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-phone',
        'supports' => array('title'),
    ));
}
add_action('init', 'gazkoob_register_consultation_post_type');


function gazkoob_consultation_columns($columns) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'عنوان',
        'phone' => 'شماره تماس',
        'car_model' => 'مدل خودرو',
        'date' => 'تاریخ ثبت',
    );
    return $columns;
}
add_filter('manage_consultation_posts_columns', 'gazkoob_consultation_columns');

function gazkoob_consultation_column_content($column, $post_id) {
    switch($column) {
        case 'phone':
            echo get_post_meta($post_id, 'phone', true);
            break;
        case 'car_model':
            echo get_post_meta($post_id, 'car_model', true);
            break;
        case 'date':
            echo get_post_meta($post_id, 'date', true);
            break;
    }
}
add_action('manage_consultation_posts_custom_column', 'gazkoob_consultation_column_content', 10, 2);


function gazkoob_remove_add_new_button() {
    global $typenow;
    if ($typenow === 'consultation') {
        ?>
        <style type="text/css">
            .page-title-action {
                display: none;
            }
        </style>
        <?php
    }
}
add_action('admin_head', 'gazkoob_remove_add_new_button');


function gazkoob_add_export_button() {
    $screen = get_current_screen();
    if ($screen && $screen->id == 'edit-consultation') {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.wp-header-end').before('<a href="<?php echo admin_url('admin.php?page=export_consultations'); ?>" class="page-title-action">دریافت خروجی اکسل</a>');
            });
        </script>
        <?php
    }
}
add_action('admin_head', 'gazkoob_add_export_button');


function gazkoob_register_export_page() {
    add_submenu_page(
        null,
        'خروجی اکسل درخواست‌ها',
        'خروجی اکسل',
        'manage_options',
        'export_consultations',
        'gazkoob_export_consultations'
    );
}
add_action('admin_menu', 'gazkoob_register_export_page');

function gazkoob_convert_to_jalali($date) {
    if (empty($date)) return '';
    
    try {
        $g_date = new DateTime($date, new DateTimeZone('UTC'));
        $g_date->setTimezone(new DateTimeZone('Asia/Tehran'));
        $formatter = new IntlDateFormatter(
            'fa_IR@calendar=persian',
            IntlDateFormatter::FULL,
            IntlDateFormatter::FULL,
            'Asia/Tehran',
            IntlDateFormatter::TRADITIONAL,
            'yyyy/MM/dd HH:mm'
        );
        return $formatter->format($g_date);
    } catch (Exception $e) {
        return $date;
    }
}

function gazkoob_export_consultations() {
    if (!current_user_can('manage_options')) {
        wp_die('شما اجازه دسترسی به این صفحه را ندارید.');
    }
    
    $filename = 'consultations-' . date('Y-m-d') . '.xls';
    
    header('Content-Type: application/vnd.ms-excel; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    header('Pragma: public');
    
    echo "\xEF\xBB\xBF";
    echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head><body>';
    echo '<table border="1">';
    echo '<tr style="background:#4472C4; color:white; font-weight:bold; text-align:center;">';
    echo '<td>شناسه</td><td>تاریخ ثبت</td><td>شماره تماس</td><td>مدل خودرو</td>';
    echo '</tr>';
    
    $args = array(
        'post_type' => 'consultation',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    $consultations = get_posts($args);
    
    foreach ($consultations as $consultation) {
        $phone = get_post_meta($consultation->ID, 'phone', true);
        $car_model = get_post_meta($consultation->ID, 'car_model', true);
        $date = get_post_meta($consultation->ID, 'date', true);
        
        echo '<tr>';
        echo '<td style="text-align:center;">' . $consultation->ID . '</td>';
        echo '<td style="text-align:center;mso-number-format:\@;">' . (function_exists('gazkoob_convert_to_jalali') ? gazkoob_convert_to_jalali($date) : $date) . '</td>';
        echo '<td style="text-align:center;mso-number-format:\@;">' . $phone . '</td>';
        echo '<td style="text-align:center;">' . $car_model . '</td>';
        echo '</tr>';
    }
    
    echo '</table></body></html>';
    exit;
}