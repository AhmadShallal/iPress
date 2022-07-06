<?php

// include scripts

function ipress_newsletter_widget_scripts(){
    wp_enqueue_style( 'ns_style', plugins_url().'/custom-newsletter-widget/includes/style.css'  );
    wp_enqueue_script( 'ns_script', plugins_url().'/custom-newsletter-widget/includes/script.js' , array('jquery'), true );
    
}add_action( 'wp_enqueue_scripts' , 'ipress_newsletter_widget_scripts' );