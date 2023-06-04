<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fitsquare
 * @since 1.0.0
 */

/**
 * Add theme support.
 */
function fit_square_setup() {
	add_theme_support( 'align-wide' );

  add_theme_support( 'wp-block-styles' );

  add_theme_support( 'editor-styles' );

  add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'fit_square_setup' );

function fit_square_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/inc/js/app.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'fit_square_scripts' );

// Woocommerce
require_once get_theme_file_path( 'inc/woo.php' );