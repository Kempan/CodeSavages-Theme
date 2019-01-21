<?php

if(post_password_required()){
  return;
}

?>

<div id="comments" class="comments-area">

  <?php
    if(have_comments()):
  ?>

  <h2 class="comment-title text-center">
    <?php
      printf(
        esc_html(_nx('One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'codesavagestheme')),
        number_format_i18n(get_comments_number()),
        '<span>' . get_the_title() . '</span>'
      );
    ?>
  </h2>

  <?php if(get_comment_pages_count() > 1 && get_option('page_comments')): ?>
      <nav id="comment-nav-top" class="comment-navigation" role="navigation">
        <div class="row">
          <div class="col-xs-12 col sm-6">
            <div class="post-link-nav">
              <i class="fas fa-arrow-left"></i>
              <?php previous_comments_link(esc_html__('Older Comments', 'codesavagestheme')) ?>
            </div>
          </div>
          <div class="col-xs-12 col sm-6">
            <div class="post-link-nav">
              <i class="fas fa-arrow-right"></i>
              <?php next_comments_link(esc_html__('Newer Comments', 'codesavagestheme')) ?>
            </div>
          </div>
        </div>
      </nav>
  <?php endif; ?>

  <ol class="comment-list">

    <?php 
      $args = array(
        'walker'            => null,
        'max_depth'         => '',
        'style'             => 'ol',
        'callback'          => null,
        'end-callback'      => null,
        'type'              => 'all',
        'reply-text'        => 'Reply',
        'page'              => '',
        'per_page'          => '',
        'avatar_size'       => 42,
        'reverse_top_level' => null,
        'reverse_children'  => null,
        'short_ping'        => false,
        'echo'              => true
      );
      wp_list_comments($args);

    ?>

  </ol>

  <?php if(get_comment_pages_count() > 1 && get_option('page_comments')): ?>
      <nav id="comment-nav-bottom" class="comment-navigation" role="navigation">
        <div class="row">
          <div class="col-xs-12 col sm-6">
            <div class="post-link-nav">
              <i class="fas fa-arrow-left"></i>
              <?php previous_comments_link(esc_html__('Older Comments', 'codesavagestheme')) ?>
            </div>
          </div>
          <div class="col-xs-12 col sm-6">
            <div class="post-link-nav">
              <i class="fas fa-arrow-right"></i>
              <?php next_comments_link(esc_html__('Newer Comments', 'codesavagestheme')) ?>
            </div>
          </div>
        </div>
      </nav>
  <?php endif; ?>

  <?php
    if(!comments_open() && get_comments_number()):
  ?>
    <p class="no-comments"><?php esc_html_e('Comments are closed.', 'codesavagestheme') ?></p>
  <?php
    endif;
  ?>

  <?php
    endif;
  ?>
  <?php comment_form(); ?>

</div>