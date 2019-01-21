<?php
/*
  This is the template for the header
*/

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
$logo = esc_attr(get_option('navbar_logo'));
$slogan = esc_attr(get_option('slogan'));
?>
  <head>
    <title><?php bloginfo('name'); wp_title(); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>" >
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

  <div class="codesavages-sidebar sidebar-closed">
		<div class="codesavages-sidebar-container">

      <a class="js-toggleSidebar sidebar-close">
        <i class="fas fa-angle-double-right sidebar-icon"></i>
      </a>

      <div class="sidebar-scroll">
        
        <?php get_sidebar(); ?>
        
      </div>
    </div>
	</div>

  <div class="container-fluid">
		<div class="row">
      <div class="header-container background-image text-center" style="background-image: url(<?php checkHeaderImage(); ?>);">
        
        <a class="js-toggleSidebar sidebar-open">
          <i class="fas fa-bars sidebar-icon"></i>
        </a>

        <div class="header-content table">
          <div class="table-cell">
          
           <!--image for header here -->
            
            <h1 class="site-title">
              <?php bloginfo( 'name' ); ?>
            </h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
          </div>
        </div>
        
        <div class="nav-container">
          <nav class="navbar navbar-expand-lg navbar-codesavages">
          <a class="navbar-brand" href="#">
            <img src="<?php print $logo ?>" width="80" height="30" class="d-inline-block align-top" alt="">
            <?php print $slogan ?>
          </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'theme-textdomain' ); ?>">
            <i class="fa fa-bars"></i>
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
                <div class="mini-cart">
                    <?php echo sk_wcmenucart(); ?>
                </div>

            </div>
          </nav>
        </div> <!-- nav-container -->    
      </div> <!-- header-container -->
		</div> <!-- row -->
	</div> <!-- container-fluid -->