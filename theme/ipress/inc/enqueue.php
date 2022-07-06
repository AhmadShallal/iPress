<?php
/*
// ipress enqueue styles and scripts....
*/

/*
    // enqueue admin scripts 
*/

function ipress_enqueue_admin($hook){
    if($hook != 'toplevel_page_ipress_admin'  ){
        return;
    }
    wp_register_style( 'ipress_admin_css', get_template_directory_uri().'/sass/admin_css/ipress.admin.css', array() , 'all' );
    wp_enqueue_style( 'ipress_admin_css' );

    wp_enqueue_media();

    wp_register_script( 'ipress_admin_js', get_template_directory_uri().'/js/ipress.admin.js', array('jquery'), true );
    wp_enqueue_script( 'ipress_admin_js' );
}add_action( 'admin_enqueue_scripts' , 'ipress_enqueue_admin' );


/**
 * enqueue front-end styles and scripts * 
 */


function ipress_enqueue_front(){

    wp_enqueue_style( 'bootstrap_css' , get_template_directory_uri().'/sass/bootstrap.min.css' ,'4.0.0' , array() , 'all' );
    wp_enqueue_style( 'fontawesome_css' , get_template_directory_uri().'/sass/font-awesome.css' );
    wp_enqueue_style( 'ipress_css' , get_template_directory_uri().'/css/ipress.css' ,'0.9' , array() , 'all' );

    wp_enqueue_script( 'popper' , get_template_directory_uri().'/js/popper.min.js' , array() , true );
    wp_enqueue_script( 'bootstrap_js' , get_template_directory_uri().'/js/bootstrap.min.js' , array('popper','jquery') , true );
    wp_enqueue_script( 'ipress_front_js', get_template_directory_uri().'/js/ipress.front.js', array('jquery'), true );
    //wp_enqueue_script( handle, src, deps, in_footer )
    if(is_front_page()){
        wp_enqueue_script( 'asynquence', 'https://cdnjs.cloudflare.com/ajax/libs/asynquence/0.10.2/asq.js', 0.2 , array() , true );
        wp_enqueue_script( 'asynquence_contib', 'https://cdnjs.cloudflare.com/ajax/libs/asynquence-contrib/0.28.2/contrib.js', 0.1 , array() , true );
        wp_enqueue_script( 'hb_compiled_js' , get_template_directory_uri().'/js/categoryTemplate.js', 1.0, array() , true ); 
        wp_enqueue_script( 'handlebars_js' , 'https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js' ,4 ,array() , true );        
        wp_enqueue_script( 'ipress_carousel_js', get_template_directory_uri().'/js/ipress.front-page.js', '1.0' , array('bootstrap_js', 'handlebars_js', 'hb_compiled_js' ,'jQuery' , 'asynquence' ,'asynquence_contib' ), true ); 
        wp_localize_script( 'ipress_carousel_js', 'ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    } 
    
    
}add_action( 'wp_enqueue_scripts', 'ipress_enqueue_front' );