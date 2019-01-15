<?php
/*

@package codesavagetheme
---Gallery Post Format

*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('codesavages-format-gallery'); ?>>
    <header class="entry-header text-center">

        <?php if (codesavages_get_attachment()):
            $attachments = codesavages_get_attachment(6);
            ?>
            <div id="post-gallery-<?php the_ID();?>" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner" role="listbox">
                    <?php

                    $attachments = codesavage_get_bs_slides(codesavages_get_attachment(6));
                    foreach($attachments as $attachment):
                        ?>

                        <div class="carousel-item <?php echo $attachment['class'] ?>">
                            <img src="<?php echo $attachment['url']; ?>">
                            <div class="entry-excerpt image-caption">
                                <p><?php  echo $attachment['caption'] ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <a class="carousel-control carousel-control-prev" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">

                    <div class="preview-container">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </div>
                </a>
                <a class="carousel-control carousel-control-next" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">

                    <div class="preview-container">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </div>
                </a>
            </div>
        <?php endif ?>

        <?php the_title('<h1 class="entry-title"><a href="' .esc_url(get_permalink()). '" rel="bookmark">', '</h1></a>') ?>

        <div class="entry-meta">
            <?php echo codesavages_posted_meta(); ?>
        </div>

    </header>

    <div class="entry-content">
        <div class="entry-excerpt text-center">
            <?php the_excerpt(); ?>

        </div>

        <div class="button-container text-center">
            <a href="<?php the_permalink(); ?>" class="btn btn-outline-secondary btn-codesavage"><?php _e('Read More') ?></a>
        </div>

    </div>

    <footer class="entry-footer">
        <?php echo codesavages_posted_footer(); ?>
    </footer>
</article>
