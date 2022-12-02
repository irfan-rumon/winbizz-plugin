<?php
/**
 * Plugin Name: Elementor Addon
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-addon
 */

function register_hello_world_widget( $widgets_manager ) {
	
	require_once( __DIR__ . '/widgets/hello-world-widget-2.php' );
	require_once( __DIR__ . '/widgets/slider.php' );

	$widgets_manager->register( new \Elementor_Hello_World_Widget_2() );
	$widgets_manager->register( new \Slider() );

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );