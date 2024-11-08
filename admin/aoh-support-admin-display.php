<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://pluginic.com/
 * @since      1.0.0
 *
 * @package    WPAS_Editorial_Rating
 * @subpackage WPAS_Editorial_Rating/admin/partials
 */

// wp_enqueue_style( 'wpas-getting-started', esc_url( HFC_DIR_URL_FILE . 'header-footer-customizer/admin/css/wpas-main-page.css' ), array(), HEADER_FOOTER_CUSTOMIZER_VERSION );
?>
<style>
.menu-icon-hfc_blocks .wp-menu-name {
	color: #ffeb3b;
	font-weight: bold;
}

#wpbody-content > *:not(.wpas-option-body) {display: none;}
.wpas-option-body p {
	font-size: 16px;
	margin: 2px;
}
.wpas-option-body {
	position: relative;
	max-width: calc( 100% + 20px);
	display: block;
	margin-left: -20px;
}
.wpas-setting-header {
	padding: 30px 40px;
	margin-bottom: 20px;
	box-sizing: border-box;
	background-image: linear-gradient(240.75deg,#e9def0 -7.54%,#fcfdfd 55.54%,#dde8fc 101.81%);
	border-bottom: 1px solid #dedede;
}
.wpas-setting-header-info {
	display: flex;
	justify-content: center;
	align-items: center;
	gap: 30px;
}
.wpas-setting-header-info h1 {
	font-size: 37px;
	font-weight: bold;
}
#wpas-plugin-version {
	display: inline-block;
	font-size: 14px;
	padding: 2px 0;
	background: #FF0000;
	color: #fff;
	margin-left: 7px;
	border-radius: 50px;
	width: 54px;
	text-align: center;
}
.wpas-container-wrap {
	max-width: 1200px;
	margin: 0 auto;
}
.wpas-container-hero {
	display: flex;
	justify-content: center;
	gap: 25px;
}
.wpas-hero-video,
.wpas-hero-upgrade,
.wpas-testimonial,
.wpas-review {
	padding: 20px;
	background: #fff;
	box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
}
.wpas-hero-video {flex-basis: 70%;}
.wpas-container-ad {flex-basis: 30%;}
.wpas-hero-buttons a {
	display: inline-block;
	text-decoration: none;
	padding: 20px 10px;
	border-radius: 3px;
	background: #f44336;
	font-size: 17px;
	font-weight: bold;
	color: #fff;
	width: 100%;
	text-align: center;
	transition: .3s;
}
.wpas-hero-buttons a:hover {
	background: #2c3338;
}
.wpas-hero-buttons {
	display: flex;
	justify-content: space-evenly;
	gap: 20px;
	margin-top: 10px;
}
.wpas-hero-upgrade h2 span:before {
	color: #FF007A;
	font-size: 58px;
	line-height: 20px;
	filter: drop-shadow(0px 0px 0px black);
}
.wpas-hero-upgrade h2 span {
	padding-right: 44px;
}
.wpas-hero-upgrade h2 {
	font-size: 42px;
	font-weight: bold;
}
.wpas-container-ad img {
	display: block;
	width: 100%;
	height: auto;
	transition: .3s;
}
@media (min-width: 960px) {
	.wpas-container-ad:hover img {
		transform: translateY(-45px) scale(1.2);
	}
	.wpas-container-ad {
		overflow: hidden;
	}
}

