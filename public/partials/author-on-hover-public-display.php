<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://forhad.net/
 * @since      1.0.0
 *
 * @package    AOH_Author_On_Hover
 * @subpackage AOH_Author_On_Hover/public/partials
 */

/**
 * This file should primarily consist of HTML with a little bit of PHP.
 *
 * @package    AOH_Author_On_Hover
 * @subpackage AOH_Author_On_Hover/public
 * @author     Forhad Hossain <need@forhad.net>
 */
class AOH_Author_On_Hover_Public_Display {

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
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	public function aoh_add_to_content( $aoh_content ) {

		if ( is_singular( 'post' ) ) {

			$aoh_user_id            = get_the_author_meta( 'ID' );
			$aoh_user_meta          = get_user_meta( $aoh_user_id, '_aoh_profile_options', true );
			$aoh_img_from           = isset( $aoh_user_meta['aoh_profile_img_from'] ) ? $aoh_user_meta['aoh_profile_img_from'] : '';
			$aoh_profile_pic_url    = isset( $aoh_user_meta['aoh_profile_img']['url'] ) ? $aoh_user_meta['aoh_profile_img']['url'] : '';
			$aoh_profile_pic_alt    = isset( $aoh_user_meta['aoh_profile_img']['alt'] ) ? $aoh_user_meta['aoh_profile_img']['alt'] : '';
			$aoh_auth_name_from     = isset( $aoh_user_meta['aoh_auth_name_from'] ) ? $aoh_user_meta['aoh_auth_name_from'] : '';
			$aoh_get_author_link    = get_author_posts_url( $aoh_user_id );
			$aoh_get_author_name    = get_the_author_meta( 'display_name' );
			$aoh_auth_name_custom   = isset( $aoh_user_meta['aoh_auth_name'] ) ? $aoh_user_meta['aoh_auth_name'] : '';
			$aoh_auth_designation   = isset( $aoh_user_meta['aoh_auth_designation'] ) ? $aoh_user_meta['aoh_auth_designation'] : '';
			$aoh_auth_bio_from      = isset( $aoh_user_meta['aoh_auth_bio_from'] ) ? $aoh_user_meta['aoh_auth_bio_from'] : '';
			$aoh_bio_limit_count    = isset( $aoh_user_meta['aoh_auth_bio_limit_count'] ) ? $aoh_user_meta['aoh_auth_bio_limit_count'] : '';
			$aoh_auth_bio_more_link = '...<a href="' . $aoh_get_author_link . '">Read more</a>';
			$aoh_auth_bio_custom    = isset( $aoh_user_meta['aoh_auth_bio'] ) ? $aoh_user_meta['aoh_auth_bio'] : '';
			$aoh_bio_desc_trimed    = wp_trim_words( get_the_author_meta( 'description' ), $aoh_bio_limit_count, $aoh_auth_bio_more_link );
			$aoh_bio_custom_trimed  = wp_trim_words( $aoh_auth_bio_custom, $aoh_bio_limit_count, '...' );

			/**
			 * Global Options.
			 */
			$aoh_global_options     = get_option( '_aoh_options' );
			$aoh_on_hover_show      = isset( $aoh_global_options['aoh_on_hover_show'] ) ? $aoh_global_options['aoh_on_hover_show'] : '';
			$aoh_after_content_show = isset( $aoh_global_options['aoh_after_content_show'] ) ? $aoh_global_options['aoh_after_content_show'] : '';
			$aoh_code_editor_css    = isset( $aoh_global_options['aoh_code_editor_css'] ) ? $aoh_global_options['aoh_code_editor_css'] : '';
			$aoh_fitting_show       = isset( $aoh_global_options['aoh_fitting_show'] ) ? $aoh_global_options['aoh_fitting_show'] : 'false';
			$aoh_posts_show         = isset( $aoh_global_options['aoh_after_content_posts_show'] ) ? $aoh_global_options['aoh_after_content_posts_show'] : 'false';

			/**
			 * Multiple Author Options.
			 */
			$aoh_meta                = get_post_meta( get_the_ID(), 'aoh_post_options', true );
			$aoh_has_multiple_author = isset( $aoh_meta['aoh-has-multiple-author'] ) ? $aoh_meta['aoh-has-multiple-author'] : '';
			$aoh_authors             = isset( $aoh_meta['aoh-multiple-author-select'] ) ? $aoh_meta['aoh-multiple-author-select'] : '';

			/**
			 * Display Rendaring..
			 */
			if ( $aoh_on_hover_show ) :

				if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {

					echo '<style>.aoh--admin-edit {display: flex;justify-content: end;align-items: center;gap: 5px;margin-top: 10px;color: #cd1d10 !IMPORTANT;font-size: 16px;line-height: 22px;}.aoh--admin-edit svg {width: 16px;height: 16px;fill: #f44336;}</style>';
				}
				?>
				<div id="frhd--auth-wrap" data-fitting="<?php echo esc_attr( $aoh_fitting_show ); ?>">
					<span class="frhd--auth-inner">
						<div class="frhd--auth-meta">
							<div class="frhd--auth-left">
							<?php
							if ( 'media_library' === $aoh_img_from ) {

								echo '<img width="90" height="90" src="' . esc_url( $aoh_profile_pic_url ) . '" alt="' . esc_attr( $aoh_profile_pic_alt ) . '">';
							} else {

								echo get_avatar( $aoh_user_id, 90 );
							}
							?>
							</div> 
							<div class="frhd--auth-right">
								<h5>
								<?php
								if ( 'default' === $aoh_auth_name_from ) {

									echo '<a href="' . esc_url( $aoh_get_author_link ) . '">' . esc_html( $aoh_get_author_name ) . '</a>';
								} else {

									echo esc_html( $aoh_auth_name_custom );
								}
								?>
								</h5>
								<?php
								if ( ! empty( $aoh_auth_designation ) ) {

									echo '<span class="frhdaf__aoh-designation">' . wp_kses_post( $aoh_auth_designation ) . '</span>';
								}
								?>
								<div class="frhd--auth-social">
									<?php
									if ( ! empty( $aoh_user_meta['aoh_socials'] ) ) {

										foreach ( $aoh_user_meta['aoh_socials'] as $frhd_socials ) {

											echo '<a href="' . esc_url( $frhd_socials['aoh_social_link'] ) . '" target="_blank" class=""><i class="' . esc_attr( $frhd_socials['aoh_social_icon'] ) . '"></i></a>';
										}
									}
									?>
								</div>
							</div>
						</div>
						<p>
						<?php
						if ( 'default' === $aoh_auth_bio_from ) {

							echo wp_kses_post( $aoh_bio_desc_trimed );
						} else {

							echo wp_kses_post( $aoh_bio_custom_trimed );
						}
						?>
						</p>
					</span>
					<?php if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) : ?>
					<a href="<?php echo esc_url( get_edit_user_link( $aoh_user_id ) . '/#aoh-targeted-to-scroll' ); ?>" target="_blank" class="aoh--admin-edit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/></svg> Edit</a>
					<?php endif; ?>
				</div>
				<?php
			endif; // iF aoh_on_hover_show.

			/**
			 * Show multiple Authors.
			 */
			if ( $aoh_has_multiple_author ) {

				echo '<style>
				.aoh-multi-author-list {
					display: inline-flex;
					gap: 20px;
					flex-wrap: wrap;
					margin-bottom: 20px;
				}
				.aoh-multi-author-single {
					position: relative;
					max-width: 300px;
					background: #ffffff;
					padding: 10px;
					display: flex;
					align-items: center;
					gap: 20px;
					box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 1px 1px;
				}
				.aoh-multi-author-info {
					display: flex;
					flex-direction: column;
					font-size: 15px;
    				line-height: 21px;
				}
				.aoh-multi-author-info a {
					text-decoration: none !important;
				}
				figure.aoh-multi-author-img {
					box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;
				}
				span.aoh-multi-author-info > a {
					font-weight: bold;
				}
				</style>';
				echo '<div class="aoh-multi-author-list">';
				foreach ( $aoh_authors as $aoh_author_key => $aoh_author_id ) {

					echo '<div class="aoh-multi-author-single">';

					$aoh_get_auth_meta = get_user_meta( $aoh_author_id, '_aoh_profile_options', true );

					echo '<figure class="aoh-multi-author-img">';
					if ( 'media_library' === $aoh_get_auth_meta['aoh_profile_img_from'] ) {

						echo '<img width="50" height="50" src="' . esc_url( $aoh_get_auth_meta['aoh_profile_img']['url'] ) . '" alt="' . esc_attr( $aoh_get_auth_meta['aoh_profile_img']['alt'] ) . '">';
					} else {

						echo get_avatar( $aoh_author_id, 50 );
					}
					echo '</figure>';

					echo '<span class="aoh-multi-author-info">';
					if ( 'default' === $aoh_get_auth_meta['aoh_auth_name_from'] ) {

						echo '<a href="' . esc_url( get_author_posts_url( $aoh_author_id ) ) . '">' . esc_html( get_user_by( 'id', $aoh_author_id )->display_name ) . '</a>';
					} else {

						echo esc_html( $aoh_get_auth_meta['aoh_auth_name'] );
					}

					echo '<span class="aoh-multi-author-designation">';
					echo $aoh_get_auth_meta['aoh_auth_designation'] ? wp_kses_post( $aoh_get_auth_meta['aoh_auth_designation'] ) : '';
					echo '</span>';

					if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {

						echo '<a title="Edit" style="position: absolute;right: -5px;bottom: -10px;background: red;padding: 4px;border-radius: 50px;" href="' . esc_url( get_site_url() . '/wp-admin/user-edit.php?user_id=' . $aoh_author_id . '/#aoh-targeted-to-scroll' ) . '" target="_blank" class="aoh--admin-edit"><svg style="fill: #fff;width: 14px;height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/></svg></a>';
					}

					echo '</span>';

					echo '</div>';
				}
				echo '</div>';
			}

			if ( $aoh_after_content_show ) {

				/**
				 * Author shows after content.
				 */
				$aoh_content .= '<div class="frhdaf__aoh-wrapper">
					<div class="frhdaf__aoh-top">
						<div class="frhdaf__aoh-top-left">';

				if ( 'media_library' === $aoh_img_from ) {

					$aoh_content .= '<img width="110" height="110" src="' . esc_url( $aoh_profile_pic_url ) . '" alt="' . $aoh_profile_pic_alt . '">';
				} else {

					$aoh_content .= get_avatar( $aoh_user_id, 110 );
				}

				$aoh_content .= '</div>';

				$aoh_content .= '<div class="frhdaf__aoh-top-right">
					<span class="frhdaf__aoh-name">';

				if ( 'default' === $aoh_auth_name_from ) {

					$aoh_content .= '<a href="' . esc_url( $aoh_get_author_link ) . '">' . esc_html( $aoh_get_author_name ) . '</a>';
				} else {

					$aoh_content .= esc_html( $aoh_auth_name_custom );
				}

				$aoh_content .= '</span>';

				if ( ! empty( $aoh_auth_designation ) ) {

					$aoh_content .= '<span class="frhdaf__aoh-designation">' . wp_kses_post( $aoh_auth_designation ) . '</span>';
				}

				$aoh_content .= '<div class="frhdaf__aoh-social">';

				if ( ! empty( $aoh_user_meta['aoh_socials'] ) ) {

					foreach ( $aoh_user_meta['aoh_socials'] as $frhd_socials ) {

						$aoh_content .= '<a href="' . esc_url( $frhd_socials['aoh_social_link'] ) . '" target="_blank" class=""><i class="' . esc_attr( $frhd_socials['aoh_social_icon'] ) . '"></i></a>';
					}
				}

				$aoh_content .= '</div></div>';

				$aoh_content .= '</div>
					<div class="frhdaf__aoh-bottom">';

				$aoh_content .= '<div class="frhdaf__aoh-bio"><p>';

				if ( 'default' === $aoh_auth_bio_from ) {

					$aoh_content .= wp_kses_post( get_the_author_meta( 'description' ) );
				} else {

					$aoh_content .= wp_kses_post( $aoh_auth_bio_custom );
				}

				$aoh_content .= '</p>';

				if ( $aoh_posts_show ) {

					$aoh_content .= '<ul class="frhd__auth-posts">';

					if ( 'default' === $aoh_auth_name_from ) {

						$aoh_content .= '<strong>Latest Posts by ' . esc_html( $aoh_get_author_name ) . '</strong>';
					} else {

						$aoh_content .= '<strong>Latest Posts by ' . esc_html( $aoh_auth_name_custom ) . '</strong>';
					}

					$aoh_args = array(
						'author'         => $aoh_user_id,
						'posts_per_page' => 3,
						'post__not_in'   => array( get_the_ID() ),
					);

					$query = new WP_Query( $aoh_args );

					if ( $query->have_posts() ) {

						while ( $query->have_posts() ) {

							$query->the_post();

							$aoh_content .= '<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <h3><a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></h3> - <time datetime="' . get_the_date( 'c' ) . '" itemprop="datePublished">' . get_the_date() . '</time></li>';
						}
					}

					wp_reset_postdata();

					$aoh_content .= '<a href="' . esc_url( get_author_posts_url( $aoh_user_id ) ) . '" target="_blank" class="frhdaf__auth-posts"><i class="fa fa-external-link"></i> All Posts</a>';

					$aoh_content .= '</ul>';
				} else {

					$aoh_content .= '<a href="' . esc_url( get_author_posts_url( $aoh_user_id ) ) . '" target="_blank" class="frhdaf__auth-posts"><i class="fa fa-external-link"></i> More Posts</a>';
				}

				$aoh_content .= '</div>
					</div>';

				if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {

					$aoh_content .= '<a href="' . esc_url( get_edit_user_link( $aoh_user_id ) . '/#aoh-targeted-to-scroll' ) . '" target="_blank" class="aoh--admin-edit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/></svg> Edit</a>';
				}

				$aoh_content .= '</div>';
			}

			if ( ! empty( $aoh_code_editor_css ) ) {

				echo '<style>' . $aoh_code_editor_css . '</style>';
			}
		} // if ( is_singular( 'post' ) ).

		return $aoh_content;

	}

}
