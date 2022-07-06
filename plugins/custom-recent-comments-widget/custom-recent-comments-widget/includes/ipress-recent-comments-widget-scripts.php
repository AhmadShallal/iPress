<?php

// include scripts

function ipress_rc_widget_scripts(){
    wp_enqueue_style( 'rpw_style', plugins_url().'/custom-recent-comments-widget/includes/style.css'  );
    wp_enqueue_script( 'rpw_script', plugins_url().'/custom-recent-comments-widget/includes/script.js'  );
}add_action( 'wp_enqueue_scripts' , 'ipress_rc_widget_scripts' );