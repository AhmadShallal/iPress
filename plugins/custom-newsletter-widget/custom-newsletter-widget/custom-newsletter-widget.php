<?php
/**
 *   Plugin Name: Ipress_Widget_NewsLetter_Subscriber 
 * 
 *   Plugin URI: https://github.com/AhmadShallal
 *   Description: Ipress Newsletter Subscriber...
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


require(plugin_dir_path(__FILE__).'/includes/ipress-newsletter-scripts.php');
//require_once(plugin_dir_path(__FILE__).'/includes/ipress-newsletter-mailer.php');
require_once(plugin_dir_path(__FILE__).'/ipress-widget-newsletter-class.php');

//register the widget

function register_ipress_newsletter_widget(){
    register_widget( 'IPress_Widget_Newsletter' );
}add_action( 'widgets_init' , 'register_ipress_newsletter_widget' );

