<?php

if(!is_active_sidebar('codesavages-sidebar')){
  return;
}

?>

<aside id="secondary" class="widget-area" role="complementary">

  <?php dynamic_sidebar('codesavages-sidebar'); ?>

</aside>