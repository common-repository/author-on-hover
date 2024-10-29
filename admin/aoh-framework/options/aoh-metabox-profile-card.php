<?php
// Control core classes for avoid errors.
if ( class_exists( 'AOH' ) ) {

	//
	// Set a unique slug-like ID.
	$prefix = '_aoh_profile_card_options';

	//
	// Create a metabox.
	AOH::createMetabox(
		$prefix,
		array(
			'title'     => 'Author Profile Card',
			'post_type' => 'aoh_opt_page',
		)
	);

	//
	// Create a section.
	AOH::createSection(
		$prefix,
		array(
			'fields' => array(

				array(
					'id'             => 'aoh_card_profile_picture',
					'type'           => 'media',
					'title'          => 'Profile Picture',
					'subtitle'       => 'Upload a profile picture',
					'url'            => false,
					'preview_width'  => 100,
					'preview_height' => 100,
					'default'        => array(
						'url'       => AOH_DIR_URL_FILE . 'public/img/profile-pic.jpg',
						'thumbnail' => AOH_DIR_URL_FILE . 'public/img/profile-pic.jpg',
					),
					'class'          => 'aoh-media-preview',
				),
				array(
					'id'             => 'aoh_card_cover_photo',
					'type'           => 'media',
					'title'          => 'Cover Photo',
					'subtitle'       => 'Upload a cover photo',
					'url'            => false,
					'preview_width'  => 300,
					'preview_height' => 150,
					'default'        => array(
						'url'       => AOH_DIR_URL_FILE . 'public/img/cover-pic.jpg',
						'thumbnail' => AOH_DIR_URL_FILE . 'public/img/cover-pic.jpg',
					),
					'class'          => 'aoh-media-preview',
				),
				array(
					'id'       => 'aoh_card_profile_name',
					'type'     => 'text',
					'title'    => 'Name',
					'subtitle' => 'Write a name',
					'default'  => 'John Dou',
				),
				array(
					'id'            => 'aoh_card_profile_name',
					'type'          => 'wp_editor',
					'title'         => __( 'Name', 'author-on-hover' ),
					'subtitle'      => __( 'Write a name.', 'author-on-hover' ),
					'media_buttons' => false,
					'height'        => '50px',
					'tinymce'       => false,
					'default'       => 'Landon Hunt <sub>(Captain)</sub>',
				),
				array(
					'id'            => 'aoh_card_profile_designation',
					'type'          => 'wp_editor',
					'title'         => __( 'Designation', 'author-on-hover' ),
					'subtitle'      => __( 'Write a designation.', 'author-on-hover' ),
					'media_buttons' => false,
					'height'        => '50px',
					'tinymce'       => false,
					'default'       => 'Front-end Developer From <strong>Mospotamia,</strong> at - <a href="https://www.adobe.com/" target="_blank">Adobe</a>',
				),
				array(
					'id'            => 'aoh_card_profile_address',
					'type'          => 'wp_editor',
					'title'         => __( 'Address', 'author-on-hover' ),
					'subtitle'      => __( 'Write an address/location.', 'author-on-hover' ),
					'media_buttons' => false,
					'height'        => '50px',
					'tinymce'       => false,
					'default'       => 'Istanbul, Turkey',
				),
				array(
					'id'       => 'aoh_card_short_bio',
					'type'     => 'wp_editor',
					'title'    => __( 'Short Bio', 'author-on-hover' ),
					'subtitle' => __( 'Write a short bio.', 'author-on-hover' ),
					'default'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Quisque velit nisi, pretium ut lacinia in, elementum id enim.',
				),
				array(
					'id'       => 'aoh_card_socials',
					'type'     => 'repeater',
					'title'    => __( 'Socials', 'author-on-hover' ),
					'subtitle' => __( 'Set socials and links.', 'author-on-hover' ),
					'fields'   => array(
						array(
							'id'   => 'aoh_card_social_icon',
							'type' => 'icon',
						),

						array(
							'id'   => 'aoh_card_social_link',
							'type' => 'text',
						),
					),
					'default'  => array(
						array(
							'aoh_card_social_icon' => 'fas fa-globe',
							'aoh_card_social_link' => 'https://google.com/',
						),
						array(
							'aoh_card_social_icon' => 'fa fa-twitter',
							'aoh_card_social_link' => 'https://twitter.com/Google/',
						),
					),
				),
				array(
					'type'  => 'shortcode',
					'title' => 'Shortcode',
					'class' => 'wpgp--shortcode-field',
				),

			),
		)
	);

}
