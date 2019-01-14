<h1>CodeSavages Theme Options</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="codesavages-general-form">
  <?php settings_fields('codesavages-theme-support'); ?>
  <?php do_settings_sections('codesavages_theme') ?>
  <?php submit_button(); ?>
</form>