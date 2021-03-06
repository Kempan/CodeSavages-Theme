<?php

/*	

	========================
		ENQUEUE FILE
	========================
	
*/

//HOOK DECIDES WICH PAGE TO ADD CSS
function codesavages_load_admin_scripts($hook){
  // echo $hook;
  // if('toplevel_page_codesavages' != $hook){
  //   return;
  // }
  wp_register_style('codesavages_admin', get_template_directory_uri() . '/css/codesavages.admin.css', array(), '1.0.0', 'all');
  wp_register_style('minicolors', get_template_directory_uri() . '/css/jquery.minicolors.css', array(), '2.3.4', 'all');
  wp_enqueue_style('codesavages_admin');
  wp_enqueue_style('minicolors');



  wp_enqueue_media();

  wp_register_script('codesavages-admin-script', get_template_directory_uri() . '/js/codesavages.admin.js', array('jquery'), '1.0.0', true);
  wp_register_script('minicolors', get_template_directory_uri() . '/js/jquery.minicolors.min.js', false, '2.3.4', true );

  wp_enqueue_script('minicolors');
  wp_enqueue_script('codesavages-admin-script');

  if('codesavages_page_codesavages_css' == $hook){
    wp_enqueue_style('ace', get_template_directory_uri() . '/css/codesavages.ace.css', array(), '1.0.0', 'all');
    wp_enqueue_script('ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('codesavages-custom-css-script', get_template_directory_uri() . '/js/codesavages.custom_css.js', array('jquery'), '1.0.0', true);
  }
}
add_action('admin_enqueue_scripts', 'codesavages_load_admin_scripts');


function codesavages_theme_setup(){
  add_theme_support('menus');
  register_nav_menu('primary', 'Primary Header Navigation');
  register_nav_menu('secondary', 'Footer Navigation');
}
add_action('init', 'codesavages_theme_setup');

// FRONT-END ENQUEUE FUNCTIONS

function codesavages_load_scripts(){
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap-css/bootstrap.min.css', array(), '4.1.3', 'all');
  wp_enqueue_style('codesavages', get_template_directory_uri() . '/css/codesavages.css', array(), '1.0.0', 'all');
  wp_enqueue_style('codesavages-woocommerce', get_template_directory_uri() . '/css/codesavages-woocommerce.css', array(), '1.0.0', 'all');


  wp_deregister_script('jquery');

  wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js', false, '3.3.1', true );
  wp_register_script('fontawesome', get_template_directory_uri() . '/js/fontawesome-all.min.js', false, '5.6.3', true );

  wp_enqueue_script('jquery');
  wp_enqueue_script('fontawesome');
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap-js/bootstrap.min.js', array('jquery'), '4.1.3', true);
  wp_enqueue_script('codesavages', get_template_directory_uri() . '/js/codesavages.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'codesavages_load_scripts');

