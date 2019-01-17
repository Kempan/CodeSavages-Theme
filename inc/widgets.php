<?php

/*	
	========================
		WIDGET CLASS
	========================
*/

class Codesavages_Profile_Widget extends WP_Widget{
  
  //setup the widget name, desc etc..
  public function __construct(){

    $widget_ops = array(
      'classname' => 'codesavages-profile-widget',
      'description' => 'Custom Codesavages Profile Widget'
    );
    parent::__construct('codesavages_profile', 'CodeSavages Profile', $widget_ops);

  }

  //back-end display of widget
  public function form($instance){
    echo '<p><strong>No options for this Widget!</strong><br>You can controll the fields of this Widget from <a href="admin.php?page=codesavages">This Page</a></p>';
  }

  //front-end display of widget
  public function widget($args, $instance){

    $picture = esc_attr(get_option('profile_picture'));
    $companyName = esc_attr(get_option('company_name'));
    $description = esc_attr(get_option('description'));

    $twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
    $facebook_icon = esc_attr( get_option( 'facebook_handler' ) );
    $instagram_icon = esc_attr( get_option( 'instagram_handler' ) );
  
    echo $args['before_widget'];
    ?>

    <div class="codesavages-image-container">
      <div id="replace-profile-picture" class="codesavages-profile-picture" style="background-image: url(<?php print $picture ?>)"></div>
    </div>

    <div class="text-center">

      <h1 class="codesavages-username"><?php print $companyName; ?></h1>
      <h2 class="codesavages-description"><?php print $description; ?></h2>

      <div class="codesavages-icons-wrapper">

        <?php if( empty( $twitter_icon ) ): ?>
          <a href="https://twitter.com/"><i class="fab fa-twitter sidebar-icon"></i></a>
        <?php endif; 
        if( empty( $instagram_icon ) ): ?>
          <a href="https://instagram.com/"><i class="fab fa-instagram sidebar-icon"></i></a>
        <?php endif; 
        if( empty( $facebook_icon ) ): ?>
          <a href="https://facebook.com/"><i class="fab fa-facebook sidebar-icon"></i></a>
        <?php endif; ?>

      </div>
      
    </div>

    <?php
    echo $args['after_widget'];

  }
}
add_action('widgets_init', function(){
  register_widget('Codesavages_Profile_Widget');
});