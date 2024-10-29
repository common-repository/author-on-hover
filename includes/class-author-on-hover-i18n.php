<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://forhad.net/
 * @since      1.0.0
 *
 * @package    AOH_Author_On_Hover
 * @subpackage AOH_Author_On_Hover/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    AOH_Author_On_Hover
 * @subpackage AOH_Author_On_Hover/includes
 * @author     Forhad Hossain <need@forhad.net>
 */
class AOH_Author_On_Hover_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'author-on-hover',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
