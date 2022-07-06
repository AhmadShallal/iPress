<?php 

/*****
    ipress CPT
*****/

//activate css editing

$css_activ =  get_option( 'activate_css' ); 
if(@$css_activ == 1){
	//add_action('init', 'custom_editor_styles');
	add_filter( 'mce_buttons', 'add_style_select_buttons' );
	add_action( 'init', 'my_editor_background_color' );
	add_filter( 'mce_buttons', 'font_mce_buttons' );
	add_filter( 'tiny_mce_before_init', 'font_mce_text_sizes' );
}

function custom_editor_styles() {
	add_editor_style('editor-styles.css');
}

function add_style_select_buttons( $buttons ) {
	$buttons[] = 'styleselect';
	return $buttons;
}

function my_editor_background_color(){
	   add_filter( 'mce_buttons', 'my_editor_background_color_button', 1, 2 ); 
}

function my_editor_background_color_button( $buttons, $id ){
	
	  
	   if ( 'content' != $id ) return $buttons;
	   array_splice( $buttons, 4, 0, 'backcolor' );
	
	   return $buttons;
}

function font_mce_buttons( $buttons ) {
	array_unshift( $buttons, 'fontselect' ); 
	array_unshift( $buttons, 'fontsizeselect' ); 
	return $buttons;
}

function font_mce_text_sizes( $initArray ){
	$initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";
	return $initArray;
}

// Form Custom Post

$contact =  get_option( 'activate_form' ); 
if(@$contact == 1){
	add_action( 'init' , 'ipress_contact_cpt' );
	
	add_filter( 'manage_ipress-contact-cpt_posts_columns', 'ipress_customize_contact_columns' );
	add_action( 'manage_ipress-contact-cpt_posts_custom_column', 'ipress_populate_contact_columns' , 10, 2 );

	add_action( 'add_meta_boxes', 'ipress_contact_add_meta_box' );
	add_action('save_post', 'ipress_save_email_data');
}

function ipress_contact_cpt(){
    $labels = array(
		'name'                  => 'Messages' ,
		'singular_name'         => 'Message',
		'menu_name'             => 'Messages' ,
        'name_admin_bar'        => 'Message'
    );

    $args = array(		
		'labels'                => $labels,
		'supports'              => array( 'title' , 'editor' ,'author'),		
		'hierarchical'          => false,
		'menu_icon'             => 'dashicons-email-alt',
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 25,
		'capability_type'       => 'post'
	);
	register_post_type( 'ipress-contact-cpt', $args );
}

function ipress_customize_contact_columns( $columns ){
	$newColumns = array();
	$newColumns['cb'] = '<input type="checkbox" />';
	$newColumns['title'] = 'Full Name';
	$newColumns['message'] = 'Message';
	$newColumns['email'] = 'Email';
	$newColumns['date'] = 'Date';

	return $newColumns;
}

function ipress_populate_contact_columns( $column , $post_id ){
	switch ( $column ) {		
		case 'message' :
			echo get_the_excerpt();
		break;
		
		case 'email' :
			$email = get_post_meta( $post_id , '_ipress_contact_email_key' , true );
			echo $email;	
		break;
		
	}
}


// Email meta box

function ipress_contact_add_meta_box(){
	add_meta_box( 'user_email' ,'User Email', 'ipress_display_email_meta_box' , 'ipress-contact-cpt' , 'normal' , 'high' );
}

function ipress_display_email_meta_box( $post ){
	wp_nonce_field( 'ipress_save_email_data', 'ipress_email_meta_box_nonce' );

	$value = get_post_meta( $post->ID, '_ipress_contact_email_key' , true );

	echo '<label for="ipress_contact_email_field" >Sender Email  </label>';
	echo '<input type="email" id="ipress_contact_email_field" name="ipress_contact_email_field" value="'.esc_attr($value).'"></input>';

}

function ipress_save_email_data($post_id){
	if( ! isset( $_POST['ipress_email_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['ipress_email_meta_box_nonce'], 'ipress_save_email_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['ipress_contact_email_field'] ) ) {
		return;
	}

	$email_data = sanitize_text_field( $_POST['ipress_contact_email_field'] );
	update_post_meta( $post_id , '_ipress_contact_email_key' , $email_data );
}