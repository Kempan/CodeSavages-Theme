<?php

/*	

	========================
		ADMIN PAGE FUNCTIONS
	========================
	
*/


//ALLT CONTANT SOM SKRIVS UT FRÅN TEMPLATES
//SKAPAR CODESAVAGES MENY OCH SUBS
function codesavages_add_admin_page(){
  add_menu_page('Codesavages Theme Options','Codesavages','manage_options','codesavages','codesavages_sidebar_page','',110);

  add_submenu_page('codesavages','Codesavages Sidebar Options','Sidebar','manage_options','codesavages','codesavages_sidebar_page');
  add_submenu_page('codesavages','Codesavages Theme Options','Theme Options','manage_options','codesavages_theme','codesavages_theme_options_page');
  add_submenu_page('codesavages','Codesavages Contact Options','Contact Options','manage_options','codesavages_contact','codesavages_contact_page');
  add_submenu_page('codesavages','Codesavages CSS Options','Custom CSS','manage_options','codesavages_css','codesavages_css_settings_page');

  add_action('admin_init', 'codesavages_custom_settings');
}
add_action('admin_menu', 'codesavages_add_admin_page');

//SUBS INNEHÅLL PÅ CODESAVAGES MENY
function codesavages_custom_settings(){

  //<------------------SIDEBAR ------------------>
  //SKAPAR TITEL OCH CALLBACK PARAGRAF
  add_settings_section('codesavages-sidebar-options','Sidebar Options','codesavages_sidebar_options','codesavages');
  //PARAGRAF
  function codesavages_sidebar_options(){
    echo 'Customize your sidebar information';
  }
  //SKAPAR INFOFÄLTEN MED CALLBACK NEDAN. KALLAS PÅ I CODESAVAGES-ADMIN.PHP
  add_settings_field('sidebar-profile-picture','Profile picture:','codesavages_sidebar_profile_picture','codesavages','codesavages-sidebar-options');
  add_settings_field('sidebar-name','Full Name:','codesavages_sidebar_name','codesavages','codesavages-sidebar-options');
  add_settings_field('sidebar-description','Description:','codesavages_sidebar_description','codesavages','codesavages-sidebar-options');
  add_Settings_field('sidebar-twitter', 'Twitter handler:','codesavages_sidebar_twitter','codesavages','codesavages-sidebar-options' );
  add_Settings_field('sidebar-facebook', 'Facebook handler:','codesavages_sidebar_facebook','codesavages','codesavages-sidebar-options' );
  add_Settings_field('sidebar-instagram', 'Instagram handler:','codesavages_sidebar_instagram','codesavages','codesavages-sidebar-options' );
  //CALLBACK
  function codesavages_sidebar_profile_picture(){
    $picture = esc_attr(get_option('profile_picture'));
    if(empty($picture)){
      echo '<input type="button" class="button button-secondary" value="Upload profile picture" id="upload-button" />
      <input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" />';
    } else {
      echo '<input type="button" class="button button-secondary" value="Replace profile picture" id="upload-button" />
      <input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /><input type="button" 
      class="button button-secondary" value="Remove" id="remove-picture"';
    }
  }
  function codesavages_sidebar_name(){
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /><input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
  }
  function codesavages_sidebar_description(){
    $description = esc_attr(get_option('description'));
    echo '<input type="text" name="description" value="'.$description.'" placeholder="Description" />';
  }
  function codesavages_sidebar_twitter(){
    $twitter = esc_attr(get_option('twitter_handler'));
    echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the "@" character.</p>';
  }
  function codesavages_sidebar_facebook(){
    $facebook = esc_attr(get_option('facebook_handler'));
    echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
  }
  function codesavages_sidebar_instagram(){
    $instagram = esc_attr(get_option('instagram_handler'));
    echo '<input type="text" name="instagram_handler" value="'.$instagram.'" placeholder="Instagram handler" />';
  }
  //SPARAR NER INFOFÄLTENS VAL
  register_setting('codesavages-settings-group','profile_picture');
  register_setting('codesavages-settings-group','first_name');
  register_setting('codesavages-settings-group','last_name');
  register_setting('codesavages-settings-group','description');
  register_setting('codesavages-settings-group','twitter_handler', 'codesavages_sanitize_twitter_handler');
  register_setting('codesavages-settings-group','facebook_handler');
  register_setting('codesavages-settings-group','instagram_handler');
  


  //<-------------- THEME OPTIONS ------------------>
  //SKAPAR TITEL OCH CALLBACK PARAGRAF I THEME OPTIONS
  add_settings_section('codesavages-theme-options', 'Theme Options', 'codesavages_theme_options', 'codesavages_theme');
  //PARAGRAF
  function codesavages_theme_options(){
    echo 'Activate and Deactivate specific Theme Support Options';
  }
  
  //SKAPAR POSTFORMATS TITEL OCH ALLA CHECKBOX MED CALLBACK NEDAN
  register_setting('codesavages-theme-support', 'post_formats');
  add_settings_field('post-formats', 'Post Formats', 'codesavages_post_formats', 'codesavages_theme', 'codesavages-theme-options');
  function codesavages_post_formats(){
    $options = get_option('post_formats');
    $formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
    $output = '';
    foreach($formats as $format){
      $checked = (@$options[$format] == 1 ? 'checked' : '');
      $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
    }
    echo $output;
  }
  
  
  //SKAPAR POSTFORMATS TITEL OCH CHECKBOX MED CALLBACK NEDAN
  register_setting('codesavages-theme-support', 'custom_background');
  add_settings_field('custom-header', 'Custom Headers', 'codesavages_custom_header', 'codesavages_theme', 'codesavages-theme-options');
  function codesavages_custom_header(){
    $options = get_option('custom_header');
    $checked = (@$options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' />Activate The Custom Header</label>';
  }
  register_setting('codesavages-theme-support', 'custom_header');
  
  //SKAPAR CUSTOM BACKGROUND TITEL CHECKBOX MED CALLBACK NEDAN
  add_settings_field('custom-background', 'Custom Backgrounds', 'codesavages_custom_background', 'codesavages_theme', 'codesavages-theme-options');
  function codesavages_custom_background(){
    $options = get_option('custom_background');
    $checked = (@$options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' />Activate The Custom Background</label>';
  }
  



  //<-------------- CONTACT OPTIONS ------------------>
  //SKAPAR TITEL OCH CALLBACK PARAGRAF I CONTACT OPTIONS
  register_setting('codesavages-contact-options', 'activate_contact_form');
  add_settings_section('codesavages-contact-section','Contact Form' , 'codesavages_contact_section', 'codesavages_contact_page');

  function codesavages_contact_section(){
    echo 'Activate and Deactivate the Build in Contact Form';
  }
  add_settings_field('activate-form', 'Activate Contact Form:', 'codesavages_activate_contact', 'codesavages_contact_page', 'codesavages-contact-section');
  function codesavages_activate_contact(){
    $options = get_option('activate_contact_form');
    $checked = (@$options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="activate_contact_form" name="activate_contact_form" value="1" '.$checked.' /></label>';
  }
  

  //<-------------- CUSTOM CSS OPTIONS ------------------>
  //SKAPAR TITEL OCH CALLBACK PARAGRAF I CONTACT OPTIONS
  register_setting('codesavages-custom-css-options', 'codesavages_css', 'codesavages_sanitize_custom_css');
  add_settings_section('codesavages-custom-css-section', 'Custom CSS', 'codesavages_custom_css_section_callback', 'codesavages_css');
  function codesavages_custom_css_section_callback(){
    echo 'Customize CodeSavages Theme with your own CSS';
  }
  add_settings_field('custom-css', 'Insert your Custom CSS', 'codesavages_custom_css_callback', 'codesavages_css', 'codesavages-custom-css-section');
  function codesavages_custom_css_callback(){
    $css = get_option('codesavages_css');
    $css = empty($css) ? '/* CodeSavages Theme Custom Css */' : $css;
    echo '<div id="customCss">'.$css.'</div><textarea id="codesavages_css" name="codesavages_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
  }
}
//SANITIZATION OPTIONS
function codesavages_sanitize_twitter_handler($input){
  $output = sanitize_text_field($input);
  $output = str_replace('@', '', $output);
  return $output;
}
function codesavages_sanitize_custom_css($input){
  $output = esc_textarea($input);
  return $output;
}

//SIDEBAR TEMPLATE
function codesavages_sidebar_page(){
  require_once(get_template_directory() . '/inc/templates/codesavages-sidebar.php');
}

//THEME OPTIONS TEMPLATE
function codesavages_theme_options_page(){
  require_once(get_template_directory() . '/inc/templates/codesavages-theme-options.php');
}

//CONTACT FORM TEMPLATE
function codesavages_contact_page(){
  require_once(get_template_directory() . '/inc/templates/codesavages-contact.php');
}

//CUSTOM CSS
function codesavages_css_settings_page(){
  require_once(get_template_directory() . '/inc/templates/codesavages-custom-css.php');
}