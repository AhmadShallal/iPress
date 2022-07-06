<?php

// include scripts

function ipress_reviews_widget_scripts(){
    wp_enqueue_style( 'reviews_style', plugins_url().'/custom-reviexxs-widget/includes/style.css'  );
    //wp_enqueue_script( 'rs_script', plugins_url().'/custom-reviexxs-widget/includes/xxxtt.js' , array(''),'',true );
    wp_enqueue_script( 'like_script', plugins_url().'/custom-reviexxs-widget/includes/like-script.js' , array('jquery'),'',true );
    
    
    wp_localize_script('like_script', 'ajax_var', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax-nonce')
    ));
}add_action( 'wp_enqueue_scripts' , 'ipress_reviews_widget_scripts' );


?>