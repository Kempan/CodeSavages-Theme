<?php get_header(); ?>


<div id="primary" class="content-area">
  <main id="main" class="site-main">
     
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-10 offset-sm-1 offset-md-1 offset-lg-1">
          <?php
            if( have_posts()):

              while( have_posts()): the_post();

                get_template_part('template-parts/single', get_post_format());
                the_post_navigation();

                if(comments_open()):
                  comments_template();
                endif;

              endwhile;

            endif;
          ?>
        </div>
      </div>
    </div>
  </main>
</div>

<?php get_footer(); ?>