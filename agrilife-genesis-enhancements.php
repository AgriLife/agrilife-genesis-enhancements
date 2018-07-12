<?php
/**
 * Plugin Name: AgriLife Genesis Enhancements
 * Plugin URI: https://github.com/AgriLife/agrilife-genesis-enhancements
 * Description: Enhancements for Genesis child themes
 * Version: 1.0.0
 * Author: Zach Watkins
 * Author URI: https://github.com/ZachWatkins
 * Author Email: zachary.watkins@ag.tamu.edu
 * License: GPL2+
**/

// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'access denied' );

define( 'AGCV_DIRNAME', 'agrilife-genesis-color-variations' );
define( 'AGCV_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'AGCV_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'AGCV_DIR_FILE', __FILE__ );
define( 'AGCV_THEME_NAME', strtolower( str_replace( ' ', '', wp_get_theme()->get('Name') ) ) );

if(AGCV_THEME_NAME === 'outreachpro'){

	add_action('init', function(){
		// Add color variations
		$colors = get_theme_support('genesis-style-selector');
		$colors[0]['outreach-pro-maroon'] = __( 'Outreach Pro Texas A&M Maroon', 'outreach' );
		$colors[0]['outreach-pro-extensionunit'] = __( 'Outreach Pro AgriLife Extension Unit', 'extensionunit' );

		add_theme_support('genesis-style-selector', $colors[0]);
	});

	add_action( 'wp_enqueue_scripts', 'agcv_register_plugin_styles' );

	function agcv_register_plugin_styles(){
		wp_register_style(
			'agcv-plugin',
			AGCV_DIR_URL . 'css/agrilife-genesis-enhancements.css',
      array(),
      filemtime(AGCV_DIR_PATH . 'css/agrilife-genesis-enhancements.css')
    );
		wp_enqueue_style( 'agcv-plugin' );
	};

}
