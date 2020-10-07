<?php
	// Child theme functions
	function my_et_enqueue_styles() { wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); }

	// Enqueue child theme information
	add_action( 'wp_enqueue_scripts', 'my_et_enqueue_styles' );

	// Load PHP libraries
	require_once 'php/class-resources.php';
	require_once 'php/class-shortcodes.php';

	// Initialize classes
	$fogarty_resources = new Fogarty_Resources();
	$fogarty_shortcodes = new Fogarty_Shortcodes();

	// Apply actions and filters
	add_filter('init', 'Fogarty_Shortcodes::add_shortcode'); // Add shortcode object
?>