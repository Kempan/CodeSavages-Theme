<?php

/*	

	========================
    AJAX FUNCTIONS
	========================
	
*/

// Access for Admin and logged in users
add_action('wp_ajax_codesavages_load_more', 'codesavages_load_more');

add_action('wp_ajax_codesavages_save_user_contact_form', 'codesavages_save_contact');

// Access for eveyone
add_action('wp_ajax_nopriv_codesavages_load_more', 'codesavages_load_more');

add_action('wp_ajax_nopriv_codesavages_save_user_contact_form', 'codesavages_save_contact');

function codesavages_load_more(){

  $paged = $_POST["page"] + 1;
  $prev = $_POST["prev"];
  $archive = $_POST["archive"];
  
  if($prev == 1 && $_POST["page"] != 1){
    $paged = $_POST["page"] - 1;
  }

  $args = array(
    'post_type=' => 'post',
    'post_status' => 'publish',
    'paged' => $paged
  );

  if( $archive != '0' ){
		
		$archVal = explode( '/', $archive );
		$flipped = array_flip($archVal);
		
		switch( isset( $flipped ) ) {
			
			case $flipped["category"] :
				$type = "category_name";
				$key = "category";
				break;
				
			case $flipped["tag"] :
				$type = "tag";
				$key = $type;
				break;
				
			case $flipped["author"] :
				$type = "author";
				$key = $type;
				break;
			
		}
		
		$currKey = array_keys( $archVal, $key );
		$nextKey = $currKey[0]+1;
		$value = $archVal[ $nextKey ];
			
		$args[ $type ] = $value;
		
		//check page trail and remove "page" value
		if( isset( $flipped['page'] ) ){
			
			$pageVal = explode( 'page', $archive );
			$page_trail = $pageVal[0];
			
		} else {
			$page_trail = $archive;
		}
		
	} else {
		$page_trail = '/';
	}


  $query = new WP_Query($args);

  if( $query->have_posts()):
    echo '<div class="page-limit" data-page="' .$page_trail. 'page/' .$paged. '">';
      while( $query->have_posts()): $query->the_post();
        get_template_part('template-parts/content', get_post_format());
      endwhile;
    echo '</div>';
  else:
    echo 0;
  endif;

  wp_reset_postdata();

  die();

}

function codesavages_check_paged($num = null){
  $output = '';
  if(is_paged()){
    $output = 'page/' . get_query_var('paged');
  }
  if($num == 1){
    $paged = (get_query_var('paged') == 0 ? 1 : get_query_var('paged'));
    return $paged;
  } else {
    return $output;
  }
}

//function for the contact form
function codesavages_save_contact(){
  $name = wp_strip_all_tags($_POST['name']);
  $email = wp_strip_all_tags($_POST['email']);
  $message = wp_strip_all_tag($_POST['message']);


  wp_insert_post();

  die();
}