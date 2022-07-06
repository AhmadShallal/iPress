<?php

/*
=================================
    Admin Page
=================================
*/

function ipress_add_admin_page(){
    //Generate iPress admin page
    add_menu_page( 'Ipress Admin Page' , 'Ipress' , 'manage_options' , 'ipress_admin' , 'ipress_create_admin_page',
    'dashicons-admin-customizer' , 110 );

    //Generate iPress admin Sub-pages....
    add_submenu_page( 'ipress_admin', 'Ipress Admin Page', 'General Settings' , 'manage_options' , 'ipress_admin',
    'ipress_create_admin_page' );

    add_submenu_page( 'ipress_admin', 'Ipress Post Types', 'Customize Post Types', 'manage_options', 'ipress_post_types', 'ipress_choose_post_types' );

    add_submenu_page( 'ipress_admin', 'Ipress Custom Form', 'Activate Form', 'manage_options', 'ipress_custom_form', 'ipress_contact_form' );

    add_submenu_page( 'ipress_admin', 'Ipress CSS Page', 'Custom CSS' , 'manage_options' , 'ipress_custom_css',
    'ipress_create_css_page' );

    add_action( 'admin_init' , 'ipress_custom_settings' );

}add_action( 'admin_menu','ipress_add_admin_page' );

// Activate Custom Settings

function ipress_custom_settings(){
    // Settings for 'Ipress Admin Page' //

        
    register_setting( 'ipress-settings-group', 'site_logo' );
    register_setting( 'ipress-settings-group', 'footer_logo' );
    register_setting( 'ipress-settings-group', 'email' );
    register_setting( 'ipress-settings-group', 'twitter_handler' , 'ipress_sanitize_twitter' );
    register_setting( 'ipress-settings-group', 'dribbble_handler' );
    register_setting( 'ipress-settings-group', 'gplus_handler' );
    register_setting( 'ipress-settings-group', 'facebook_handler' );
    register_setting( 'ipress-settings-group', 'rss_handler' );
    register_setting( 'ipress-settings-group', 'github_handler' );
    register_setting( 'ipress-settings-group', 'linkedin_handler' );
    register_setting( 'ipress-settings-group', 'pinterest_handler' );

    add_settings_section( 'ipress-info-options', 'Info Options', 'ipress_info_options', 'ipress_admin' );

    add_settings_field( 'info-footer-logo', 'Footer Logo', 'ipress_info_f_logo' , 'ipress_admin' , 'ipress-info-options' );
    add_settings_field( 'info-logo', 'Main Logo', 'ipress_info_logo' , 'ipress_admin' , 'ipress-info-options' );
    add_settings_field( 'info-email', 'Official Email', 'ipress_info_email' , 'ipress_admin' , 'ipress-info-options' );
    add_settings_field( 'info-twitter', 'Twitter Handler', 'ipress_info_twitter' , 'ipress_admin' , 'ipress-info-options' );
    add_settings_field( 'info-dribbble', 'Dribble Handler', 'ipress_info_dribbble' , 'ipress_admin' , 'ipress-info-options' );
    add_settings_field( 'info-gplus', 'Gplus Handler', 'ipress_info_gplus' , 'ipress_admin' , 'ipress-info-options' );
    add_settings_field( 'info-facebook', 'Facebook Handler', 'ipress_info_facebook' , 'ipress_admin' , 'ipress-info-options' );
    add_settings_field( 'info-rss', 'Rss Handler', 'ipress_info_rss' , 'ipress_admin' , 'ipress-info-options' );
    add_settings_field( 'info-github', 'Github Handler', 'ipress_info_github' , 'ipress_admin' , 'ipress-info-options' );
    add_settings_field( 'info-linkedin', 'Linkedin Handler', 'ipress_info_linkedin' , 'ipress_admin' , 'ipress-info-options' );
    add_settings_field( 'info-pinterest', 'Pinterest Handler', 'ipress_info_pinterest' , 'ipress_admin' , 'ipress-info-options' );

    // Settings for 'Ipress Post Types'

    register_setting( 'ipress-custom-post-group', 'post_formats'  );
    register_setting( 'ipress-custom-post-group', 'custom_header'  );
    register_setting( 'ipress-custom-post-group', 'custom_background'  );

    add_settings_section( 'ipress-post-options', 'Post Options', 'ipress_post_options', 'ipress_post_types' );

    add_settings_field( 'post-format', 'Post Types', 'ipress_display_cpt', 'ipress_post_types' , 'ipress-post-options' );
    add_settings_field( 'custom-header', 'Custom Header', 'ipress_custom_header_actv', 'ipress_post_types' , 'ipress-post-options' );  
    add_settings_field( 'custom-background', 'Custom Background', 'ipress_custom_background_actv', 'ipress_post_types' , 'ipress-post-options' );  
    
    // Settings for Contact Form

    register_setting( 'ipress-activate-form', 'activate_form');

    add_settings_section( 'ipress-contact', 'Contact Form', 'ipress_contact', 'ipress_custom_form' );

    add_settings_field( 'activate-form', 'Activate Contact Form', 'sunset_activate_contact_form', 'ipress_custom_form', 'ipress-contact' );

    //Settings for Custom Css

    register_setting( 'ipress-activate-css', 'activate_css' );
    add_settings_section( 'ipress-css', 'Activate Post Styling', 'ipress_css_callback' , 'ipress_custom_css' );
    add_settings_field( 'activate-css', 'Activate Post WYSIWYG Styling' , 'ipress_activate_editing_css' , 'ipress_custom_css', 'ipress-css' );
}

// functions for activating css post editor

function ipress_css_callback(){
    echo '';
}

