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

  <?php codesavages_get_post_navigation(); ?>

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

  <?php codesavages_get_post_navigation(); ?>

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

  <?php

    $fields =  array(
      
      'author'  =>
      '<div class="form-group"><label for="author">' . __('Name', 'domainreference') . '</label><span class="required">*</span>
      <input id="author" name="author" type="text" class="form-control" value="' . esc_attr($commenter['comment_author']) . '" required="required"/></div>',
      
      'email'   =>
      '<div class="form-group"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> <span class="required">*</span>
      <input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div>',

      'uri'     =>
      '<div class="form-group last-field"><label for="url">' . __( 'Website', 'domainreference' ) . '</label><input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>'
    );

    $args = array(
      'class_submit'    => 'btn btn-block btn-outline-dark',
      'label_submit'    => __('Submit Comment'),
      'comment_field'   => '<div class="form-group"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <span class="required">*</span><textarea id="comment" class="form-control" name="comment" rows="4" required="required"></textarea></p>',
      'fields'          => apply_filters('comment_form_default_fields', $fields)
    );
    comment_form($args);

  ?>

</div>