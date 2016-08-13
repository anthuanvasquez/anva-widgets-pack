<?php
/*
Plugin Name: Anva Widgets Pack
Description: This plugin works in conjuction with the Anva Framework to create Widgets for use with the framework to generate content.
Version: 1.0.0
Author: Anthuan Vásquez
Author URI: http://anthuanvasquez.net
License: GPL2
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'ANVA_WIDGETS_PLUGIN_VERSION', '1.0.0' );
define( 'ANVA_WIDGETS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ANVA_WIDGETS_PLUGIN_URI', plugin_dir_url( __FILE__ ) );

// Includes widgets
include_once( ANVA_WIDGETS_PLUGIN_DIR . '/includes/class-anva-posts-list.php' );
include_once( ANVA_WIDGETS_PLUGIN_DIR . '/includes/class-anva-quick-contact.php' );
include_once( ANVA_WIDGETS_PLUGIN_DIR . '/includes/class-anva-social-media-buttons.php' );

/**
 * Register widgets
 * 
 * @since 1.0.0
 */
function anva_register_widgets() {

	$widgets = anva_get_widgets();

	// Register Framework Widgets
	foreach ( $widgets as $key => $widget ) {
		// Validate if widget class exists
		//if ( isset( $widget['class'] ) && class_exists( $widget['class'] ) ) {
			register_widget( $widget['class'] );
		//}
	}

}
add_action( 'widgets_init', 'anva_register_widgets' );

/**
 * Get widgets
 * 
 * @since 1.0.0
 */
function anva_get_widgets() {

	$widgets = array(
		'posts_list' =>array(
			'class' => 'Anva_Posts_List',
			'name' => 'Anva Posts List'
		),
		'social_media_buttons' =>array(
			'class' => 'Anva_Social_Media_Buttons',
			'name' => 'Anva Social Media Buttons'
		),
		'quick_contact' =>array(
			'class' => 'Anva_Quick_Contact',
			'name' => 'Anva Quick Contact'
		)
	);
	
	return apply_filters( 'anva_widgets', $widgets );
}
