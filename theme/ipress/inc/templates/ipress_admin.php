<h1>Sunset Theme Options</h1>
<?php settings_errors(); ?>
<?php
$logo = esc_attr( get_option( 'site_logo' ) );
$flogo = esc_attr( get_option( 'footer_logo' ) );
?>
<div class="ipress-info-preview">
    <div class="image-container">
        <h4>Header Logo</h4>
        <img src="<?php print $logo; ?>"/>
    </div>

    <div class="image-container">
        <h4>Footer Logo</h4>
        <img src="<?php print $flogo; ?>"/>
    </div>
</div>
<form method="post" action="options.php" class="admin-form">
    <?php settings_fields( 'ipress-settings-group' ); ?>
    <?php do_settings_sections( 'ipress_admin' ); ?>
    <?php submit_button('Save Changes','primary','btnSubmit'); ?>
</form>