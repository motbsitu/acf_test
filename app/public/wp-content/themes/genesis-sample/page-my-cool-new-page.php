<?php
/**
 * Genesis Sample.
 *
 * This file adds the product template to the Genesis Sample Theme.
 *
 * Template Name: Product
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */
// Add default page body class to the head.
add_filter( 'body_class', 'genesis_sample_add_body_class' );
function genesis_sample_add_body_class( $classes ) {
    $classes[] = 'product-page';
    return $classes;
}
add_action( 'genesis_entry_content', 'gs_test_content' );
function gs_test_content() {
  echo 'hello';
  }



// Run the Genesis loop.
genesis();
