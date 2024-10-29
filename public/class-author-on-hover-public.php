<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://forhad.net/
 * @since      1.0.0
 *
 * @package    AOH_Author_On_Hover
 * @subpackage AOH_Author_On_Hover/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    AOH_Author_On_Hover
 * @subpackage AOH_Author_On_Hover/public
 * @author     Forhad Hossain <need@forhad.net>
 */
class AOH_Author_On_Hover_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in AOH_Author_On_Hover_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The AOH_Author_On_Hover_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if ( is_singular( 'post' ) ) {

			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/author-on-hover-public.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name . '-font-awesome', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name . '-fa5-v4-shims', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/v4-shims.min.css', array(), $this->version, 'all' );
		}

		wp_register_style( 'aoh-author-widget', plugin_dir_url( __FILE__ ) . 'css/author-on-hover-widget.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in AOH_Author_On_Hover_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The AOH_Author_On_Hover_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if ( is_singular( 'post' ) ) {

			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/author-on-hover-public.js', array( 'jquery' ), $this->version, false );
		}

	}

}
