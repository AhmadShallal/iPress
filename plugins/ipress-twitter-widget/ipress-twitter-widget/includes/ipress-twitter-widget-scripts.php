<?php

// include scripts

function ipress_twitter_widget_scripts(){
    wp_enqueue_style( 'twitter_style', plugins_url().'/ipress-twitter-widget/includes/style.css'  );
    wp_enqueue_script( 'twitter_script', plugins_url().'/ipress-twitter-widget/includes/twitter-script.js' , array('jquery'),'',true );
    
}add_action( 'wp_enqueue_scripts' , 'ipress_twitter_widget_scripts' );


?>