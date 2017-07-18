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
    echo '<button  class="showSingle" target="1"><span>' . get_field('tab_name') . '</span></button>';
    echo '<button class="showSingle" target="2"><span>' . get_field('tab_name_copy') . '</span></button>';

      echo '<div id="div1" class="targetDiv">';
      echo '<h3><span>More Details: ' . get_field('long_description_of_product_here') . '</span></h3>';
      echo '<p><span>Price: $' . get_field('price'). '</span></p>';
      echo '</div>';


    echo '<div id="div2" class="targetDiv">';
    echo '<h3><span>More Details2: ' . get_field('another_text_field') . '</span></h3>';
    echo '</div>';

  }
}




// Run the Genesis loop.
genesis();
