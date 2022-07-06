<?php
/**
 *   Plugin Name: The All New Ipress_Footbal_Results 
 * 
 *   Plugin URI: https://github.com/AhmadShallal
 *   Description: A plugin to display latest football results from your favourite competition
 *   Version: 0.1.0
 *   Author: Ahmad Shallal
 *   Author URI: https://github.com/AhmadShallal
 *   
 * @package Ipress
 * 
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @see WP_Widget
 */

 // exit if accesed directly
if(!defined('ABSPATH')){
    exit;
}

// require assets

require_once(plugin_dir_path(__FILE__).'/includes/ipress-football-results-widget-scripts.php');
require_once(plugin_dir_path(__FILE__).'/ipress-widget-football-class.php');

//register the widget

function register_ipress_wfootball(){
    register_widget( 'IPress_Widget_Football' );
}add_action( 'widgets_init' , 'register_ipress_wfootball' );

