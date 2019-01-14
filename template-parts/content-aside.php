<?php
/*
  ---------- Aside Post Format ----------
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('codesavages-format-aside'); ?>>

  <div class="aside-container">

    <div class="row">

      <div class="col-xs-12 col-sm-3 col-md-2 text-center">
        <?php if(codesavages_get_attachment()): ?>
            <div class="aside-featured background-image" style="background-image: url(<?php echo codesavages_get_attachment(); ?>);"></div>
        <?php endif ?>
      </div>

      <div class="col-xs-12 col-sm-9 col-md-10">

        <header class="entry-header">

          <div class="entry-meta">
            <?php echo codesavages_posted_meta(); ?>
          </div>

        </header>

        <div class="entry-content">

          <div class="entry-excerpt">
            <?php the_content(); ?>
          </div>

        </div>
      
      </div>

    </div>

  </div>

  <footer class="entry-footer">
    <div class="row">
      <div class="col-sm-10 offset-sm-2 offset-md-2">
        <?php echo codesavages_posted_footer(); ?>
      </div>
    </div>
  </footer>

</article>