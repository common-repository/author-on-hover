<?php
/**
 * Define the custom post type functionality.
 *
 * Loads and defines the custom post type for this plugin
 * so that it is ready for admin menu under a different post type.
 *
 * @link       https://forhad.net/
 * @since      2.0.0
 *
 * @package    AUTHOR_ON_HOVER
 * @subpackage AUTHOR_ON_HOVER/includes
 */

/**
 * Define the custom post type functionality.
 */
class AOH_Admin_CPT {

	/**
	 * The ID of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Settings page ID for the plugin settings.
	 */
	const PAGE_ID = 'aoh_opt_page';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Custom Post Type of the Plugin.
	 *
	 * @since    2.0.0
	 */
	public function aoh_post_type() {

		if ( post_type_exists( 'aoh_opt_page' ) ) {

			return;
		}

		$capability = apply_filters( 'aoh_opt_page_ui_permission', 'manage_options' );
		$show_ui    = current_user_can( $capability ) ? true : false;
		$labels     = apply_filters(
			self::PAGE_ID . '_post_type_labels',
			array(
				'name'               => esc_html_x( 'All Profiles', 'author-on-hover' ),
				'singular_name'      => esc_html_x( 'Profiles', 'author-on-hover' ),
				'add_new'            => esc_html__( '+ New Profile', 'author-on-hover' ),
				'add_new_item'       => esc_html__( 'Add New Profile', 'author-on-hover' ),
				'edit_item'          => esc_html__( 'Edit Profile', 'author-on-hover' ),
				'new_item'           => esc_html__( 'New Profile', 'author-on-hover' ),
				'view_item'          => esc_html__( 'View Profile', 'author-on-hover' ),
				'search_items'       => esc_html__( 'Search Profiles', 'author-on-hover' ),
				'not_found'          => esc_html__( 'No Profile found.', 'author-on-hover' ),
				'not_found_in_trash' => esc_html__( 'No Profile found in trash.', 'author-on-hover' ),
				'parent_item_colon'  => esc_html__( 'Parent Item:', 'author-on-hover' ),
				'menu_name'          => esc_html__( 'Author On Hover', 'author-on-hover' ),
				'all_items'          => esc_html__( 'All Profiles', 'author-on-hover' ),
			)
		);

		$args = apply_filters(
			self::PAGE_ID . '_post_type_args',
			array(
				'labels'              => $labels,
				'public'              => false,
				'hierarchical'        => false,
				'exclude_from_search' => true,
				'show_ui'             => $show_ui,
				'show_in_admin_bar'   => false,
				'menu_position'       => apply_filters( 'aoh_opt_page_menu_position', 70 ),
				'menu_icon'           => 'data:image/svg+xml;base64,' . base64_encode( '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="fill:rgba(240,246,252,.6);"><path d="M224 256c-70.7 0-128-57.3-128-128S153.3 0 224 0s128 57.3 128 128s-57.3 128-128 128zm-45.7 48h91.4c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-16.6 10.6-26.7 31.6-20 53.3c4 12.9 9.4 25.5 16.4 37.6s15.2 23.1 24.4 33c15.7 16.9 39.6 18.4 57.2 8.7v.9c0 9.2 2.7 18.5 7.9 26.3H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8v30.6c7.9 3.4 15.4 7.7 22.3 12.8l24.9-14.3c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-25 14.4c.4 4 .7 8.1 .7 12.3s-.2 8.2-.7 12.3l25 14.4c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-24.9-14.3c-6.9 5.1-14.3 9.4-22.3 12.8l0 30.6c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8V454.8c-8-3.4-15.6-7.7-22.5-12.9l-24.7 14.3c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l24.8-14.3c-.4-4.1-.7-8.2-.7-12.4s.2-8.3 .7-12.4L343.8 325c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l24.8 14.3c6.9-5.1 14.5-9.4 22.5-12.9V218.2zm92.1 133.5c0-26.5-21.5-48-48.1-48s-48.1 21.5-48.1 48s21.5 48 48.1 48s48.1-21.5 48.1-48z"/></svg>' ),
				'rewrite'             => false,
				'query_var'           => false,
				'imported'            => true,
				'supports'            => array( 'title' ),
			)
		);
		register_post_type( self::PAGE_ID, $args );

	}

