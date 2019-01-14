<?php get_header();

// $class = get_query_var('post-class'); -- Hämtar global var

?>


<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <?php if(is_paged()) : ?>

      <div class="button-container text-center container-load-prev">
        <button type="button" class="btn btn-outline-light codesavages-load-button" data-prev="1" data-page="<?php echo codesavages_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
          <span class="text">Load Previous</span>
          <i class="fas fa-spinner loader"></i>
        </button>
      </div>

    <?php endif; ?>
    
    <div class="container codesavages-posts-container">
      <?php
        if( have_posts()):

          echo '<div class="page-limit" data-page="/'.codesavages_check_paged().'">';

          while( have_posts()): the_post();
            // $class = 'reveal';
            // set_query_var('post-class', $class); -- Sätter var ovan till global
            get_template_part('template-parts/content', get_post_format());
          endwhile;

          echo '</div>';

        endif;
      ?>
    </div>

    <div class="button-container text-center">
      <button type="button" class="btn btn-outline-light codesavages-load-button" data-page="<?php echo codesavages_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
        <span class="text">Load more</span>
        <i class="fas fa-spinner loader"></i>
      </button>
    </div>

  </main>
</div>

<?php get_footer(); ?>