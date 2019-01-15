<?php

/*
  This is the template for the header
*/

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>
    <title><?php bloginfo('name'); wp_title(); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>" >
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->
    <link rel="profile" href="http://gmpg.org/xfn/11">

      <?php if(is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
      <?php endif; ?>
      
    <?php wp_head(); ?>
  </head>

  <!-- <?php
    if(is_front_page()):
      $awsome_classes = array('awesome-class', 'my-class');
    else:
      $awsome_classes = array('no-awesome-class');
    endif;
  ?> -->

<body <?php body_class(); ?>>

  <div class="container-fluid">
		<div class="row">
      <div class="header-container background-image text-center" style="background-image: url(<?php header_image(); ?>);">
        
        <div class="header-content table">
          <div class="table-cell">
          
            <img class="profil-container background-image" src="https://scontent-dus1-1.xx.fbcdn.net/v/t1.0-9/22788716_10155875205433556_1237395042326519438_n.jpg?_nc_cat=107&_nc_ht=scontent-dus1-1.xx&oh=cd0917e178e424fc38d998098a6cd1d3&oe=5CD24408">
            
            <h1 class="site-title">
              <?php bloginfo( 'name' ); ?>
            </h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
          </div>
        </div>
        
        <div class="nav-container">
        <nav class="navbar navbar-expand-lg navbar-codesavages">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'theme-textdomain' ); ?>">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbar-content">
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary', // Defined when registering the menu
                                'menu_id'        => 'primary-menu',
                                'container'      => false,
                                'depth'          => 2,
                                'menu_class'     => 'navbar-nav ml-auto',
                                'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
                                'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
                            ) );
                            ?>
                        </div>
                    </nav>
        </div>
        
      </div>
		</div>
	</div>