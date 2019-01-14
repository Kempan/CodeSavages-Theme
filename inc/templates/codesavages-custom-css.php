<h1>CodeSavages Custom CSS</h1>
<?php settings_errors(); ?>

<form id="save-custom-css-form" method="post" action="options.php" class="codesavages-general-form">
  <?php settings_fields('codesavages-custom-css-options'); ?>
  <?php do_settings_sections('codesavages_css') ?>
  <?php submit_button(); ?>
</form>