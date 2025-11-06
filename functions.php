<?php
	// this file will be included by GWS-Debugian automatically
	define('GWS_POPOVER_VERSION', '1.0.0');

	add_action('wp_enqueue_scripts', 'gws_popover_scripts');
	function gws_popover_scripts() {
		if(file_exists(plugin_dir_path( __FILE__ ) . 'settings.js')) {
			wp_enqueue_script( 'gws-popover-settings', plugin_dir_url( __FILE__ ) . 'custom/settings.js', array(), GWS_POPOVER_VERSION, true );
		}
		wp_enqueue_script( 'gws-popover-base-settings', plugin_dir_url( __FILE__ ) . 'js/base-settings.js', array(), GWS_POPOVER_VERSION, true );
		wp_enqueue_script( 'gws-popover-js', plugin_dir_url( __FILE__ ) . 'js/gws-popover.js', array(), GWS_POPOVER_VERSION, true );
		
		wp_enqueue_style( 'gws-popover-base-css', plugin_dir_url( __FILE__ ) . 'css/base-style.css', array(), GWS_POPOVER_VERSION );
		if(file_exists(plugin_dir_path( __FILE__ ) . 'style.css')) {
			wp_enqueue_style( 'gws-popover-css', plugin_dir_url( __FILE__ ) . 'custom/style.css', array(), GWS_POPOVER_VERSION );
		}
	}
	