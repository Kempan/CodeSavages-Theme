<?php
/*

@package codesavagetheme
---Custom woocommerce functions---

*/

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
echo '<section id="main">';
    }

    function my_theme_wrapper_end() {
    echo '</section>';
}
add_theme_support('woocommerce');



//Remove functions
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );


function woo_remove_category_products_count() {
    return;
}

