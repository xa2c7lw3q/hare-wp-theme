<?php
function hare_theme_enqueue_styles() {
	wp_enqueue_style( 'hare-theme-style', get_stylesheet_uri(), array(), '1.1' );
}
add_action( 'wp_enqueue_scripts', 'hare_theme_enqueue_styles' );
