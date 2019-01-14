<h1>CodeSavages Contact Options</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="codesavages-general-form">
  <?php settings_fields('codesavages-contact-options'); ?>
  <?php do_settings_sections('codesavages_contact_page') ?>
  <?php submit_button(); ?>
</form>