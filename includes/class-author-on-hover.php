<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://forhad.net/
 * @since      1.0.0
 *
 * @package    AOH_Author_On_Hover
 * @subpackage AOH_Author_On_Hover/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    AOH_Author_On_Hover
 * @subpackage AOH_Author_On_Hover/includes
 * @author     Forhad Hossain <need@forhad.net>
 */
class AOH_Author_On_Hover {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      AOH_Author_On_Hover_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'AOH_AUTHOR_ON_HOVER_VERSION' ) ) {
			$this->version = AOH_AUTHOR_ON_HOVER_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'author-on-hover';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - AOH_Author_On_Hover_Loader. Orchestrates the hooks of the plugin.
	 * - AOH_Author_On_Hover_i18n. Defines internationalization functionality.
	 * - AOH_Author_On_Hover_Admin. Defines all hooks for the admin area.
	 * - AOH_Author_On_Hover_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-author-on-hover-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-author-on-hover-i18n.php';

		/**
		 * The class responsible for custom post type
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-author-on-hover-cpt.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-author-on-hover-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-author-on-hover-public.php';

		/**
		 * The class responsible for displaying content.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/author-on-hover-public-display.php';

		/**
		 * The class responsible for output.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/author-on-hover-shortcode-display.php';

		$this->loader = new AOH_Author_On_Hover_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the AOH_Author_On_Hover_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new AOH_Author_On_Hover_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new AOH_Author_On_Hover_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		// Plugin admin custom post types.
		$plugin_admin_cpt = new AOH_Admin_CPT( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'init', $plugin_admin_cpt, 'aoh_post_type' );
		$this->loader->add_filter( 'post_updated_messages', $plugin_admin_cpt, 'aoh_updated_messages', 10, 2 );
		$this->loader->add_filter( 'aoh_blocks_posts_columns', $plugin_admin_cpt, 'aoh_admin_column' );
		$this->loader->add_action( 'aoh_blocks_posts_custom_column', $plugin_admin_cpt, 'aoh_admin_field', 10, 2 );
		$this->loader->add_action( 'admin_menu', $plugin_admin_cpt, 'aoh_help_admin_submenu', 15 );
		$this->loader->add_filter( 'plugin_action_links', $plugin_admin_cpt, 'aoh_add_action_plugin', 10, 5 );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new AOH_Author_On_Hover_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		$plugin_public_display = new AOH_Author_On_Hover_Public_Display( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_filter( 'the_content', $plugin_public_display, 'aoh_add_to_content', 20 );

		// Plugin Shortcode.
		$plugin_shortcode = new AOH_Shortcode_Public_Display( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'aoh_action_tag_for_shortcode', $plugin_shortcode, 'aoh_shortcode_execute' );
		add_shortcode( 'aoh_profile_card', array( $plugin_shortcode, 'aoh_shortcode_execute' ) );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    AOH_Author_On_Hover_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
