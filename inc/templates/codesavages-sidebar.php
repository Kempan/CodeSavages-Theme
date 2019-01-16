<h1>CodeSavages Sidebar Options</h1>
<?php settings_errors(); ?>
<?php
  $picture = esc_attr(get_option('profile_picture'));
  $firstName = esc_attr(get_option('first_name'));
  $lastName = esc_attr(get_option('last_name'));
  $fullName = $firstName . ' ' . $lastName;
  $description = esc_attr(get_option('description'));
?>

<div class="codesavages-sidebar-preview">
  <div class="codesavages-sidebar">
    <div class="codesavages-image-container">
      <div id="replace-profile-picture" class="codesavages-profile-picture" style="background-image: url(<?php print $picture ?>)">
        
      </div>
    </div>
    <h1 class="codesavages-username"><?php print $fullName; ?></h1>
    <h2 class="codesavages-description"><?php print $description; ?></h2>
    <div class="codesavages-image-wapper">

    </div>
  </div>
</div>

<form method="post" action="options.php" class="codesavages-general-form">
  <?php settings_fields('codesavages-settings-group'); ?>
  <?php do_settings_sections('codesavages') ?>
  <!-- ATTRIBUTE 3 BYTER ID FÖR ATT INTE STÖRA INPUT SUBMIT  -->
  <?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
</form>