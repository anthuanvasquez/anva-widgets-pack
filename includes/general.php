<?php

/**
 * Anva Widgets textdomain.
 *
 * @since  1.0.0
 */
function anva_widgets_textdomain() {
	load_plugin_textdomain(
		'anva-widgets',
		false,
		dirname( plugin_basename( __FILE__ ) ) . '/languages'
	);
}
add_action( 'plugins_loaded', 'anva_widgets_textdomain' );
