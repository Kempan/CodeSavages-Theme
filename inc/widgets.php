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


//---------Footer widgets ----------//

class Codesavages_Footer_Widget_Left extends WP_Widget{
    //setup the widget name, desc etc..
    public function __construct(){

        $widget_ops_left = array(
            'classname' => 'codesavages-footer-widget',
            'description' => 'Custom Codesavages Footer Widget'
        );
        parent::__construct('codesavages_footer_left', 'CodeSavages Footer Section 1', $widget_ops_left);
    }

    //back-end display of widget
    public function form($instance){
        echo '<p><strong>No options for this widget!</strong></p></br><p>You can controll the fields of this widget from <a href="./admin.php?page=codesavages_footer">This</a> page</p>';
    }

    //Front-end display of widget
    public function widget($args, $instance){
        $headerLeft = esc_attr(get_option('left_header'));
        $firstFirst = esc_attr(get_option('left_first'));
        $firstSecond = esc_attr(get_option('left_second'));
        $firstThird = esc_attr(get_option('left_third'));

        echo $args['before_widget'];
        ?>


            <h5 class="text-uppercase font-weight-bold"><?php echo $headerLeft ?></h5>
            <p><?php echo $firstFirst ?></p>
            <p><?php echo $firstSecond ?></p>
            <p><?php echo $firstThird ?></p>


        <?php
        echo $args['after_widget'];
    }


}
add_action('widgets_init', function(){
    register_widget('Codesavages_Footer_Widget_left');
});

class Codesavages_Footer_Widget_Right extends WP_Widget{
    //setup the widget name, desc etc..
    public function __construct(){

        $widget_ops_right = array(
            'classname' => 'codesavages-footer-widget',
            'description' => 'Custom Codesavages Footer Widget'
        );
        parent::__construct('codesavages_footer_right', 'CodeSavages Footer Section 3', $widget_ops_right);
    }

    //back-end display of widget
    public function form($instance){
        echo '<p><strong>No options for this widget!</strong></p></br><p>You can controll the fields of this widget from <a href="./admin.php?page=codesavages_footer">This</a> page</p>';
    }

    //Front-end display of widget
    public function widget($args, $instance){
        $headerRight = esc_attr(get_option('right_header'));
        $secondFirst = esc_attr(get_option('right_first'));
        $secondSecond = esc_attr(get_option('right_second'));
        $secondThird = esc_attr(get_option('right_third'));

        echo $args['before_widget'];
        ?>

        <h5 class="text-uppercase font-weight-bold"><?php echo $headerRight ?></h5>
        <p><?php echo $secondFirst ?></p>
        <p><?php echo $secondSecond ?></p>
        <p><?php echo $secondThird ?></p>

        <?php
        echo $args['after_widget'];
    }


}
add_action('widgets_init', function(){
    register_widget('Codesavages_Footer_Widget_Right');
});

class Codesavages_Footer_Widget_Mid extends WP_Widget{
    //setup the widget name, desc etc..
    public function __construct(){

        $widget_ops_mid = array(
            'classname' => 'codesavages-footer-widget',
            'description' => 'Custom Codesavages Footer Widget'
        );
        parent::__construct('codesavages_footer_mid', 'CodeSavages Footer Section 2', $widget_ops_mid);
    }

    //back-end display of widget
    public function form($instance){
        echo '<p><strong>No options for this widget!</strong></p></br><p>You can controll the fields of this widget from <a href="./admin.php?page=codesavages_footer">This</a> page</p>';
    }

    //Front-end display of widget
    public function widget($args, $instance){
        $midHeader = esc_attr(get_option('mid_header'));
        $midFirst = esc_attr(get_option('mid_first'));
        $midSecond = esc_attr(get_option('mid_second'));
        $midThird = esc_attr(get_option('mid_third'));

        echo $args['before_widget'];
        ?>


        <h5 class="text-uppercase font-weight-bold"><?php echo $midHeader ?></h5>
        <p><?php echo $midFirst ?></p>
        <p><?php echo $midSecond ?></p>
        <p><?php echo $midThird ?></p>


        <?php
        echo $args['after_widget'];
    }


}
add_action('widgets_init', function(){
    register_widget('Codesavages_Footer_Widget_Mid');
});