<?php
// Control core classes for avoid errors
if ( class_exists( 'AOH' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'aoh_post_options';

	//
	// Create a metabox
	AOH::createMetabox(
		$prefix,
		array(
			'title'     => 'Author Manager',
			'post_type' => 'post',
			'context'   => 'side',
			'priority'  => 'default',
		)
	);

	//
	// Create a section
	AOH::createSection(
		$prefix,
		array(
			'fields' => array(

				array(
					'id'    => 'aoh-has-multiple-author',
					'type'  => 'switcher',
					'title' => 'Active Multiple author',
				),

				array(
					'id'          => 'aoh-multiple-author-select',
					'type'        => 'select',
					'after'       => 'Select multiple authors to show before post content. Or <a href="' . get_site_url() . '/wp-admin/user-new.php" target="_blank">Add A New User</a>',
					'placeholder' => 'Select authors',
					'chosen'      => true,
					'ajax'        => true,
					'multiple'    => true,
					'sortable'    => true,
					'options'     => 'user',
					'dependency'  => array( 'aoh-has-multiple-author', '==', 'true' ),
				),

			),
		)
	);

}
