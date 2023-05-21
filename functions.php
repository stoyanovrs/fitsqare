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


// Woocommerce
require_once get_theme_file_path( 'inc/woo.php' );