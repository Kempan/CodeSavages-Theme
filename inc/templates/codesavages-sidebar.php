<h1>CodeSavages Sidebar Options</h1>
<?php settings_errors(); ?>
<?php
  $picture = esc_attr(get_option('profile_picture'));
  // $firstName = esc_attr(get_option('first_name'));
  // $lastName = esc_attr(get_option('last_name'));
  // $fullName = $firstName . ' ' . $lastName;
  $companyName = esc_attr(get_option('company_name'));
  $description = esc_attr(get_option('description'));

  $twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
	$facebook_icon = esc_attr( get_option( 'facebook_handler' ) );
  $instagram_icon = esc_attr( get_option( 'instagram_handler' ) );
?>

<div class="codesavages-sidebar-preview">
  <div class="codesavages-sidebar">
    <div class="codesavages-image-container">
      <div id="replace-profile-picture" class="codesavages-profile-picture" style="background-image: url(<?php print $picture ?>)">
        
      </div>
    </div>
    <h1 class="codesavages-username"><?php print $companyName; ?></h1>
    <h2 class="codesavages-description"><?php print $description; ?></h2>
    <div class="codesavages-image-wapper">

    </div>
  </div>
</div>

<form method="post" action="options.php" class="codesavages-general-form">
  <?php settings_fields('codesavages-settings-group'); ?>
  <?php do_settings_sections('codesavages') ?>
  <?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
</form>