function ipress_activate_editing_css(){
    $options =  get_option( 'activate_css' ); 
    $checked = ( @$options == 1 ? 'checked' : '' );   
    echo '<label><input type="checkbox" id="activate_css" name="activate_css" value="1" '.$checked.' /></label>';
}

// functions for activating custom contact form

function ipress_contact(){
    echo 'activate and deactivate custom contact form';
}

function sunset_activate_contact_form(){
    $options =  get_option( 'activate_form' ); 
    $checked = ( @$options == 1 ? 'checked' : '' );   
    echo '<label><input type="checkbox" id="activate_form" name="activate_form" value="1" '.$checked.' /></label>';
}

// Functions for choosing Custom Post Types

function ipress_custom_post($input){
    return $input;
}

function ipress_post_options(){
    echo ' Activate and Deactivate post types of Ipress Theme ';
}

function ipress_display_cpt(){
    $options =  get_option( 'post_formats' );
    $formats = array('aside','gallery','link','image','quote','status','video','audio','chat');
    $output = '';
    foreach ( $formats as $format ){
        $checked = ( @$options[$format] == 1 ? 'checked' : '' );
        $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' />'.$format.'</label></br>';
    }
    echo $output;
}

function ipress_custom_header_actv(){
    $options =  get_option( 'custom_header' ); 
    $checked = ( @$options == 1 ? 'checked' : '' );   
    echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' />Activate Custom Header</label>';
}

function ipress_custom_background_actv(){
    $options =  get_option( 'custom_background' ); 
    $checked = ( @$options == 1 ? 'checked' : '' );   
    echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' />Activate Custom background</label>';
}

// Begin functions for info page

function ipress_info_options(){
    echo '<p>Please Enter Contact Email and Social Media Usernames
    that will be displayed in Contact section.</p>';
}

function ipress_info_email(){
    $email = esc_attr( get_option( 'email' ) );
    echo '<input type="email" name="email" value="'.$email.'" placeholder="Email" />';
}

function ipress_info_twitter(){
    $twitter = esc_attr( get_option( 'twitter_handler' ) );
    echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter ID" /> 
    <p class="description">Please Enter your Twitter username without the @ symbol</p>';
}

function ipress_info_dribbble(){
    $dribbble = esc_attr( get_option( 'dribbble_handler' ) );
    echo '<input type="text" name="dribbble_handler" value="'.$dribbble.'" placeholder="dribbble ID" />';
}

function ipress_info_gplus(){
    $gplus = esc_attr( get_option( 'gplus_handler' ) );
    echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google+ ID" />';
}

function ipress_info_facebook(){
    $facebook = esc_attr( get_option( 'facebook_handler' ) );
    echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="facebook ID" />';
}

function ipress_info_rss(){
    $rss = esc_attr( get_option( 'rss_handler' ) );
    echo '<input type="text" name="rss_handler" value="'.$rss.'" placeholder="rss ID" />';
}

function ipress_info_github(){
    $github = esc_attr( get_option( 'github_handler' ) );
    echo '<input type="text" name="github_handler" value="'.$github.'" placeholder="github ID" />';
}

function ipress_info_linkedin(){
    $linkedin = esc_attr( get_option( 'linkedin_handler' ) );
    echo '<input type="text" name="linkedin_handler" value="'.$linkedin.'" placeholder="linkedin ID" />';
}

function ipress_info_pinterest(){
    $pinterest = esc_attr( get_option( 'pinterest_handler' ) );
    echo '<input type="text" name="pinterest_handler" value="'.$pinterest.'" placeholder="pinterest ID" />';
}

function ipress_info_logo(){
    $logo = esc_attr( get_option( 'site_logo' ) );
    if (empty($logo)){
        echo '<input type="button" value="Upload Main Logo" id="upload-logo" class="button button-secondary"/>
        <input type="hidden" id="site-logo" name="site_logo" value="" />';
    }else {
        echo '<input type="button" value="Replace Main Logo" id="upload-logo" class="button button-secondary"/>
        <input type="hidden" id="site-logo" name="site_logo" value="'.$logo.'" /> <input type="button" value="Remove" id="remove-logo" class="button button-secondary"/>';
    }    
}

function ipress_info_f_logo(){
    $flogo = esc_attr( get_option( 'footer_logo' ) );
    if (empty($flogo)){
        echo '<input type="button" value="Upload Footer Logo" id="upload-footer-logo" class="button button-secondary"/>
        <input type="hidden" id="footer-logo" name="footer_logo" value="" />';
    }else {
        echo '<input type="button" value="Replace Footer Logo" id="upload-footer-logo" class="button button-secondary"/>
        <input type="hidden" id="footer-logo" name="footer_logo" value="'.$flogo.'" /> <input type="button" value="Remove" id="remove-footer-logo" class="button button-secondary"/>';
    }    
}

// END functions for info page

// Sanitize Custom Settings

 function ipress_sanitize_twitter($input){
    $output = sanitize_text_field( $input );
    $output = str_replace('@','',$output);
    return $output;
}

function ipress_create_admin_page(){
    // generate admin page
    include_once(get_template_directory().'/inc/templates/ipress_admin.php');
}

function ipress_create_css_page(){
    //generate css admin page
    include_once(get_template_directory().'/inc/templates/ipress_custom_css.php');
    
}

function ipress_choose_post_types(){
    // generate choose post-types page
    include_once(get_template_directory().'/inc/templates/ipress_cpt.php');
}

function ipress_contact_form(){
    // generate form activation page
    include_once(get_template_directory().'/inc/templates/ipress_custom_form.php');
}


?>