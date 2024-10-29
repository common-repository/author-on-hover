<?php

/**
 * The public-facing display of the plugin.
 *
 * @link       https://forhad.net/
 * @since      1.0.0
 *
 * @package    AOH_Editorial_Rating
 * @subpackage AOH_Editorial_Rating/public
 */

/**
 * The public-facing display of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    AOH_Editorial_Rating
 * @subpackage AOH_Editorial_Rating/public
 * @author     Forhad Hossain <need@forhad.net>
 */
class AOH_Shortcode_Public_Display {

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

	/**
	 * A shortcode for this plugin.
	 *
	 * @since   2.0.0
	 * @param   string $atts attribute of this shortcode.
	 */
	public function aoh_shortcode_execute( $atts ) {

		$aoh_post_id = intval( $atts['id'] );

		$aohopt_profile_card_root        = get_post_meta( $aoh_post_id, '_aoh_profile_card_options', true );
		$aohopt_profile_picture          = isset( $aohopt_profile_card_root['aoh_card_profile_picture']['url'] ) ? $aohopt_profile_card_root['aoh_card_profile_picture']['url'] : '';
		$aohopt_card_cover_photo         = isset( $aohopt_profile_card_root['aoh_card_cover_photo']['url'] ) ? $aohopt_profile_card_root['aoh_card_cover_photo']['url'] : '';
		$aohopt_card_profile_name        = isset( $aohopt_profile_card_root['aoh_card_profile_name'] ) ? $aohopt_profile_card_root['aoh_card_profile_name'] : '';
		$aohopt_card_profile_designation = isset( $aohopt_profile_card_root['aoh_card_profile_designation'] ) ? $aohopt_profile_card_root['aoh_card_profile_designation'] : '';
		$aohopt_card_profile_address     = isset( $aohopt_profile_card_root['aoh_card_profile_address'] ) ? $aohopt_profile_card_root['aoh_card_profile_address'] : '';
		$aohopt_card_short_bio           = isset( $aohopt_profile_card_root['aoh_card_short_bio'] ) ? $aohopt_profile_card_root['aoh_card_short_bio'] : '';
		$aohopt_card_socials             = isset( $aohopt_profile_card_root['aoh_card_socials'] ) ? $aohopt_profile_card_root['aoh_card_socials'] : '';

		wp_enqueue_style( 'aoh-profile-card-fa5', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css', array(), '5.15.5', 'all' );

		ob_start();

		echo '<style>.frhd-profile-card-wrap {
			display: flex;
			flex-direction: column;
			flex-basis: 600px;
			max-width: 600px;
			margin: 0 auto;
			border: 1px solid silver;
			border-radius: 4px;
		}
		.frhd-profile-card-cover > img {
			max-width: 100%;
			height: auto;
		}
		.frhd-profile-card-cover {
			height: auto;
			max-height: 300px;
			overflow: hidden;
		}
		.frhd-profile-details {
			position: relative;
			padding: 90px 40px 40px;
		}
		img.frhd-profile-pic {
			position: absolute;
			left: 15%;
			top: -67px;
			max-width: 120px;
			border-radius: 50%;
			border: 1px solid #000;
			outline: 7px solid silver;
			transform: translate(-15%, 0%);
		}
		h5.frhd-profile-name {
			margin: 0 !important;
			padding-bottom: 20px;
			font-size: 22px;
			line-height: 32px;
			color: #0070c9;
		}
		h5.frhd-profile-name sub {
			font-size: 70%;
			bottom: 0 !important;
		}
		.frhd-profile-details address {
			margin-bottom: 20px;
		}
		p.frhd-profile-bio {
			margin: 0 !important;
			font-size: 16px;
			line-height: 20px;
		}
		.frhd-profile-socilas a {
			display: inline-block;
			color: #2196f3;
			border: 1px solid #2196f3;
			width: 32px;
			height: 31px;
			text-align: center;
			border-radius: 50%;
			font-size: 14px;
			line-height: 14px;
			transition: .3s;
			display: flex;
			justify-content: center;
			align-items: center;
			text-decoration: none !important;
		}
		.frhd-profile-socilas i.fa {
			font-family: "FontAwesome";
		}
		.frhd-profile-socilas {
			padding-top: 20px;
			display: flex;
			gap: 10px;
		}
		.frhd-profile-socilas a:hover {
			background: #2196f3;
			color: #fff;
		}</style>';
		echo '<div class="frhd-profile-card-wrap">
			<div class="frhd-profile-card-cover">
				<img src="' . esc_url( $aohopt_card_cover_photo ) . '" alt="Profile Card Cover Image">
			</div>
			<div class="frhd-profile-details">
				<img src="' . esc_url( $aohopt_profile_picture ) . '" alt="Profile Card - Profile Picture" class="frhd-profile-pic">
				<h5 class="frhd-profile-name">' . wp_kses_post( $aohopt_card_profile_name ) . '</h5>
				<span>' . wp_kses_post( $aohopt_card_profile_designation ) . '</span>
				<address><i class="fa fa-location-dot"></i> ' . wp_kses_post( $aohopt_card_profile_address ) . '</address>
				<p class="frhd-profile-bio">' . wp_kses_post( $aohopt_card_short_bio ) . '</p>';

				echo '<div class="frhd-profile-socilas">';

				foreach ( $aohopt_card_socials as $aohopt_card_social ) {

					echo '<a href="' . esc_url( $aohopt_card_social['aoh_card_social_link'] ) . '"><i class="' . esc_attr( $aohopt_card_social['aoh_card_social_icon'] ) . '"></i></a>';
				}

				echo '</div></div></div>';

				return ob_get_clean();
	}

}
