<?php

// Add default page body class to the head.
// add_filter( 'body_class', 'genesis_sample_add_body_class' );
// function genesis_sample_add_body_class( $classes ) {
//     $classes[] = 'product-page';
//     return $classes;
// }


add_action('genesis_entry_content', 'gs_custom_product_fields');
function gs_custom_product_fields() {
  if(get_field('price')){
    echo '<div class="product-details">';
    echo '<h3><span>More Details: ' . get_field('long_description_of_product_here') . '</span></h3>';
    echo '<p><span>Price: $' . get_field('price'). '</span></p>';
    echo '</div>';
  }
}




// Run the Genesis loop.
genesis();
