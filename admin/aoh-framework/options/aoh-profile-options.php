<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$aoh_prefix = '_aoh_profile_options';

//
// Create profile options
//
AOH::createProfileOptions(
	$aoh_prefix,
	array(
		'data_type' => 'serialize',
	)
);

//
// Create a section
//
AOH::createSection(
	$aoh_prefix,
	array(
		'title'  => 'Custom Profile Options :',
		'fields' => array(

			array(
				'id'       => 'aoh_profile_img_from',
				'type'     => 'button_set',
				'title'    => __( 'Author Profile Picture From', 'author-on-hover' ),
				'before'   => '<span id="aoh-targeted-to-scroll"></span>',
				'subtitle' => __( 'Set the author profile picture image source from.', 'author-on-hover' ),
				'options'  => array(
					'default'       => 'Default',
					'media_library' => 'Media Library',
				),
				'default'  => 'default',
			),
			array(
				'id'         => 'aoh_profile_img',
				'type'       => 'media',
				'title'      => __( 'Set The Image.', 'author-on-hover' ),
				'subtitle'   => __( 'Set the author profile picture image from media library.<br>Maximum Width and Height is 60x60', 'author-on-hover' ),
				'library'    => 'image',
				'url'        => false,
				'dependency' => array( 'aoh_profile_img_from', '==', 'media_library' ),
			),

			array(
				'id'       => 'aoh_auth_name_from',
				'type'     => 'button_set',
				'title'    => __( 'Author Name From', 'author-on-hover' ),
				'subtitle' => __( 'Set the author name from.', 'author-on-hover' ),
				'options'  => array(
					'default' => 'Default',
					'custom'  => 'Custom',
				),
				'default'  => 'default',
			),
			array(
				'id'         => 'aoh_auth_name',
				'type'       => 'text',
				'title'      => __( 'Author Name', 'author-on-hover' ),
				'subtitle'   => __( 'Set an custom author name.', 'author-on-hover' ),
				'dependency' => array( 'aoh_auth_name_from', '==', 'custom' ),
			),

			array(
				'id'            => 'aoh_auth_designation',
				'type'          => 'wp_editor',
				'title'         => __( 'Author Designation', 'author-on-hover' ),
				'subtitle'      => __( 'Set author designation.', 'author-on-hover' ),
				'media_buttons' => false,
				'height'        => '50px',
				'tinymce'       => false,
				'default'       => 'UX/UI Designer at - <a href="https://www.adobe.com/" target="_blank">Adobe</a>',
			),

			array(
				'id'       => 'aoh_auth_bio_from',
				'type'     => 'button_set',
				'title'    => __( 'Author Bio From', 'author-on-hover' ),
				'subtitle' => __( 'Set the author bio from.', 'author-on-hover' ),
				'options'  => array(
					'default' => 'Default',
					'custom'  => 'Custom',
				),
				'default'  => 'default',
			),
			array(
				'id'         => 'aoh_auth_bio',
				'type'       => 'wp_editor',
				'title'      => __( 'Author Bio', 'author-on-hover' ),
				'subtitle'   => __( 'Set custom author bio.', 'author-on-hover' ),
				'dependency' => array( 'aoh_auth_bio_from', '==', 'custom' ),
			),

			array(
				'id'       => 'aoh_auth_bio_limit_count',
				'type'     => 'number',
				'title'    => __( 'Author Bio Word Limit', 'author-on-hover' ),
				'subtitle' => __( 'Set word limit of the author bio.', 'author-on-hover' ),
				'default'  => 25,
			),

			array(
				'id'       => 'aoh_socials',
				'type'     => 'repeater',
				'title'    => __( 'Author Socials', 'author-on-hover' ),
				'subtitle' => __( 'Set author socials and links.', 'author-on-hover' ),
				'fields'   => array(

					array(
						'id'   => 'aoh_social_icon',
						'type' => 'icon',
					),

					array(
						'id'   => 'aoh_social_link',
						'type' => 'text',
					),

				),
				'default'  => array(
					array(
						'aoh_social_icon' => 'fas fa-globe',
						'aoh_social_link' => 'https://google.com/',
					),
					array(
						'aoh_social_icon' => 'fa fa-twitter',
						'aoh_social_link' => 'https://twitter.com/Google/',
					),
				),
			),

		),
	)
);
