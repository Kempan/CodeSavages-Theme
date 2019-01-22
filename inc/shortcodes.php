<?php

/*

Codesavages shortcodes

*/

// Contact form shortcode

function codesavages_contact_form($atts, $content = null){

    //[contact_form]

    //get the attributes
    $atts = shortcode_atts(
        array(),
        $atts,
        'contact_form'
    );

    //return HTML
    ob_start();
    include 'templates/contact-form.php';
    return ob_get_clean();

}
add_shortcode('contact_form', 'codesavages_contact_form');    