/* Feature list */
.wpas-hero-upgrade li {
	color: #000;
	background: rgb(231 231 231 / 50%);
	padding: 6px 28px 10px;
	font-size: 19px;
	line-height: 26px;
	position: relative;
	margin-bottom: 13px;
	text-shadow: 0 1px 0 rgb(1 108 82 / 50%);
}
.wpas-hero-upgrade li:before {
	position: absolute;
	left: -7px;
	top: 8px;
	width: 30px;
	height: 30px;
	content: "";
	background-repeat: no-repeat;
	background-size: cover;
	background-image: url("data:image/svg+xml,%3Csvg fill='darkgreen' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' viewBox='0 0 700 700'%3E%3Cg%3E%3Cpath d='m283.89 373.55s0-108.52-104.79-134.72l78.59-48.66 67.367 82.336s157.18-145.95 209.57-149.7c0 0 48.652 11.234 67.355 52.398 0.011719 0-187.1 52.395-318.1 198.34z'/%3E%3Cpath d='m457.26 126.97v-26.602h-359.27v359.27h359.27l-0.003906-186.99c-19.504 11.43-39.699 24.652-59.871 39.387v87.707h-239.52v-239.51h239.52v10.434c19.672-15.57 40.195-30.836 59.867-43.699z'/%3E%3Cuse x='70' y='644' xlink:href='%23w'/%3E%3Cuse x='90.550781' y='644' xlink:href='%23d'/%3E%3Cuse x='104.359375' y='644' xlink:href='%23b'/%3E%3Cuse x='123.347656' y='644' xlink:href='%23a'/%3E%3Cuse x='142.242188' y='644' xlink:href='%23c'/%3E%3Cuse x='155.628906' y='644' xlink:href='%23b'/%3E%3Cuse x='174.617188' y='644' xlink:href='%23o'/%3E%3Cuse x='204.410156' y='644' xlink:href='%23n'/%3E%3Cuse x='224.453125' y='644' xlink:href='%23m'/%3E%3Cuse x='252.453125' y='644' xlink:href='%23l'/%3E%3Cuse x='272.726562' y='644' xlink:href='%23a'/%3E%3Cuse x='291.621094' y='644' xlink:href='%23k'/%3E%3Cuse x='320.796875' y='644' xlink:href='%23f'/%3E%3Cuse x='330.394531' y='644' xlink:href='%23j'/%3E%3Cuse x='350.328125' y='644' xlink:href='%23f'/%3E%3Cuse x='369.671875' y='644' xlink:href='%23v'/%3E%3Cuse x='391.34375' y='644' xlink:href='%23i'/%3E%3Cuse x='411.277344' y='644' xlink:href='%23h'/%3E%3Cuse x='420.875' y='644' xlink:href='%23g'/%3E%3Cuse x='440.808594' y='644' xlink:href='%23u'/%3E%3Cuse x='466.675781' y='644' xlink:href='%23a'/%3E%3Cuse x='485.570312' y='644' xlink:href='%23h'/%3E%3Cuse x='495.167969' y='644' xlink:href='%23f'/%3E%3Cuse x='504.765625' y='644' xlink:href='%23a'/%3E%3Cuse x='70' y='672' xlink:href='%23t'/%3E%3Cuse x='82.183594' y='672' xlink:href='%23d'/%3E%3Cuse x='95.992188' y='672' xlink:href='%23e'/%3E%3Cuse x='115.226562' y='672' xlink:href='%23k'/%3E%3Cuse x='154.152344' y='672' xlink:href='%23c'/%3E%3Cuse x='167.535156' y='672' xlink:href='%23i'/%3E%3Cuse x='187.46875' y='672' xlink:href='%23b'/%3E%3Cuse x='216.207031' y='672' xlink:href='%23s'/%3E%3Cuse x='239.640625' y='672' xlink:href='%23e'/%3E%3Cuse x='258.878906' y='672' xlink:href='%23g'/%3E%3Cuse x='278.8125' y='672' xlink:href='%23j'/%3E%3Cuse x='308.492188' y='672' xlink:href='%23r'/%3E%3Cuse x='329.015625' y='672' xlink:href='%23d'/%3E%3Cuse x='342.820312' y='672' xlink:href='%23e'/%3E%3Cuse x='362.058594' y='672' xlink:href='%23q'/%3E%3Cuse x='371.65625' y='672' xlink:href='%23b'/%3E%3Cuse x='390.648438' y='672' xlink:href='%23p'/%3E%3Cuse x='407.242188' y='672' xlink:href='%23c'/%3E%3C/g%3E%3C/svg%3E");
}
.wpas-hero-upgrade {
	position: relative;
	background: rgb(245 255 246 / 50%);
	border: 20px solid #fff;
}
a.wpas-hero-btn-pro {
	display: inline-block;
	margin-top: 5px;
	text-decoration: none;
	background: #e91e63;
	padding: 16px 24px 18px;
	border-radius: 4px;
	color: #fff;
	font-size: 19px;
	font-weight: bold;
	box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
	text-shadow: 1px 1px 8px rgb(0 0 0 / 50%);
	border: 1px solid transparent;
	transition: .3s;
}
a.wpas-hero-btn-pro:hover {
	box-shadow: rgb(0 0 0 / 44%) 0px 3px 8px;
}
a.wpas-hero-btn-pro span {
	transition: .3s;
}
a.wpas-hero-btn-pro:hover span {
	display: inline-block;
	transform: translateX(6px);
}

