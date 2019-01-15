<?php get_header();
/*
@package codesavage

*/

?>


    <div id="primary" class="content-area">
        <main id="main" class="site-main">


            <div class="container codesavages-posts-container">
                <?php
                if( have_posts()):


                    while( have_posts()): the_post();

                        get_template_part('template-parts/content', 'page');
                    endwhile;

                endif;
                ?>
            </div>


        </main>
    </div>

<?php get_footer(); ?>