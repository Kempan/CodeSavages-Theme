<h1>CodeSavages Header & Navbar Options</h1>
<?php settings_errors(); ?>

<?php
  $logo = esc_attr(get_option('navbar_logo'));
  $slogan = esc_attr(get_option('slogan'));
  $bgColor = esc_attr(get_option('nav_bg_color'));
?>

<div class="codesavages-logo-preview">
  <div class="codesavages-navbar">
    <div class="codesavages-logo-container">
      <div id="replace-navbar-logo" class="codesavages-navbar-logo" style="background-image: url(<?php print $logo ?>)"></div>
      <h2 class="codesavages-navbar-slogan"><?php print $slogan; ?></h2>
    </div>
  </div>
</div>
<?php if($bgColor): ?>
    <div class="container-preview">
        <div class="codesavage-navbar-preview" style="color:white; background-color:<?=$bgColor?>">
            <div class="menu-item">
                <p>Home</p>
            </div>
            <div class="menu-item">
                <p>About</p>
            </div><div class="menu-item">
                <p>Contact</p>
            </div>
        </div>
    </div>
<?php endif;?>

<form method="post" action="options.php" class="codesavages-general-form">
  <?php settings_fields('codesavages-navbar-group'); ?>
  <?php do_settings_sections('codesavages_theme_header_nav') ?>
  <!-- ATTRIBUTE 3 BYTER ID FÖR ATT INTE STÖRA INPUT SUBMIT  -->
  <?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
</form>