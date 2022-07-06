<?php

// include scripts

function ipress_football_widget_scripts(){
    wp_enqueue_style( 'footballw_style', plugins_url().'/football-results-widget/includes/style.css'  );
    wp_enqueue_script( 'footballw_script', plugins_url().'/football-results-widget/includes/script.js' , array('jquery') );
}add_action( 'wp_enqueue_scripts' , 'ipress_football_widget_scripts' );