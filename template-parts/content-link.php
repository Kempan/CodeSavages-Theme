<?php
/*
  ---------- Link Post Format ----------
*/
?>

<?php
$linkPic = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="64" height="64"
viewBox="0 0 224 224"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,224v-224h224v224z" fill="none"></path><g fill="#ffffff"><g id="surface1"><path d="M152.25,28c-11.70312,0 -22.80468,4.62109 -31.0625,12.90625l-10.28125,10.28125c-8.28516,8.28516 -12.90625,19.35938 -12.90625,31.0625c0,5.55078 1.06641,10.96484 3.0625,15.96875l11.375,-11.375c-1.42187,-9.07812 1.33984,-18.83984 8.3125,-25.8125l10.28125,-10.28125c5.63282,-5.63281 13.26172,-8.75 21.21875,-8.75c7.95703,0 15.36719,3.11719 21,8.75c11.62109,11.62109 11.62109,30.59766 0,42.21875l-10.28125,10.28125c-5.63281,5.63282 -13.26172,8.75 -21.21875,8.75c-1.55859,0 -3.08984,-0.16406 -4.59375,-0.4375l-11.375,11.375c5.00391,1.99609 10.41797,3.0625 15.96875,3.0625c11.70313,0 22.80469,-4.62109 31.0625,-12.90625l10.28125,-10.28125c8.28516,-8.28516 12.90625,-19.35937 12.90625,-31.0625c0,-11.70312 -4.62109,-22.55859 -12.90625,-30.84375c-8.25781,-8.28516 -19.14062,-12.90625 -30.84375,-12.90625zM134.96875,78.96875l-56,56l10.0625,10.0625l56,-56zM82.25,98c-11.70312,0 -22.80468,4.62109 -31.0625,12.90625l-10.28125,10.28125c-8.28516,8.28516 -12.90625,19.35938 -12.90625,31.0625c0,11.70313 4.62109,22.55859 12.90625,30.84375c8.25782,8.28516 19.14063,12.90625 30.84375,12.90625c11.70313,0 22.80469,-4.62109 31.0625,-12.90625l10.28125,-10.28125c8.28516,-8.28516 12.90625,-19.35937 12.90625,-31.0625c0,-5.55078 -1.06641,-10.96484 -3.0625,-15.96875l-11.375,11.375c1.42188,9.07813 -1.33984,18.83984 -8.3125,25.8125l-10.28125,10.28125c-5.63281,5.63282 -13.26172,8.75 -21.21875,8.75c-7.95703,0 -15.36718,-3.11718 -21,-8.75c-11.62109,-11.62109 -11.62109,-30.59766 0,-42.21875l10.28125,-10.28125c5.63282,-5.63281 13.26172,-8.75 21.21875,-8.75c1.55859,0 3.08984,0.16407 4.59375,0.4375l11.375,-11.375c-5.00391,-1.99609 -10.41797,-3.0625 -15.96875,-3.0625z"></path></g></g></g></svg>';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('codesavages-format-link'); ?>>

  <header class="entry-header text-center">

    <?php 
      
      $link = codesavages_grab_link();
      the_title('<h1 class="entry-title"><a href="' . $link . '" target="_blank">', '<div class="link-icon">'.$linkPic.'</div></a></h1>');
      
    ?>

  </header>

</article>