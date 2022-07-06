<?php 

/*****
    ipress theme support
*****/


$options =  get_option( 'post_formats' );
$formats = array('aside','gallery','link','image','quote','status','video','audio','chat');
$output = array();

foreach ( $formats as $format ){
    $output[] = ( @$options[$format] == 1 ? $format : '' );
}

if( !empty($options) ){
    add_theme_support( 'post-formats' , $output );
}

$header =  get_option( 'custom_header' ); 
if(@$header == 1){
    add_theme_support( 'custom_header' );
}

$background =  get_option( 'custom_background' ); 
if(@$background == 1){
    add_theme_support( 'custom_background' );
}

function ipress_get_attachment(){
	
	$output = '';
	if( has_post_thumbnail() ): 
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	else:
		$attachments = get_posts( array( 
			'post_type' => 'attachment',
            'posts_per_page' => 1,
            'post_mime_type' => 'image',
			'post_parent' => get_the_ID()
		) );
		if( $attachments ):
            foreach ( $attachments as $attachment ):
				$output = wp_get_attachment_url( $attachment->ID );
			endforeach;
		endif;
		
		wp_reset_postdata();
		
	endif;
	
	return $output;
}


// mail trap config

function mailtrap($phpmailer) {
	$phpmailer->isSMTP();
	$phpmailer->Host = 'smtp.mailtrap.io';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 2525;
	$phpmailer->Username = 'a695950fc941e4';
	$phpmailer->Password = '2b52c77fafb1a0';
  }
  
  add_action('phpmailer_init', 'mailtrap');