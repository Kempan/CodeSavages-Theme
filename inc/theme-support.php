<?php

/*
	========================
		THEME SUPPORT OPTIONS
	========================
*/


/*
  ---------- Post Formats ----------
*/
$options = get_option('post_formats');
$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$output = array();
foreach($formats as $format){
  $output[] = (@$options[$format] == 1 ? $format : '');
}
if(!empty($options)){
  add_theme_support('post-formats', $output);
}

/*
  ---------- Custom Header ----------
*/
$header = get_option('custom_header');
if(@$header == 1){
  add_theme_support('custom-header');
}

/*
  ---------- Custom Background ----------
*/
$background = get_option('custom_background');
if(@$background == 1){
  add_theme_support('custom-background');
}

/*
  ---------- Nav Menu ----------
*/
function codesavages_register_nav_menu(){
  register_nav_menu('primary', 'Header Navigation Menu');
}
add_action('after_setup_theme', 'codesavages_register_nav_menu');


/*
  ---------- Thumbnails ----------
*/
add_theme_support('post-thumbnails');


/*
  ---------- Bloggloop Custom Functions ----------
*/
function codesavages_posted_meta(){

  $posted_on = human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago';
  $categories = get_the_category();
  $seperator = ', ';
  $output = '';
  $i = 1;

  if(!empty($categories)):
    foreach($categories as $category):
      if($i>1):
        $output .= $seperator;
      endif;
      $output .= '<a href="' . get_category_link($category->term_id) . '" alt="' . esc_attr('View all post links', $category->name) . '">' . esc_html($category->name) . '</a>';
      $i++;
    endforeach;
  endif;
  return 'Posted: <a href="'. esc_url( get_permalink() ) .'">' . $posted_on . '</a> / <span class="posted-in">Category: ' . $output . '</span>';
}

function codesavages_get_attachment($num = 1){
	
	$output = '';
	if( has_post_thumbnail() && $num == 1 ): 
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	else:
		$attachments = get_posts( array( 
			'post_type' => 'attachment',
			'posts_per_page' => $num,
			'post_parent' => get_the_ID()
		) );
		if( $attachments && $num == 1 ):
			foreach ( $attachments as $attachment ):
				$output = wp_get_attachment_url( $attachment->ID );
			endforeach;
		elseif( $attachments && $num > 1 ):
			$output = $attachments;
		endif;
		
		wp_reset_postdata();
		
	endif;
	
	return $output;
}

function codesavages_get_embedded_media($type = array()){
  $content = do_shortcode(apply_filters('the_content', get_the_content()));
  $embed = get_media_embedded_in_content($content, $type);
  if(in_array('audio', $type)):
    $output = str_replace('?visual=true', '?visual=false', $embed[0]);
  else:
    $output = $embed[0];
  endif;
  return $output;
}

function codesavages_grab_link(){
  if(!preg_match('/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links )){
    return false;
  }
  return esc_url_raw($links[1]);
}

function codesavage_get_bs_slides($attachments){
    $output = array();
    $i = 0;
    foreach($attachments as $attachment):
        $active = ($i == 0 ? 'active' : '');
        $output[$i] = array(
            'class'     =>  $active,
            'url'       =>  wp_get_attachment_url($attachment->ID),
            'caption'   =>  $attachments[$i]->post_excerpt
        );
        $i++;
    endforeach;
    return $output;
}
/*
  ---------- Custom Footer ----------
*/
function codesavages_posted_footer(){

  $comments_num = get_comments_number();
  
  if(comments_open()){
    if($comments_num == 0){
      $comments = __('No comments');
    } else if($comments_num > 1){
      $comments = $comments_num . __('Comments');
    } else {
      $comments = __('1 Comment');
    }
    $comments = '<a href="'. get_comments_link() .'">'. $comments .'</a>';
  } else {
    $comments = __('Comments are closed');
  }
  return '<div class="post-footer-container"><div class="row"><div class="col-xs-12 col-sm-6">'. get_the_tag_list('<div class="tags-list"><span class="sunset-icon sunset-tag"></span>Tags: ', ', ', '</div>') .'</div><div class="col-xs-12 col-sm-6 text-right">'. $comments .'</div></div></div>';
}