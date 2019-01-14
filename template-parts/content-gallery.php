<?php
/*
  ---------- Gallery Post Format ----------
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('codesavages-format-gallery'); ?>>
	<header class="entry-header text-center">
    
		<?php if( codesavages_get_attachment() ): 
			$attachments = codesavages_get_attachment(7);
			// var_dump($attachments);
		?>
			
			<div id="post-gallery-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">
				
				<div class="carousel-inner" role="listbox">
					
					<?php 
						$i = 0;
						foreach( $attachments as $attachment ): 
						$active = ( $i == 0 ? ' active' : '' );
					?>
					
            <div class="carousel-item<?php echo $active; ?> carousel-item-container">
              <img class="gallery-picture" src="<?php echo wp_get_attachment_url( $attachment->ID ); ?>">
            </div>
					
					<?php $i++; endforeach; ?>
					
				</div>
				
				<a class="carousel-control-prev" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
					<span class="carousel-control carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
					<span class="carousel-control carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				
			</div>
			
		<?php endif; ?>

    <?php the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>'); ?>
    <div class="entry-meta">
      <?php echo codesavages_posted_meta(); ?>
    </div>

  </header>

  <div class="entry-content">

    <div class="entry-excerpt">
      <?php the_excerpt(); ?>
    </div>

  </div>

  <footer class="entry-footer">
    <?php echo codesavages_posted_footer(); ?>
  </footer>

</article>