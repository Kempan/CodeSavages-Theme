<?php
/*
  ---------- Quote Post Format ----------
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('codesavages-format-quote'); ?>>

  <header class="entry-header text-center">

    <div class="row">
      <div class="col-sm-10 col-md-8 offset-sm-1 offset-md-2">
        <h1 class="quote-content"><?php echo get_the_content(); ?></h1>
        <?php the_title('<h2 class="quote-author">', '</h2>'); ?>
      </div>
    </div>

  </header>



  <footer class="entry-footer">
    <?php echo codesavages_posted_footer(); ?>
  </footer>

</article>