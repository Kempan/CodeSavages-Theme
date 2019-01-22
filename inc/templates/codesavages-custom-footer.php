<h1>Custom Footer</h1>



<form method="post" action="options.php" class="codesavages-general-form">
    <?php settings_fields('codesavages-footer-group'); ?>
    <?php do_settings_sections('codesavages_footer') ?>
    <?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
</form>
