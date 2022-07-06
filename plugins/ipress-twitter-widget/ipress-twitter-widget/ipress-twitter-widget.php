<?php
/**
 *   Plugin Name: ipress-twitter-widget 
 * 
 *   Plugin URI: https://github.com/AhmadShallal
 *   Description: twitter-widget for IPress theme..
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


require_once(plugin_dir_path(__FILE__).'/includes/ipress-twitter-widget-scripts.php');
require_once(plugin_dir_path(__FILE__).'/includes/twitter-api-exchange.php');
require_once(plugin_dir_path(__FILE__).'/includes/ipress-twitter-widget-functions.php');
require_once(plugin_dir_path(__FILE__).'/ipress-twitter-widget-class.php');

//register the widget

function register_ipress_twitter_widget(){
    register_widget( 'ipress_twitter_widget' );
}add_action( 'widgets_init' , 'register_ipress_twitter_widget' );

