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



//------------Remove functions--------------
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );

function woo_remove_category_products_count() {
    return;
}

function wcs_woo_remove_reviews_tab($tabs) {
    unset($tabs['reviews']);
    return $tabs;
}



//------------Cart function-------------
function sk_wcmenucart($menu, $args) {

    //check if woocommerce is activated
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {



        global $woocommerce;
        $viewing_cart = __('View your shopping cart', 'your-theme-slug');
        $start_shopping = __('Start shopping', 'your-theme-slug');
        $cart_url = $woocommerce->cart->get_cart_url();
        $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
        $cart_contents_count = $woocommerce->cart->cart_contents_count;
        //$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'your-theme-slug'), $cart_contents_count);
        $cart_total = $woocommerce->cart->get_cart_total();

        if ( $cart_contents_count > 0 ) {
            if ($cart_contents_count == 0) {
                $menu_item = '<li class="nav-item"><a class="wcmenucart-contents" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
            } else {
                $menu_item = '<li class="nav-item"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
            }

            $menu_item .= $cart_contents_count;
            $menu_item .= '<i class="fa fa-shopping-cart"></i> ';
            $menu_item .= ' / '. $cart_total;
            $menu_item .= '</a></li>';

        }

        return $menu_item;
    }
}