.wpas-upgrade-feature-list {
	display: flex;
	gap: 30px;
}
.wpas-upgrade-feature-list ul {
	flex-basis: 100%;
	padding-left: 10px;
}

/* Testimonials */
.wpas-testimonial-stars:before {
	position: absolute;
	left: 22px;
	top: 30px;
	width: 91px;
	height: 17px;
	content: "";
	background-image: url("<?php echo esc_url( AOH_DIR_URL_FILE . 'admin/img/star-icon.svg' ); ?>");
	background-repeat-x: repeat;
	background-repeat-y: no-repeat;
}
.wpas-testimonial-column {
	position: relative;
	flex-basis: calc(50% - 62px);
	border: 1px solid rgb(103 58 183 / 15%);
	background: rgb(103 58 183 / 5%);
	padding: 25px;
	padding-top: 50px;
}
.wpas-testimonial-columns {
	display: flex;
	flex-wrap: wrap;
	gap: 20px;
}

.wpas-testimonial-client {
	display: flex;
	justify-content: left;
	align-items: center;
	gap: 15px;
}

.wpas-testimonial-client-ghost p {
}

.wpas-testimonial-client-ghost h4 {
	font-size: 17px;
	font-weight: bold;
	line-height: 20px;
	margin: 0;
}

.wpas-testimonial-client img {
	border-radius: 10px;border: 1px solid rgb(158 158 158 / 50%);
	box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}

/* Responsive */
@media (max-width: 960px) {
	.wpas-container-hero,
	.wpas-upgrade-feature-list {flex-wrap: wrap;}
	.wpas-hero-video {flex-basis: 100%;}
	.wpas-container-ad {flex-basis: 100%;}
}

