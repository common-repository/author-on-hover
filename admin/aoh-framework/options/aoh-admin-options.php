<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$aoh_prefix = '_aoh_options';

//
// Create options
//
AOH::createOptions(
	$aoh_prefix,
	array(
		'menu_title'         => 'Settings',
		'menu_slug'          => 'aoh-settings',
		'menu_type'          => 'submenu',
		'menu_parent'        => 'edit.php?post_type=aoh_opt_page',
		'sticky_header'      => false,
		'show_bar_menu'      => false,
		'show_search'        => false,
		'show_network_menu'  => false,
		'show_reset_section' => false,
		'show_reset_all'     => false,
		'theme'              => 'light',
		'footer_credit'      => __( 'Giving a <a href="https://wordpress.org/plugins/" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> rating to this plugin.', 'header-footer-customizer' ),
		'class'              => 'aoh-setting-options',
	)
);

//
// Section : Global Settings.
//
AOH::createSection(
	$aoh_prefix,
	array(
		'title'  => 'Overview',
		'fields' => array(

			array(
				'id'       => 'aoh_on_hover_show',
				'type'     => 'switcher',
				'title'    => __( 'Author Shows on Hover', 'author-on-hover' ),
				'subtitle' => __( 'Turn on/off to show author on hover.', 'author-on-hover' ),
				'default'  => true,
			),

			array(
				'id'         => 'aoh_fitting_show',
				'type'       => 'switcher',
				'title'      => __( 'Fit With Meta on Hover', 'author-on-hover' ),
				'subtitle'   => __( 'Fit with post meta section on hover.', 'author-on-hover' ),
				'default'    => false,
				'dependency' => array( 'aoh_on_hover_show', '==', 'true' ),
			),

			array(
				'id'       => 'aoh_after_content_show',
				'type'     => 'switcher',
				'title'    => __( 'Author Shows After Content', 'author-on-hover' ),
				'subtitle' => __( 'Turn on/off to show author after content.', 'author-on-hover' ),
				'default'  => true,
			),

			array(
				'id'       => 'aoh_after_content_posts_show',
				'type'     => 'switcher',
				'title'    => __( 'Posts by Author After Content', 'author-on-hover' ),
				'subtitle' => __( 'Turn on/off to show author\'s posts.', 'author-on-hover' ),
				'default'  => true,
			),

			array(
				'id'       => 'aoh_code_editor_css',
				'type'     => 'code_editor',
				'title'    => __( 'Custom CSS', 'author-on-hover' ),
				'subtitle' => __( 'Write your custom CSS here. Styles will be applyed only on single post pages.', 'author-on-hover' ),
				'settings' => array(
					'theme' => 'mbo',
					'mode'  => 'css',
				),
			),

		),
	)
);
