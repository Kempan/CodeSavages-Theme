<?php

if(post_password_required()){
  return;
}

?>

<div id="comments" class="comments-area">

  <?php
    if(have_comments()):
  ?>
  
  <?php
    endif;
  ?>
  <?php comment_form(); ?>

</div>