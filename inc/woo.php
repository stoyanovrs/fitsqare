<?php
/**
 * woocomerce add theme functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fitsquare
 * @since 1.0.0
 */
function fitsquare_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    // Re-enable the Customizer
    add_action( 'customize_register', '__return_true' );
    // Remove Woocommerce Style
    //add_filter( 'woocommerce_enqueue_styles', '__return_false' );

    // Change add to cart text on single product page
    add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single' ); 
    function woocommerce_add_to_cart_button_text_single() {
        return __( 'Add to Cart Button Text', 'woocommerce' ); 
    }

    // Change add to cart text on product archives page
    add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_archives' );  
    function woocommerce_add_to_cart_button_text_archives() {
        return __( 'Add to Cart Button Text', 'woocommerce' );
    }

    // Remove specific (or all) of the product tabs
    add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

    function woo_remove_product_tabs( $tabs ) {

      // unset( $tabs['description'] );      	// Remove the description tab
      unset( $tabs['reviews'] ); 			// Remove the reviews tab
      unset( $tabs['additional_information'] );  	// Remove the additional information tab

      return $tabs;

  }
}

add_action( 'after_setup_theme', 'fitsquare_add_woocommerce_support' );

// hide coupon form everywhere
function hide_coupon_field( $enabled ) {

	if ( is_cart() || is_checkout() ) {
		$enabled = false;
	}
	
	return $enabled;
}
add_filter( 'woocommerce_coupons_enabled', 'hide_coupon_field' );