<?php

// Saving theme version for stylesheet updates
$theme_version = wp_get_theme()->version;

// Enqueueing scripts and styles
wp_enqueue_script( 'date_ajax_script', get_template_directory_uri() . '/js/date.js', array('jquery'), $theme_version, true );
wp_enqueue_style('yourTheme-css', get_template_directory_uri() . '/style.css', null, $theme_version, true );

// Localized admin-ajax.php - Better to use nounce for security
wp_localize_script( 'date_ajax_script', 'date_ajax_url', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

// Hook to display time via ajax
add_action( 'wp_ajax_get_time', 'get_time' );
add_action( 'wp_ajax_nopriv_get_time', 'get_time' );

// Get time Weekday, Month Day Year
function get_time() {
    $format = 'l, F j Y';
    echo date_i18n( $format, current_time( 'timestamp' ) );
    die();
}

?>
