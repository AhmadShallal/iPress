<?php
/**
 *   Plugin Name: Ipress_Widget_Display_Best_Reviews 
 * 
 *   Plugin URI: https://github.com/AhmadShallal
 *   Description: best reviews widget for IPress theme..
 *   Version: 0.1.0
 *   Author: Ahmad Shallal
 *   Author URI: https://github.com/AhmadShallal
 *   
 * @package Ipress
 * 
 */



 // exit if accesed directly
if(!defined('ABSPATH')){
    exit;
}

// require assets


require(plugin_dir_path(__FILE__).'/includes/ipress-best-reviews-scrimms.php');
require_once(plugin_dir_path(__FILE__).'/includes/ipress-reviews-widget-functions.php');
require_once(plugin_dir_path(__FILE__).'/ipress-widget-reviews-class.php');

//register the widget

function register_ipress_reviews_widget(){
    register_widget( 'IPress_Widget_Reviews' );
}add_action( 'widgets_init' , 'register_ipress_reviews_widget' );

