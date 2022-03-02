<?php

/*
Plugin Name: Shortcode For Template
Plugin URI: https://github.com/adarshakshat/shortcode-for-template
Description: A brief description of the Plugin.
Version: 1.0
Author: adarshakshat
Author URI: https://github.com/adarshakshat/
License: A "Slug" license name e.g. GPL2
*/


function template_part_shortcode( $atts ) {

	extract( shortcode_atts( array(
		'part' => '',
	), $atts ) );

	$file = locate_template('sections/' . $part . '.php');
//	$file = locate_template($atts. '.php');

	ob_start();
	include $file;
	$template = ob_get_contents();
	ob_end_clean();
	return $template;

}
add_shortcode( 'template', 'template_part_shortcode' );

?>
