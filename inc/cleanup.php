<?php

/* Remove version string from js css */
function codesavages_revmove_wp_version_strings($src){
  global $wp_version;
  parse_str(parse_url($src, PHP_URL_QUERY), $query);
  if(!empty($query['ver']) && $query['ver'] === $wp_version){
    $src = remove_query_arg('ver', $src);
  }
  return $src;
}
add_filter('script_loader_src', 'codesavages_revmove_wp_version_strings');
add_filter('style_loader_src', 'codesavages_revmove_wp_version_strings');

/* Remove metatag from generator from header */
function codesavages_remove_meta_version(){
  return '';
}
add_filter('the_generator', 'codesavages_remove_meta_version');