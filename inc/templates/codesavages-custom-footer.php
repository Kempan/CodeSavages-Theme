<?php
    $firstFirst = esc_attr(get_option('left_first'));
    $firstSecond = esc_attr(get_option('left_second'));
?>
<h1>Custom Footer</h1>


<div class="codesavages-footer-preview">
    <div class="codesavages-footer">


    </div>
</div>

<form method="post" action="options.php" class="codesavages-general-form">
    <?php settings_fields('codesavages-footer-group'); ?>
    <?php do_settings_sections('codesavages_footer') ?>
    <?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
</form>