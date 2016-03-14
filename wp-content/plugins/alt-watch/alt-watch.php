<?php

/* 
 * @package Alt_Watch
 * @version 1.0
 */
/*
Plugin Name: Alt Watch
Plugin URI: 
Description: Clock
Author: Krzysztof Jastrzębski
Version: 1.0
Author URI: 
*/

// 
require_once 'class-alt-watch-widget.php';
require_once 'settings.php';
class alt_watch{
    static function init(){
        
    }
}
// Register and load the widget
function alt_load_widget() {
	register_widget( 'alt_watch_widget' );
}
add_action( 'widgets_init', 'alt_load_widget' );

function alt_register_scripts(){
    wp_enqueue_script('watch', plugins_url('assets/js/watch.js', __FILE__), array('jquery'), '73', true);
    //wp_enqueue_script('media', plugins_url('assets/js/media_picker.js', __FILE__), array('jquery'), '75' , true);
    //wp_enqueue_media();
    //wp_enqueue_style('wp-media');
}
function alt_enqueue_style(){
    
    wp_enqueue_style('alt_style', plugins_url('assets/css/alt_style.css', __FILE__));
  
}
function alt_options_enqueue_scripts() {
    
    wp_enqueue_script( 'media', plugins_url('assets/js/media_picker.js', __FILE__), array('jquery','media-upload','thickbox') );

    
        wp_enqueue_script('jquery');
 
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
 
        wp_enqueue_script('media-upload');
        wp_enqueue_script('media');
 
    
    wp_enqueue_media();
}
function alt_enqueue_media_picker() {
    // first check that $hook_suffix is appropriate for your admin page
    
    wp_enqueue_script( 'my-script-handle2', plugins_url('assets/js/media_picker.js', __FILE__ ), array( 'jquery','media-upload','thickbox'), false, true );
    
    wp_enqueue_script('jquery');
 
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
 
        wp_enqueue_script('media-upload');
        wp_enqueue_script('media');
 
    
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'alt_enqueue_media_picker' );
add_action('admin_enqueue_scripts', 'alt_options_enqueue_scripts');
function alt_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('assets/js/color_picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
$opt = get_option( 'alt_clock_option' );
add_action( 'admin_enqueue_scripts', 'alt_enqueue_color_picker' );
add_action('wp_enqueue_scripts', 'alt_enqueue_style');
add_action('wp_enqueue_scripts', 'alt_register_scripts');