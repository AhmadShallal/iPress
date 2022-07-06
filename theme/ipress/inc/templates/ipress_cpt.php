<h1>Choose Ipress Post Types</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="admin-form">
    <?php settings_fields( 'ipress-custom-post-group' ); ?>
    <?php do_settings_sections( 'ipress_post_types' ); ?>
    <?php submit_button(); ?>
</form>