/* Remove Footer */
#wpfooter {
	display: none !important;
}
</style>
<div class="wpas-option-body">
	<div class="wpas-setting-header">
		<div class="wpas-setting-header-info">
			<img src="<?php echo esc_url( AOH_DIR_URL_FILE . 'admin/img/icon-128x128.gif' ); ?>" alt="Author Bio on Hover">
			<div class="wpas-plugin-about">
				<h1>Author Bio on Hover<sup id="wpas-plugin-version"><?php echo esc_html( AOH_AUTHOR_ON_HOVER_VERSION ); ?></sup></h1>
				<p>Thank you for installing.</p>
				<p>Most Powerful &amp; Advanced Plugin!</p>
			</div>
		</div>
	</div>

	<div class="wpas-container-wrap">
		<div class="wpas-container-overview">
			<div class="wpas-container-hero">
				<div class="wpas-hero-video">
					<iframe width="100%" height="400" src="https://www.youtube.com/embed/JiobmUra0tU" title="Author Bio on Hover" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<div class="wpas-hero-buttons">
						<a href="<?php echo esc_url( get_admin_url() . 'post-new.php?post_type=aoh_opt_page' ); ?>" target="_blank">Add New Profile</a>
						<a href="#" target="_blank">Documentation</a>
						<a href="#" target="_blank">Live Demo</a>
					</div>
				</div>
				<div class="wpas-container-ad">
					<a href="https://pluginic.com/plugins/video-gallery-playlist/?ref=100" target="_blank">
						<picture>
							<source media="(max-width:960px)" srcset="<?php echo esc_url( AOH_DIR_URL_FILE . 'admin/img/banner-960x340.jpg' ); ?>">
							<img src="<?php echo esc_url( AOH_DIR_URL_FILE . 'admin/img/banner-340x510.jpg' ); ?>">
						</picture>
					</a>
				</div>
			</div>
		</div>
		<div class="wpas-spacer" style="height: 20px;"></div>
		<div class="wpas-hero-upgrade">
			<h2><span class="dashicons dashicons-superhero-alt"></span>Pro Feature List :</h2>
			<div class="wpas-upgrade-feature-list">
				<ul>
					<li>Author Bio on Hover on any post type.</li>
					<li>Fully responsive, SEO-friendly & optimized.</li>
					<li>Advanced Shortcode Generator.</li>
					<li>Individual Show/hide score on the post types.</li>
					<li>Rating Category.</li>
					<li>Multiple Functions on the same page.</li>
					<li>100+ Visual Customization options.</li>
					<li>Category-wise rating system.</li>
					<li>Show/hide the standard product contents (product name, image, etc.).</li>
				</ul>
				<ul>
					<li>Category-wise rating range bar.</li>
					<li>Image Function with internal and external links.</li>
					<li>Total score based on rating category.</li>
					<li>Show/hide image caption and description.</li>
					<li>Pros and Cons.</li>
					<li>Product links as a button.</li>
					<li>Author Bio on Hover on the sidebar.</li>
					<li>Author Bio on Hover Sidebar sticky.</li>
					<li>Different types of multipurpose layout.</li>
				</ul>
			</div>
			<a class="wpas-hero-btn-pro" href="https://pluginic.com/plugins/author-on-hover/?ref=100" target="_blank">Upgrade to Pro <span>→</span></a>
		</div>
		<div class="wpas-spacer" style="height: 20px;"></div>
		<div class="wpas-testimonial">
			<div class="wpas-testimonial-columns">
				<div class="wpas-testimonial-column">
					<span class="wpas-testimonial-stars"></span>
					<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“The plugin is not the most stylish or feature-packed, but it’s powerful, flexible, and quite simple.</p>
					<div class="wpas-testimonial-client">
						<img width="50" height="50" src="<?php echo esc_url( AOH_DIR_URL_FILE . 'admin/img/client-1.jpg' ); ?>">
						<div class="wpas-testimonial-client-ghost">
							<h4>Chelsea Head</h4>
							<p>Serial Entrepreneur</p>
						</div>
					</div>
				</div>
				<div class="wpas-testimonial-column">
					<span class="wpas-testimonial-stars"></span>
					<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“Suitable for all types of websites, large or small. Easy to set up and lots of documentation to help you.</p>
					<div class="wpas-testimonial-client">
						<img width="50" height="50" src="<?php echo esc_url( AOH_DIR_URL_FILE . 'admin/img/client-2.jpg' ); ?>">
						<div class="wpas-testimonial-client-ghost">
							<h4>Bert Mora</h4>
							<p>UI Developer</p>
						</div>
					</div>
				</div>
				<div class="wpas-testimonial-column">
					<span class="wpas-testimonial-stars"></span>
					<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“There’s no doubt it is a great plugin. I am using the free plan and am extremely happy with the results.</p>
					<div class="wpas-testimonial-client">
						<img width="50" height="50" src="<?php echo esc_url( AOH_DIR_URL_FILE . 'admin/img/client-3.jpg' ); ?>">
						<div class="wpas-testimonial-client-ghost">
							<h4>Carol Stokes</h4>
							<p>IT Specialist</p>
						</div>
					</div>
				</div>
				<div class="wpas-testimonial-column">
					<span class="wpas-testimonial-stars"></span>
					<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“The plugin met all my expectations! It’s easy to use and everything works as it should. I recommend it!</p>
					<div class="wpas-testimonial-client">
						<img width="50" height="50" src="<?php echo esc_url( AOH_DIR_URL_FILE . 'admin/img/client-4.jpg' ); ?>">
						<div class="wpas-testimonial-client-ghost">
							<h4>Roman Rybakov</h4>
							<p>Frontend Engineer</p>
						</div>
					</div>
				</div>
				<a href="https://wordpress.org/support/plugin/author-on-hover/reviews/?filter=5" target="_blank" style="margin: 0 auto;">See reviews from free users →</a>
			</div>
		</div>
	</div>
</div>
<?php
