<?php
/**
 *   Plugin Name: Only Ipress_Widget_Recent_comments 
 * 
 *   Plugin URI: https://github.com/AhmadShallal
 *   Description: recent comments widget Based upon wordpress widget
 *   Version: 0.1.0
 *   Author: Ahmad Shallal
 *   Author URI: https://github.com/AhmadShallal
 *   
 * @package Ipress
 * 
 */

/**
 * Core class used to implement a Recent comments widget.
 *
 * @see WP_Widget
 */

 // exit if accesed directly
if(!defined('ABSPATH')){
    exit;
}

// require assets

require_once(plugin_dir_path(__FILE__).'/includes/ipress-recent-comments-widget-scripts.php');
require_once(plugin_dir_path(__FILE__).'/ipress-widget-rc-class.php');

//register the widget

function register_ipress_wrc(){
    register_widget( 'IPress_Widget_Recent_comments' );
}add_action( 'widgets_init' , 'register_ipress_wrc' );

