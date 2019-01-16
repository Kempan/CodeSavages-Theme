<h1>CodeSavages Header & Navbar Options</h1>
<?php settings_errors(); ?>

<?php
  $logo = esc_attr(get_option('navbar_logo'));
  $slogan = esc_attr(get_option('slogan'));
?>

<div class="codesavages-logo-preview">
  <div class="codesavages-navbar">
    <div class="codesavages-logo-container">
      <div id="replace-navbar-logo" class="codesavages-navbar-logo" style="background-image: url(<?php print $logo ?>)">
        
      </div>
    </div>
    
    <h2 class="codesavages-navbar-slogan"><?php print $slogan; ?></h2>
    <div class="codesavages-image-wapper">

    </div>
  </div>
</div>

<form method="post" action="options.php" class="codesavages-general-form">
  <?php settings_fields('codesavages-navbar-group'); ?>
  <?php do_settings_sections('codesavages_theme_header_nav') ?>
  <!-- ATTRIBUTE 3 BYTER ID FÖR ATT INTE STÖRA INPUT SUBMIT  -->
  <?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
</form>