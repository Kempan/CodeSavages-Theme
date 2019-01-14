<?php
/*
  ---------- Audio Post Format ----------
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('codesavages-format-audio'); ?>>

  <header class="entry-header text-center">

    <?php the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>'); ?>
    <div class="entry-meta">
      <?php echo codesavages_posted_meta(); ?>
    </div>

  </header>

  <div class="entry-content">

    <?php
      echo codesavages_get_embedded_media(array('audio', 'iframe'));
    ?>

  </div>

  <footer class="entry-footer">
    <?php echo codesavages_posted_footer(); ?>
  </footer>

</article>