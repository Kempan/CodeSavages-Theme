<?php
/*
  ---------- Single Post Template ----------
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('codesavages-format-standard'); ?>>

  <header class="entry-header text-center">

    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

    <div class="entry-meta">
      <?php echo codesavages_posted_meta(); ?>
    </div>

  </header>

  <div class="entry-content clearfix">

    <?php the_content(); ?>

  </div>

  <footer class="entry-footer">
    <?php echo codesavages_posted_footer(); ?>
  </footer>

</article>