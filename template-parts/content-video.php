<?php
/*
  ---------- Video Post Format ----------
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('codesavages-format-video'); ?>>

  <header class="entry-header text-center">

    <div class="entry-video">
      <?php echo codesavages_get_embedded_media(array('video', 'iframe')); ?>
    </div>

    <?php the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>'); ?>
    <div class="entry-meta">
      <?php echo codesavages_posted_meta(); ?>
    </div>

  </header>

  <div class="entry-excerpt text-center">
    <?php the_excerpt(); ?>
  </div>

  <footer class="entry-footer">
    <?php echo codesavages_posted_footer(); ?>
  </footer>

</article>