	/**
	 * Change Reviews updated messages.
	 *
	 * @param string $messages The Update messages.
	 * @return statement
	 */
	public function aoh_updated_messages( $messages ) {
		global $post, $post_ID;
		$messages[ self::PAGE_ID ] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => sprintf( __( 'Review updated.', 'author-on-hover' ) ),
			2  => '',
			3  => '',
			4  => __( ' updated.', 'author-on-hover' ),
			5  => isset( $_GET['revision'] ) ? sprintf( esc_html( 'Review restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => sprintf( __( 'Review published.', 'author-on-hover' ) ),
			7  => __( 'Review saved.', 'author-on-hover' ),
			8  => sprintf( __( 'Review submitted.', 'author-on-hover' ) ),
			9  => sprintf( wp_kses_post( 'Review scheduled for: <strong>%1$s</strong>.', 'author-on-hover' ), date_i18n( __( 'M j, Y @ G:i', 'author-on-hover' ), strtotime( $post->post_date ) ) ),
			10 => sprintf( __( 'Review draft updated.', 'author-on-hover' ) ),
		);
		return $messages;
	}

	/**
	 * Add new custom columns.
	 *
	 * @param [type] $columns The columns.
	 * @return statement
	 */
	public function aoh_admin_column( $columns ) {
		return array(
			'cb'        => '<input type="checkbox" />',
			'title'     => __( 'Name', 'author-on-hover' ),
			'shortcode' => __( 'Shortcode', 'author-on-hover' ),
			'date'      => __( 'Date', 'author-on-hover' ),
		);
	}

	/**
	 * Display admin columns content.
	 *
	 * @param mix    $column The columns.
	 * @param string $post_id The post ID.
	 * @return void
	 */
	public function aoh_admin_field( $column, $post_id ) {
		switch ( $column ) {
			case 'shortcode':
				echo '<input title="Copy the Shortcode" style="width:180px;padding:2px 12px;color:#e91e63;text-align:center;cursor:copy;" type="text" onClick="this.select();" readonly="readonly" value="[aoh_opt_page id=&quot;' . esc_attr( $post_id ) . '&quot;]"/>';
				break;
			default:
				echo '';
		}
	}

	/**
	 * Admin help page
	 *
	 * @since    2.0.0
	 */
	public function aoh_help_admin_submenu() {
		add_submenu_page(
			'edit.php?post_type=' . self::PAGE_ID,
			__( 'Helper', 'author-on-hover' ),
			__( 'Helper', 'author-on-hover' ),
			'manage_options',
			'aoh_help',
			array( $this, 'aoh_help_callback' )
		);

		$wpgpyt_redirect_link = 'https://pluginic.com/plugins/author-on-hover/?ref=100';
		add_submenu_page(
			'edit.php?post_type=' . self::PAGE_ID,
			'',
			'<span style="display: flex;align-items: center;gap: 5px;color: #8bc34a;"><i class="dashicons dashicons-superhero-alt"></i> ' . esc_html__( 'Go Pro', 'post-block' ) . '</span>',
			'manage_options',
			$wpgpyt_redirect_link
		);
	}

	/**
	 * Admin help callback function
	 *
	 * @since    1.0.0
	 */
	public function aoh_help_callback() {

		include_once AOH_DIR_PATH_FILE . '/admin/aoh-support-admin-display.php';
	}

	/**
	 * Add action links.
	 *
	 * @param Array $actions Get all action links.
	 * @param Sting $plugin_file Get all plugin file paths.
	 * @return Array
	 */
	public function aoh_add_action_plugin( $actions, $plugin_file ) {

		static $plugin;

		if ( ! isset( $plugin ) ) {

			$plugin = AOH_BASE_FILE;
		}

		if ( $plugin == $plugin_file ) {

			$site_link = array( 'support' => '<a href="https://pluginic.com/support/?ref=100" target="_blank">Support</a>' );
			$settings  = array( 'settings' => '<a href="' . esc_url( get_admin_url() . 'edit.php?post_type=aoh_opt_page&page=aoh_help' ) . '">' . __( 'Get Started', 'General' ) . '</a>' );

			// Add link before Deactivate.
			$actions = array_merge( $site_link, $actions );
			$actions = array_merge( $settings, $actions );

			// Add link after Deactivate.
			$actions[] = '<a href="#">' . __( '<svg style="width: 14px;height: 14px;margin-bottom: -2px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="#4caf50" d="M35 19c0-2.062-.367-4.039-1.04-5.868-.46 5.389-3.333 8.157-6.335 6.868-2.812-1.208-.917-5.917-.777-8.164.236-3.809-.012-8.169-6.931-11.794 2.875 5.5.333 8.917-2.333 9.125-2.958.231-5.667-2.542-4.667-7.042-3.238 2.386-3.332 6.402-2.333 9 1.042 2.708-.042 4.958-2.583 5.208-2.84.28-4.418-3.041-2.963-8.333C2.52 10.965 1 14.805 1 19c0 9.389 7.611 17 17 17s17-7.611 17-17z"/><path fill="#cddc39" d="M28.394 23.999c.148 3.084-2.561 4.293-4.019 3.709-2.106-.843-1.541-2.291-2.083-5.291s-2.625-5.083-5.708-6c2.25 6.333-1.247 8.667-3.08 9.084-1.872.426-3.753-.001-3.968-4.007C7.352 23.668 6 26.676 6 30c0 .368.023.73.055 1.09C9.125 34.124 13.342 36 18 36s8.875-1.876 11.945-4.91c.032-.36.055-.722.055-1.09 0-2.187-.584-4.236-1.606-6.001z"/></svg><span style="font-weight: bold;color: #4caf50;"> Go Pro</span>', 'General' ) . '</a>';
		}

		return $actions;
	}

}
