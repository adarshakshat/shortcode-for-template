<?php

/*
Plugin Name: Shortcode For Template
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: adarshakshat
Author URI: http://URI_Of_The_Plugin_Author
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
