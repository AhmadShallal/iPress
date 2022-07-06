<h1>Activate Contact Form</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="admin-form">
    <?php settings_fields( 'ipress-activate-css' ); ?>
    <?php do_settings_sections( 'ipress_custom_css' ); ?>
    <?php submit_button(); ?>
</form>