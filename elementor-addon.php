<?php
/**
 * Plugin Name: Custom Slider
 * Description: Custom slider widget for elementor
 * Version:     1.0.0
 * Text Domain: custom-slider
 */

function register_hello_world_widget( $widgets_manager ) {
	
	require_once( __DIR__ . '/widgets/hello-world-widget-2.php' );
	
	$widgets_manager->register( new \Elementor_Hello_World_Widget_2() );
}

function register_slider_widget($widgets_manager){
	require_once( __DIR__ . '/widgets/slider.php' );

	$widgets_manager->register( new \Slider() );

}

function frontend_styles() {

	wp_register_style( 'slider_style', plugins_url( 'assets/css/slider_style.css', __FILE__ ) );

	wp_enqueue_style( 'slider_style' );

}


add_action( 'elementor/widgets/register', 'register_hello_world_widget' );
add_action( 'elementor/widgets/register', 'register_slider_widget' );

add_action( 'elementor/frontend/after_enqueue_styles', 'frontend_styles' );