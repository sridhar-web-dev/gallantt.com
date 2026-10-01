<?php
require_once '../config/config.php';
$media        = new Media();
$mediaGallery = $media->getAllMediaWithLimit(3); // Assuming getAllMedia() fetches all records
	// Starting values
	$startDate = '2025-07-15';
	$startMeals = 2190000;
	$mealsPerDay = 2000;
	// Calculate days passed
	$today = date('Y-m-d');
	$daysPassed = floor((strtotime($today) - strtotime($startDate)) / (60 * 60 * 24));
	// Calculate current meals served
	$currentMeals = $startMeals + ($daysPassed * $mealsPerDay);
?>
<!DOCTYPE html>
<!-- saved from url=(0043)foundation.php -->
<html dir="ltr" lang="en-US" prefix="og: https://ogp.me/ns#">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title>Foundation - Gallantt Group of Industries</title>
	<style>
		img:is([sizes="auto" i], [sizes^="auto," i]) {
			contain-intrinsic-size: 3000px 1500px
		}
	</style>
<link href="<?php echo ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo ABS_URL ?>components/navbar/header.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link rel="stylesheet" href="<?php echo ABS_URL ?>assets/custom.css">
<link rel="stylesheet" href="<?php echo ABS_URL ?>assets/responsive.css">
	<!-- All in One SEO 4.7.4.2 - aioseo.com -->
	<meta name="description" content="&quot;Building a Better Tomorrow: Empowering Communities Through Action” - C.P. Agarwal Chairman &amp; Managing Director Foundation Gallantt Foundation: Building a Better Tomorrow At Gallantt, our belief in giving back to the community that supports us is at the core of who we are. Through the Gallantt Foundation, we aim to create lasting, positive change by">
	<meta name="robots" content="max-image-preview:large">
	<link rel="canonical" href="<?php echo ABS_URL ?>foundation">
	<meta name="generator" content="All in One SEO (AIOSEO) 4.7.4.2">
	<meta property="og:locale" content="en_US">
	<meta property="og:site_name" content="Gallantt Group of Industries - Gallantt Group of Industries">
	<meta property="og:type" content="article">
	<meta property="og:title" content="Foundation - Gallantt Group of Industries">
	<meta property="og:description" content="&quot;Building a Better Tomorrow: Empowering Communities Through Action” - C.P. Agarwal Chairman &amp; Managing Director Foundation Gallantt Foundation: Building a Better Tomorrow At Gallantt, our belief in giving back to the community that supports us is at the core of who we are. Through the Gallantt Foundation, we aim to create lasting, positive change by">
	<meta property="og:url" content="<?php echo ABS_URL ?>foundation">
	<meta property="og:image" content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
	<meta property="og:image:secure_url" content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="Foundation - Gallantt Group of Industries">
	<meta name="twitter:description" content="&quot;Building a Better Tomorrow: Empowering Communities Through Action” - C.P. Agarwal Chairman &amp; Managing Director Foundation Gallantt Foundation: Building a Better Tomorrow At Gallantt, our belief in giving back to the community that supports us is at the core of who we are. Through the Gallantt Foundation, we aim to create lasting, positive change by">
	<meta name="twitter:image" content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
	
	<!-- All in One SEO -->

	<link rel="alternate" type="application/rss+xml" title="Gallantt Group of Industries » Feed" href="<?php echo ABS_URL ?>feed/">
	<link rel="alternate" type="application/rss+xml" title="Gallantt Group of Industries » Comments Feed" href="<?php echo ABS_URL ?>comments/feed/">

	<style id="wp-emoji-styles-inline-css">
		img.wp-smiley,
		img.emoji {
			display: inline !important;
			border: none !important;
			box-shadow: none !important;
			height: 1em !important;
			width: 1em !important;
			margin: 0 0.07em !important;
			vertical-align: -0.1em !important;
			background: none !important;
			padding: 0 !important;
		}
	</style>
	<link rel="stylesheet" id="bplugins-plyrio-css" href="<?= ABS_URL ?>assets/foundation/h5vp.css" media="all">
	<link rel="stylesheet" id="html5-player-video-style-css" href="<?= ABS_URL ?>assets/foundation/frontend.css" media="all">
	  <style>
        .counter-box {
            font-size: 28px;
            font-weight: bold;
            color: #FFFFFF;
            padding: 20px;
            text-align: center;
			border: 1px solid #FFFFFF;
			margin-top: 15px;
        }
    </style>
	<style id="classic-theme-styles-inline-css">
		/*! This file is auto-generated */
		.wp-block-button__link {
			color: #fff;
			background-color: #32373c;
			border-radius: 9999px;
			box-shadow: none;
			text-decoration: none;
			padding: calc(.667em + 2px) calc(1.333em + 2px);
			font-size: 1.125em
		}

		.wp-block-file__button {
			background: #32373c;
			color: #fff;
			text-decoration: none
		}
	</style>
	<style id="global-styles-inline-css">
		:root {
			--wp--preset--aspect-ratio--square: 1;
			--wp--preset--aspect-ratio--4-3: 4/3;
			--wp--preset--aspect-ratio--3-4: 3/4;
			--wp--preset--aspect-ratio--3-2: 3/2;
			--wp--preset--aspect-ratio--2-3: 2/3;
			--wp--preset--aspect-ratio--16-9: 16/9;
			--wp--preset--aspect-ratio--9-16: 9/16;
			--wp--preset--color--black: #000000;
			--wp--preset--color--cyan-bluish-gray: #abb8c3;
			--wp--preset--color--white: #ffffff;
			--wp--preset--color--pale-pink: #f78da7;
			--wp--preset--color--vivid-red: #cf2e2e;
			--wp--preset--color--luminous-vivid-orange: #ff6900;
			--wp--preset--color--luminous-vivid-amber: #fcb900;
			--wp--preset--color--light-green-cyan: #7bdcb5;
			--wp--preset--color--vivid-green-cyan: #00d084;
			--wp--preset--color--pale-cyan-blue: #8ed1fc;
			--wp--preset--color--vivid-cyan-blue: #0693e3;
			--wp--preset--color--vivid-purple: #9b51e0;
			--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
			--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
			--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
			--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
			--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
			--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
			--wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
			--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
			--wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
			--wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
			--wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
			--wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
			--wp--preset--font-size--small: 13px;
			--wp--preset--font-size--medium: 20px;
			--wp--preset--font-size--large: 36px;
			--wp--preset--font-size--x-large: 42px;
			--wp--preset--spacing--20: 0.44rem;
			--wp--preset--spacing--30: 0.67rem;
			--wp--preset--spacing--40: 1rem;
			--wp--preset--spacing--50: 1.5rem;
			--wp--preset--spacing--60: 2.25rem;
			--wp--preset--spacing--70: 3.38rem;
			--wp--preset--spacing--80: 5.06rem;
			--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
			--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
			--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
			--wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
			--wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
		}

		:where(.is-layout-flex) {
			gap: 0.5em;
		}

		:where(.is-layout-grid) {
			gap: 0.5em;
		}

		body .is-layout-flex {
			display: flex;
		}

		.is-layout-flex {
			flex-wrap: wrap;
			align-items: center;
		}

		.is-layout-flex> :is(*, div) {
			margin: 0;
		}

		body .is-layout-grid {
			display: grid;
		}

		.is-layout-grid> :is(*, div) {
			margin: 0;
		}

		:where(.wp-block-columns.is-layout-flex) {
			gap: 2em;
		}

		:where(.wp-block-columns.is-layout-grid) {
			gap: 2em;
		}

		:where(.wp-block-post-template.is-layout-flex) {
			gap: 1.25em;
		}

		:where(.wp-block-post-template.is-layout-grid) {
			gap: 1.25em;
		}

		.has-black-color {
			color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-color {
			color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-color {
			color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-color {
			color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-color {
			color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-color {
			color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-color {
			color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-color {
			color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-color {
			color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-color {
			color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-color {
			color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-color {
			color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-black-background-color {
			background-color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-background-color {
			background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-background-color {
			background-color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-background-color {
			background-color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-background-color {
			background-color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-background-color {
			background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-background-color {
			background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-background-color {
			background-color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-background-color {
			background-color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-background-color {
			background-color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-background-color {
			background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-background-color {
			background-color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-black-border-color {
			border-color: var(--wp--preset--color--black) !important;
		}

		.has-cyan-bluish-gray-border-color {
			border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
		}

		.has-white-border-color {
			border-color: var(--wp--preset--color--white) !important;
		}

		.has-pale-pink-border-color {
			border-color: var(--wp--preset--color--pale-pink) !important;
		}

		.has-vivid-red-border-color {
			border-color: var(--wp--preset--color--vivid-red) !important;
		}

		.has-luminous-vivid-orange-border-color {
			border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-amber-border-color {
			border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
		}

		.has-light-green-cyan-border-color {
			border-color: var(--wp--preset--color--light-green-cyan) !important;
		}

		.has-vivid-green-cyan-border-color {
			border-color: var(--wp--preset--color--vivid-green-cyan) !important;
		}

		.has-pale-cyan-blue-border-color {
			border-color: var(--wp--preset--color--pale-cyan-blue) !important;
		}

		.has-vivid-cyan-blue-border-color {
			border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
		}

		.has-vivid-purple-border-color {
			border-color: var(--wp--preset--color--vivid-purple) !important;
		}

		.has-vivid-cyan-blue-to-vivid-purple-gradient-background {
			background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
		}

		.has-light-green-cyan-to-vivid-green-cyan-gradient-background {
			background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
		}

		.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
			background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
		}

		.has-luminous-vivid-orange-to-vivid-red-gradient-background {
			background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
		}

		.has-very-light-gray-to-cyan-bluish-gray-gradient-background {
			background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
		}

		.has-cool-to-warm-spectrum-gradient-background {
			background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
		}

		.has-blush-light-purple-gradient-background {
			background: var(--wp--preset--gradient--blush-light-purple) !important;
		}

		.has-blush-bordeaux-gradient-background {
			background: var(--wp--preset--gradient--blush-bordeaux) !important;
		}

		.has-luminous-dusk-gradient-background {
			background: var(--wp--preset--gradient--luminous-dusk) !important;
		}

		.has-pale-ocean-gradient-background {
			background: var(--wp--preset--gradient--pale-ocean) !important;
		}

		.has-electric-grass-gradient-background {
			background: var(--wp--preset--gradient--electric-grass) !important;
		}

		.has-midnight-gradient-background {
			background: var(--wp--preset--gradient--midnight) !important;
		}

		.has-small-font-size {
			font-size: var(--wp--preset--font-size--small) !important;
		}

		.has-medium-font-size {
			font-size: var(--wp--preset--font-size--medium) !important;
		}

		.has-large-font-size {
			font-size: var(--wp--preset--font-size--large) !important;
		}

		.has-x-large-font-size {
			font-size: var(--wp--preset--font-size--x-large) !important;
		}

		:where(.wp-block-post-template.is-layout-flex) {
			gap: 1.25em;
		}

		:where(.wp-block-post-template.is-layout-grid) {
			gap: 1.25em;
		}

		:where(.wp-block-columns.is-layout-flex) {
			gap: 2em;
		}

		:where(.wp-block-columns.is-layout-grid) {
			gap: 2em;
		}

		:root :where(.wp-block-pullquote) {
			font-size: 1.5em;
			line-height: 1.6;
		}
	</style>
	<link rel="stylesheet" href="<?= ABS_URL ?>assets/foundation/dialog.min.css">
	<link rel="stylesheet" id="elementor-frontend-css" href="<?= ABS_URL ?>assets/foundation/frontend.min.css" media="all">
	<link rel="stylesheet" id="widget-image-css" href="<?= ABS_URL ?>assets/foundation/widget-image.min.css" media="all">
	<link rel="stylesheet" id="widget-nav-menu-css" href="<?= ABS_URL ?>assets/foundation/widget-nav-menu.min.css" media="all">
	<link rel="stylesheet" id="widget-image-box-css" href="<?= ABS_URL ?>assets/foundation/widget-image-box.min.css" media="all">
	<link rel="stylesheet" id="widget-mega-menu-css" href="<?= ABS_URL ?>assets/foundation/widget-mega-menu.min.css" media="all">
	<link rel="stylesheet" id="widget-heading-css" href="<?= ABS_URL ?>assets/foundation/widget-heading.min.css" media="all">
	<link rel="stylesheet" id="widget-text-editor-css" href="<?= ABS_URL ?>assets/foundation/widget-text-editor.min.css" media="all">
	<link rel="stylesheet" id="widget-form-css" href="<?= ABS_URL ?>assets/foundation/widget-form.min.css" media="all">
	<link rel="stylesheet" id="widget-divider-css" href="<?= ABS_URL ?>assets/foundation/widget-divider.min.css" media="all">
	<link rel="stylesheet" id="widget-icon-list-css" href="<?= ABS_URL ?>assets/foundation/widget-icon-list.min.css" media="all">
	<link rel="stylesheet" id="e-animation-bounce-css" href="<?= ABS_URL ?>assets/foundation/bounce.min.css" media="all">
	<link rel="stylesheet" id="e-animation-fadeInUp-css" href="<?= ABS_URL ?>assets/foundation/fadeInUp.min.css" media="all">
	<link rel="stylesheet" id="e-animation-fadeIn-css" href="<?= ABS_URL ?>assets/foundation/fadeIn.min.css" media="all">
	<link rel="stylesheet" id="elementor-icons-css" href="<?= ABS_URL ?>assets/foundation/elementor-icons.min.css" media="all">
	<link rel="stylesheet" id="swiper-css" href="<?= ABS_URL ?>assets/foundation/swiper.min.css" media="all">
	<link rel="stylesheet" id="e-swiper-css" href="<?= ABS_URL ?>assets/foundation/e-swiper.min.css" media="all">
	<link rel="stylesheet" id="elementor-post-6-css" href="<?= ABS_URL ?>assets/foundation/post-6.css" media="all">
	<link rel="stylesheet" id="e-animation-bounceInUp-css" href="<?= ABS_URL ?>assets/foundation/bounceInUp.min.css" media="all">
	<link rel="stylesheet" id="widget-loop-builder-css" href="<?= ABS_URL ?>assets/foundation/widget-loop-builder.min.css" media="all">
	<link rel="stylesheet" id="elementor-post-56-css" href="<?= ABS_URL ?>assets/foundation/post-56.css" media="all">
	<link rel="stylesheet" id="elementor-post-76-css" href="<?= ABS_URL ?>assets/foundation/post-76.css" media="all">
	<link rel="stylesheet" id="elementor-post-200-css" href="<?= ABS_URL ?>assets/foundation/post-200.css" media="all">
	<link rel="stylesheet" id="elementor-post-5351-css" href="<?= ABS_URL ?>assets/foundation/post-5351.css" media="all">
	<link rel="stylesheet" id="google-fonts-1-css" href="<?= ABS_URL ?>assets/foundation/css" media="all">
	<link rel="stylesheet" id="elementor-icons-shared-0-css" href="<?= ABS_URL ?>assets/foundation/fontawesome.min.css" media="all">
	<link rel="stylesheet" id="elementor-icons-fa-solid-css" href="<?= ABS_URL ?>assets/foundation/solid.min.css" media="all">
	<link rel="stylesheet" id="elementor-icons-fa-brands-css" href="<?= ABS_URL ?>assets/foundation/brands.min.css" media="all">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
	<script src="<?php echo ABS_URL ?>assets/foundation/jquery.min.js.download" id="jquery-core-js"></script>
	<script src="<?php echo ABS_URL ?>assets/foundation/jquery-migrate.min.js.download" id="jquery-migrate-js"></script>
	<link rel="https://api.w.org/" href="<?php echo ABS_URL ?>wp-json/">
	<link rel="alternate" title="JSON" type="application/json" href="<?php echo ABS_URL ?>wp-json/wp/v2/pages/56">
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo ABS_URL ?>xmlrpc.php?rsd">
	<meta name="generator" content="WordPress 6.7.1">
	
	<style>
		#h5vpQuickPlayer {
			width: 100%;
			max-width: 100%;
			margin: 0 auto;
		}
	</style>
	<meta name="generator" content="Elementor 3.25.4; features: additional_custom_breakpoints, e_optimized_control_loading; settings: css_print_method-external, google_font-enabled, font_display-swap">
	<style>
		.e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),
		.e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) * {
			background-image: none !important;
		}

		@media screen and (max-height: 1024px) {

			.e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload),
			.e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload) * {
				background-image: none !important;
			}
		}

		@media screen and (max-height: 640px) {

			.e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),
			.e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) * {
				background-image: none !important;
			}
		}
	</style>
	<link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
	<link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
	<link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
	<meta name="msapplication-TileImage" content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
	<style id="wp-custom-css">
		body:not(.home) #primery_menu {
			background-color: #E82429 !important;
		}

		#header_btn {
			background: linear-gradient(180deg, #0066A4 0%, #0063A0 34%, #025C95 66%, #044E82 97%, #044D80 100%);
			transition: 0.5s all ease;
		}

		#header_btn:hover {
			background: linear-gradient(180deg, #025C95 0%, #044E82 34%, #044D80 66%, #0063A0 97%, #0066A4 100%);

		}

		.search_popup .dialog-close-button i {
			position: absolute;
			right: 0px;
			top: 17px;
		}

		#footer_icon_list .elementor-widget .elementor-icon-list-icon i {
			width: 36px;
			border: 1px solid;
			border-radius: 100px;
			padding: 8px 7px 7px 8px;
		}

		/* Default styles for large screens */
		.heading_text_building {
			font-size: 158px;
			line-height: 120px;
			letter-spacing: 0.02em;
		}

		.heading_text_innovation {
			font-size: 104px;
			line-height: 120px;
			letter-spacing: 0.02em;
		}

		/* For medium screens (e.g., tablets) */
		@media (max-width: 1024px) {
			.heading_text_building {
				font-size: 120px;
				line-height: 100px;
			}

			.heading_text_innovation {
				font-size: 80px;
				line-height: 100px;
			}
		}

		/* For small screens (e.g., large phones) */
		@media (max-width: 768px) {
			.heading_text_building {
				font-size: 90px;
				line-height: 80px;
			}

			.heading_text_innovation {
				font-size: 60px;
				line-height: 80px;
			}
		}

		/* For very small screens (e.g., small phones) */
		@media (max-width: 480px) {
			.heading_text_building {
				font-size: 60px;
				line-height: 60px;
			}

			.heading_text_innovation {
				font-size: 40px;
				line-height: 60px;
			}
		}

		.custom_hero_banner::after {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			/*   background: linear-gradient(180deg, #E82429 3.95%, rgba(232, 36, 41, 0) 100%); */
			background-color: transparent;
			background-image: linear-gradient(180deg, #E82429 3.95%, rgba(232, 36, 41, 0) 40%);
			pointer-events: none;
			opacity: 0.75;
		}

		@media(max-width:1199px) {
			#gallantt_text {
				display: none;
			}
		}

		/* Default spacing for large screens */
		.spacing {
			margin-top: 120px;
			margin-bottom: 120px;
		}

		/* Spacing for screens smaller than or equal to 992px */
		@media (max-width: 992px) {
			.spacing {
				margin-top: 90px;
				margin-bottom: 90px;
			}
		}

		/* Spacing for screens smaller than or equal to 768px */
		@media (max-width: 768px) {
			.spacing {
				margin-top: 48px;
				margin-bottom: 48px;
			}
		}

		/* Spacing for screens smaller than or equal to 576px */
		@media (max-width: 576px) {
			.spacing {
				margin-top: 28px;
				margin-bottom: 28px;
			}
		}

		#business_slider .elementor-element .swiper~.elementor-swiper-button.swiper-button-disabled {
			border: 2px solid #03001B66;
			border-radius: 30px;
			padding: 10px;
			background: white;
		}

		#business_slider .elementor-element .swiper~.elementor-swiper-button.swiper-button-disabled svg {
			filter: brightness(0);
		}

		#business_slider .elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-prev:hover {
			color: inherit;
			border-style: solid;
		}

		#business_slider .elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-next,
		.elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-prev {

			border: 2px solid transparent;
			border-radius: 30px;
			padding: 10px;
			/*     background: linear-gradient(180deg, #E82429 1%, #BE1D21 30%, #801316 70%, #680F11 100%); */
			background-color: firebrick;
		}

		#business_slider .elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-prev {
			color: inherit;
			border-style: solid !important;
		}

		#business_slider .elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-next svg {
			filter: brightness(10);
		}

		#home_counter_text .elementor-counter-title {
			display: block;
			position: absolute;
			top: calc(50% - 1px);
			left: 50%;
			z-index: 0;
			transform: translate(-50%, -50%);
			width: 100%;
			text-align: center;
			margin: 0;
			background: #ffffff;
			opacity: 1;
			white-space: nowrap;
		}

		@media (min-width: 1024px) {
			#stare-of-image {
				margin-top: 81px;
			}

			#stare-of-image:after {
				content: "";
				display: block;
				height: 545px;
				width: 3px;
				position: absolute;
				right: 0px;
				top: 50%;
				-webkit-transform: translateY(-53%);
				-ms-transform: translateY(-53%);
				transform: translateY(-53%);
				background-color: #E82429;
			}
		}

		#left_line::before {
			content: "";
			display: block;
			height: 102px;
			width: 4.5px;
			position: absolute;
			left: 0px;
			top: 39%;
			-webkit-transform: translateY(-50%);
			-ms-transform: translateY(-50%);
			transform: translateY(-50%);
			background: linear-gradient(180deg, #E82429 1%, #BE1D21 30%, #801316 70%, #680F11 100%);
		}

		@media (min-width: 1024px) {
			#cmd-box-layout {
				height: 460px;
				position: relative;
				left: 65px;
				top: 180px;
				margin-bottom: 170px;
				z-index: 1;
				backdrop-filter: blur(5px);
			}
		}

		#discription_section {
			background: linear-gradient(180deg, #0066A4 0%, #0063A0 34%, #025C95 66%, #044E82 97%, #044D80 100%);
		}

		@media (min-width: 1024px) {
			#discription_section {
				height: 360px;
				position: relative;
				right: 40px;
			}
		}

		@media (min-width: 1024px) {
			#video_section {
				height: 450px;
			}

			#video_wedget {
				height: 500px;
			}
		}

		@media (max-width: 768px) {
			#video_section {
				height: 250px;
			}

			#video_wedget {
				height: 250px;
			}
		}

		@media (max-width: 576px) {
			#video_section {
				height: 200px;
			}

			#video_wedget {
				height: 200px;
			}
		}

		.dialog-lightbox-close-button .eicon-close:before {
			content: '';
			display: inline-block;
			width: 30px;
			height: 30px;
			background-size: contain;
			vertical-align: middle;
			-webkit-transition: -webkit-transform .3s ease, color .3s ease;
			-ms-transition: -ms-transform .3s ease, color .3s ease;
			transition: transform .3s ease, color .3s ease;
			-webkit-transform-origin: 50% 50%;
			-ms-transform-origin: 50% 50%;
			transform-origin: 50% 50%;
		}

		.dialog-lightbox-close-button .eicon-close:hover:before {
			-webkit-transform: rotate(180deg);
			-ms-transform: rotate(180deg);
			transform: rotate(180deg);
		}

		.eicon-play:before {
			content: 'Play Video';
			border: 1px solid #FFFFFF8F;
			border-radius: 30px;
			font-family: Jost;
			font-size: 18px;
			font-weight: 600;
			line-height: 28px;
			color: #FFFFFF;
			padding: 10px 24px 10px 24px;
			transition: all .5s;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.eicon-play:hover:before {
			background-color: #000000;
		}

		*::-webkit-scrollbar {
			width: 7px;
			height: 30px;
		}

		*::-webkit-scrollbar-thumb {
			background-color: #0066A4;
			border-radius: 4px;
			border: 3px solid transparent;
		}

		*::-webkit-scrollbar-track {
			background: transparent;
		}

		@media (min-width: 1024px) {
			#box_hover_animation {
				background: rgb(245, 245, 245);
				background: linear-gradient(90deg, rgba(245, 245, 245, 1) 69%, rgba(0, 0, 0, 1) 66%);
			}

			.box_hover_effect {
				transition: all 0.8s ease;
				position: relative;
				top: 0;
				right: 0;
				margin-top: 0;
				margin-right: 0;
			}

			#box_hover_animation:hover .box_hover_effect {
				top: 50px;
				right: 25px;
				margin-top: 50px;
				margin-right: 25px;
			}
		}

		@media (min-width: 1024px) {

			#cmd-box-layout {
				transition: all 0.9s ease;
				position: relative;
			}

			#cmd_sections_hover:hover #cmd-box-layout {
				transform: translate(0px, -25px);
			}

			#discription_section {
				transition: all 0.9s ease;
				position: relative;
			}

			#cmd_sections_hover:hover #discription_section {
				transform: translate(0px, 25px);
			}
		}

		.elementor-field-group .elementor-field-textual:focus {
			box-shadow: none;
		}

		.slide img {
			filter: grayscale(100);
			opacity: .3;
			transition: 1s all ease;
		}

		/* .slide img:hover {
  filter: grayscale(0);
  opacity: 1;
} */
		.slide:hover img {
			filter: grayscale(0);
			opacity: 1;
		}

		@media(min-width:1199px) {
			#video_section .elementor-wrapper {
				--video-aspect-ratio: 0;
			}
		}

		#primery_menu .sub-arrow i {
			display: none;
		}

		#primery_menu .elementor-nav-menu .sub-arrow {
			background-repeat: no-repeat;
			width: 18px;
			height: 18px;
			position: relative;
			bottom: -1px;
			left: 7px;
		}

		@media (max-width: 1024px) {
			#primery_menu .elementor-nav-menu .sub-arrow {
				position: absolute;
				right: 15px;
				bottom: auto;
				left: auto;
			}
		}

		#video_section .elementor-custom-embed-image-overlay img {
			transition: 0.9s ease all;
			transition-delay: 100ms;
		}

		#video_section:hover .elementor-custom-embed-image-overlay img {
			filter: grayscale(1);
		}

		.current_openings_card .elementor-icon-list-item span:is(.label) {
			color: #03001B;
		}

		.current_openings_card .elementor-icon-list-item span:is(.label) span {
			color: #797C7F;
		}

		.job_landing_banner {
			background: linear-gradient(180deg, #E82429 1%, #BE1D21 30%, #801316 70%, #680F11 100%);
		}

		#counters_border_bottom .elementor-counter-number-wrapper:after {
			content: "";
			position: absolute;
			width: 65%;
			height: 1px;
			background-color: #CCCCCC;
			top: 68%;
		}

		.goBackBtn a {
			pointer-events: all;
			cursor: pointer;
		}


		.vertical_shake {
			animation: vertical-shaking 2s infinite;
			transition: all 1s ease;
		}

		@keyframes vertical-shaking {
			0% {
				transform: translateY(0);
			}

			25% {
				transform: translateY(45px);
			}

			50% {
				transform: translateY(-15px);
			}

			75% {
				transform: translateY(5px);
			}

			100% {
				transform: translateY(0);
			}
		}

		.application_form .elementor-field-type-html {
			margin-top: 20px;
		}

		.team_section .swiper-slide {
			clip-path: polygon(0 0, 100% 8%, 100% 100%, 0% 100%);
		}

		.team_inner .elementor-widget-container {
			opacity: 0;
		}

		.team_inner .elementor-widget-container:hover {
			opacity: 1;
		}

		.team_inner {
			width: 100%;
			height: 100%;
			background-size: contain;
			background-position: bottom center;
			background-repeat: no-repeat;
		}

		#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper, .swiper-container)~.elementor-swiper-button-prev,
		#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper, .swiper-container)~.elementor-swiper-button-next {
			border: 2px solid #03001B66;
			border-radius: 30px;
			padding: 10px;
			background-color: white;
			transition: 0.5s all ease;
		}

		#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper, .swiper-container)~.elementor-swiper-button-prev:hover,
		#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper, .swiper-container)~.elementor-swiper-button-next:hover {
			background-color: firebrick;
			border: 2px solid transparent;
		}

		#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper, .swiper-container)~.elementor-swiper-button-prev:hover svg,
		#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper, .swiper-container)~.elementor-swiper-button-next:hover svg {
			filter: invert(1);
		}

		@media (min-width: 1024px) {
			.forgin_an {
				transition: all 0.8s ease;
				position: relative;
				top: 0;
				right: 0;
				margin-top: 0;
				margin-right: 0;
			}

			.box_forgin_an:hover .forgin_an {
				top: 20px;
				left: 20px;
				margin-top: 20px;
				margin-left: 25px;
			}
		}

		@media (min-width: 1024px) {

			#image_border_left:after {
				content: "";
				display: block;
				height: 200%;
				width: 3px;
				position: absolute;
				right: 0px;
				top: 50%;
				-webkit-transform: translateY(-53%);
				-ms-transform: translateY(-53%);
				transform: translateY(-53%);
				background-color: #e82429;
			}
		}

		#cement_form .eicon-caret-down:before {
			content: "\e92a";
			color: transparent;
		}

		#cement_form .eicon-caret-down {
			background-repeat: no-repeat;
			width: 18px;
			height: 18px;
			position: relative;
			bottom: -1px;
			left: 7px;
		}

		#cement_form .elementor-field-group {
			justify-content: center;
		}

		label[for="form-field-name-1"],
		label[for="form-field-name-0"] {
			font-size: 17px;
			font-weight: 600 !important;
			text-align: left;
		}

		#cement_form .elementor-field-subgroup {
			gap: 30px;
			margin-bottom: 25px;
		}

		#cement_form .e-form__buttons {
			margin-top: 30px;
		}

		@media (min-width: 1024px) {
			#steel_img_box {
				width: 87%;
			}
		}

		#cursor-pointer {
			cursor: pointer;
		}

		#tab_section .elementor-widget-n-tabs .e-n-tabs-heading {
			background: var(--e-global-color-primary);
			border-radius: 30px;
		}

		.aioseo-breadcrumb {
			color: white;
			font-weight: 600;
		}

		.aioseo-breadcrumb a {
			font-weight: 200;
			color: white;
		}

		.aioseo-breadcrumb-separator {
			color: white;
		}

		#acco_left_border {
			border-left: 4px solid #000000;
		}

		#acco_left_border svg {
			position: relative;
			left: -14px;
			top: -0.99px;
		}

		@media (min-width: 768px) {
			#future_sustainability_image_box::after {
				content: "";
				position: absolute;
				top: 0;
				width: 1px;
				height: 361px;
				background-color: #000000;
				transform: translateX(-50%);
				right: -9%;
			}
		}

		#primery_menu .elementor-nav-menu--dropdown li a {
			border-radius: 12px;
			margin: 3px 0px 3px 0px;
		}

		.rotate-animation {
			width: 59px;
			height: 60px;
			animation: rotatePause 1500ms infinite;
			margin-right: 73px;
		}

		@keyframes rotatePause {
			0% {
				transform: rotate(0deg);
			}

			50% {
				transform: rotate(90deg);
			}

			100% {
				transform: rotate(90deg);
			}
		}

		@media (max-width: 1024px) {
			#primery_menu .elementor-nav-menu--dropdown a.elementor-item-active {
				color: var(--e-global-color-314576f);
			}
		}

		.achieve_dot_1 {
			animation: achieveCardDots 1.5s infinite;
			border-radius: 100%;
		}

		@keyframes achieveCardDots {
			0% {
				transform: scale(1);
			}

			25% {
				transform: scale(1.5);
			}

			50% {
				transform: scale(1.3);
			}

			100% {
				transform: scale(1);
			}
		}

		#foundation .phara {
			opacity: 0;
		}

		#foundation .phara:hover {
			opacity: 1;
		}

		#pdf_doc li {
			width: fit-content;
			background: #F9F9F9;
			padding: 10px;
			border-radius: 12px;
		}

		.filter-container {
			display: flex;
			gap: 20px;
			justify-content: space-evenly;
			flex-wrap: wrap;
		}

		@media(min-width:1199px) {
			.filter-container {
				gap: 150px;
			}
		}

		.filter-container select {
			padding: 12px 24px 12px 5px;
			border: 0;
			border-bottom: 1px solid;
			width: 300px;
			color: #00000066;
			font-size: 17px;
			font-weight: 400;
			font-family: 'Kumbh Sans';
		}

		#view-data-btn {
			background-color: var(--e-global-color-primary);
			color: #ffffff;
			font-family: "Jost", Sans-serif;
			font-size: 16px;
			font-weight: 600;
			line-height: 28px;
			border-radius: 30px 30px 30px 30px;
			padding: 8px 40px 8px 40px;
			border: 0;
			margin-top: 40px;
		}

		.custom_price_table {
			width: 600px;
			border-collapse: collapse;
			overflow-x: scroll;
			font-size: 17px;
			font-weight: 600;
			text-align: center;
		}

		#data-table-container {
			display: flex;
			justify-content: center;
		}

		.filter_div {
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		select:focus {
			outline: none;
		}

		.custom_price_table thead tr th:first-child {
			background-color: #0000000A;
		}

		.custom_price_table tbody tr td:first-child {
			background-color: #0000000A;
		}

		.custom_price_table th,
		.custom_price_table td {
			padding: 20px;
			vertical-align: middle;
		}

		.custom_price_table th {
			border-bottom: 1px solid #000000;
			width: 50%;
		}

		.custom_hero_slide span.swiper-pagination-bullet.swiper-pagination-bullet {
			height: 6px;
			border-radius: 50px;
		}

		.swiper-horizontal>.swiper-pagination-bullets,
		.swiper-pagination-bullets.swiper-pagination-horizontal,
		.swiper-pagination-custom,
		.swiper-pagination-fraction {
			z-index: 10;
			left: 47%;
			transform: translate(0%, -50%);
		}

		.stories_card .s_info_card {
			opacity: 0;
			height: 0%;
			transition: opacity 0.3s ease, height 0.3s ease;
			overflow: hidden;
		}

		.stories_card:hover .s_info_card {
			opacity: 1;
			height: fit-content;
			max-height: 300px !important;
		}

		.stories_card .post_img {
			max-height: 367px;
			height: 367px;
		}

		.stories_card:hover .s_info_card .elementor-widget-container {
			overflow: hidden;
			-webkit-line-clamp: 6;
			width: -webkit-fill-available;
			display: -webkit-box;
			-webkit-box-orient: vertical;
		}
	</style>
	<script src="<?php echo ABS_URL ?>assets/foundation/wp-emoji-release.min.js.download" defer=""></script>
</head>

<body class="page-template-default page page-id-56 wp-custom-logo elementor-default elementor-kit-6 elementor-page elementor-page-56 e--ua-blink e--ua-chrome e--ua-webkit dialog-body dialog-lightbox-body dialog-container dialog-lightbox-container" data-elementor-device-mode="desktop">
	<?php require_once ABS_PATH . './components/navbar/header.php'; ?>

	<main id="content" class="site-main post-56 page type-page status-publish hentry">


		<div class="page-content">
			<div data-elementor-type="wp-page" data-elementor-id="56" class="elementor elementor-56" data-elementor-post-type="page">
				<div class="elementor-element elementor-element-ecee5ed e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="ecee5ed" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
					<div class="e-con-inner">
						<div class="elementor-element elementor-element-e39e33b e-con-full e-flex e-con e-child" data-id="e39e33b" data-element_type="container">
							<div class="elementor-element elementor-element-ea830dc elementor-widget elementor-widget-heading" data-id="ea830dc" data-element_type="widget" data-widget_type="heading.default">
								<div class="elementor-widget-container">
									<h2 class="elementor-heading-title elementor-size-default">"Building a Better Tomorrow: Empowering Communities Through Action”</h2>
								</div>
							</div>
							<div class="elementor-element elementor-element-2ae1024 e-con-full e-flex e-con e-child" data-id="2ae1024" data-element_type="container">
								<div class="elementor-element elementor-element-1b83fdb elementor-widget elementor-widget-heading" data-id="1b83fdb" data-element_type="widget" data-widget_type="heading.default">
									<div class="elementor-widget-container">
									</div>
								</div>
								<div class="elementor-element elementor-element-ffe4a39 elementor-widget elementor-widget-heading" data-id="ffe4a39" data-element_type="widget" data-widget_type="heading.default">
								
								</div>
							</div>
							
						</div>
						<div class="elementor-element elementor-element-1579af3 e-con-full e-flex e-con e-child" data-id="1579af3" data-element_type="container">
							<div class="elementor-element elementor-element-4052e58 rotate-animation elementor-hidden-mobile elementor-widget elementor-widget-image" data-id="4052e58" data-element_type="widget" data-widget_type="image.default">
								<div class="elementor-widget-container">
									<img decoding="async" width="59" height="60" src="<?php echo ABS_URL ?>assets/foundation/triangle-icon.png" class="attachment-large size-large wp-image-5503" alt="">
								</div>
							</div>
							<div class="elementor-element elementor-element-1aa830f elementor-widget elementor-widget-heading" data-id="1aa830f" data-element_type="widget" data-widget_type="heading.default">
								<div class="elementor-widget-container">
									<h2 class="elementor-heading-title elementor-size-default">Foundation</h2>
								</div>
							</div>
							<div class="elementor-element elementor-element-9086b13 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="9086b13" data-element_type="widget" data-widget_type="divider.default">
								<div class="elementor-widget-container">
									<div class="elementor-divider">
										<span class="elementor-divider-separator">
										</span>
									</div>
								</div>
							</div>
							<div class="elementor-element elementor-element-09f34d0 elementor-absolute elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="09f34d0" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="divider.default">
								<div class="elementor-widget-container">
									<div class="elementor-divider">
										<span class="elementor-divider-separator">
										</span>
									</div>
								</div>
							</div>
							<div class="elementor-element elementor-element-4fb099a elementor-widget elementor-widget-wp-widget-aioseo-breadcrumb-widget" data-id="4fb099a" data-element_type="widget" data-widget_type="wp-widget-aioseo-breadcrumb-widget.default">
								<div class="elementor-widget-container">
									<div class="aioseo-breadcrumbs"><span class="aioseo-breadcrumb">
											<a href=index.php title="Home">Home</a>
										</span><span class="aioseo-breadcrumb-separator">/</span><span class="aioseo-breadcrumb">
											Foundation
										</span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="elementor-element elementor-element-d0ea9ad spacing e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="d0ea9ad" data-element_type="container">
					<div class="e-con-inner">
						<div class="elementor-element elementor-element-e0c7f00 e-con-full e-flex e-con e-child" data-id="e0c7f00" data-element_type="container">
							<div class="elementor-element elementor-element-a0806c0 elementor-widget elementor-widget-heading animated bounceInUp" data-id="a0806c0" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
								<div class="elementor-widget-container">
									<h2 class="elementor-heading-title elementor-size-default">Gallantt Foundation: Building a Better Tomorrow</h2>
								</div>
							</div>
							<div class="elementor-element elementor-element-4146285 elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="4146285" data-element_type="widget" data-widget_type="text-editor.default">
								<div class="elementor-widget-container text-justify">
									At Gallantt, our belief in giving back to the community that supports us is at the core of who we are. Through the Gallantt Foundation, we aim to create lasting, positive change by investing in healthcare, education, employee welfare, and community development. Our initiatives are designed to uplift communities, promote well-being, and ensure that every individual has the opportunity to live a better life. </div>
							</div>
						</div>
						<div class="elementor-element elementor-element-312a742 e-con-full e-flex e-con e-child" data-id="312a742" data-element_type="container">
							<div class="elementor-element elementor-element-c16428f elementor-widget elementor-widget-image" data-id="c16428f" data-element_type="widget" data-widget_type="image.default">
								<div class="elementor-widget-container">
									<img fetchpriority="high" decoding="async" width="1024" height="1024" src="<?php echo ABS_URL ?>assets/foundation/Gallantt-Foundation-Building-a-Better-Tomorrow.png" class="attachment-full size-full wp-image-7260" alt="Gallantt Foundation Building a Better Tomorrow">
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- <section class="new-section">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<h2>Blood Donation Camp</h2>
								<p>Gallantt Group organized a blood donation camp, bringing together employees and the community to donate blood and save lives. This initiative reflects our commitment to healthcare and community welfare, fostering a spirit of compassion and service.</p>
								<h2>City Beautification Statue Installed on Street Crossing</h2>
								<p>Enhancing urban aesthetics, Gallantt Group proudly installed a city beautification statue at a prominent street crossing. This initiative symbolizes our dedication to cultural heritage and creating inspiring public spaces.</p>
								<h2>Food Distribution During COVID</h2>
								<p>In response to the COVID-19 pandemic, Gallantt Group provided essential food supplies to the needy. This humanitarian effort ensured that no family went hungry during these challenging times, showcasing our unwavering support for the community.</p>
								<h2>Free Food Distribution Truck</h2>
								<p>Gallantt Group launched a free food distribution truck, serving hot meals to the underprivileged. This ongoing initiative is a testament to our resolve in combating hunger and uplifting society's marginalized sections.</p>
								<h2>Health Camp</h2>
								<p>Gallantt Group organized a comprehensive health camp, offering free check-ups and medical consultations. This program underscores our commitment to improving community health and promoting well-being in underserved areas.</p>
								<h2>Inauguration of Dialysis Unit</h2>
								<p>Gallantt Group inaugurated a state-of-the-art dialysis unit to provide affordable, quality healthcare. This initiative addresses critical healthcare needs, ensuring life-saving treatments are accessible to those in need.</p>
								<h2>Village Road Construction</h2>
								<p>Gallantt Group contributed to rural development by constructing a durable village road, improving connectivity and fostering economic growth. This effort highlights our commitment to empowering rural communities.</p>
								<h2>Village Lake Recharge</h2>
								<p>In a significant environmental initiative, Gallantt Group rejuvenated a village lake, boosting groundwater levels and supporting agriculture. This project emphasizes our dedication to sustainability and ecological balance.</p>
								<h2>Chief Minister Flagging the Food Van</h2>
								<p>Honrable Chief Minister shri yogi adityanath flagged off Gallantt Group’s food van initiative, lauding our efforts to combat hunger. This event marked a milestone in our mission to serve the community and uphold our social responsibility.</p>
								<h2>Inauguration of School in Sahjanwa</h2>
								<p>Gallantt Group proudly inaugurated a new school in Sahjanwa, empowering the community with access to quality education. This initiative underscores our commitment to nurturing young minds and building a brighter future for generations to come.</p>

								<h2>Organizing of Half Marathon Event</h2>
								<p>Gallantt Group successfully organized a half marathon event, promoting health, fitness, and community spirit. This initiative brought people together to celebrate wellness while reinforcing our dedication to fostering an active and vibrant society.</p>

							</div>
						</div>
					</div>
				</section> -->




				<div class="elementor-element elementor-element-4212c78 spacing e-flex e-con-boxed e-con e-parent" data-id="4212c78" data-element_type="container">
					<div class="e-con-inner">
						<div class="elementor-element elementor-element-b0c8737 e-con-full e-flex e-con e-child" data-id="b0c8737" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
							<div class="elementor-element elementor-element-f6511b8 elementor-invisibl elementor-widget elementor-widget-heading" data-id="f6511b8" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
								<div class="elementor-widget-container">
									<h2 class="elementor-heading-title elementor-size-default">Vision</h2>
								</div>
							</div>
							<div class="elementor-element elementor-element-9217c20 elementor-widget elementor-widget-text-editor" data-id="9217c20" data-element_type="widget" data-widget_type="text-editor.default">
								<div class="elementor-widget-container">
									To build sustainable and thriving communities by fostering opportunities for growth and ensuring
									access to essential services for all. </div>
							</div>
						</div>
						<div class="elementor-element elementor-element-cc67dc7 e-con-full e-flex e-con e-child" data-id="cc67dc7" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
							<div class="elementor-element elementor-element-fe99496 elementor-invisibl elementor-widget elementor-widget-heading" data-id="fe99496" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
								<div class="elementor-widget-container">
									<h2 class="elementor-heading-title elementor-size-default">Mission</h2>
								</div>
							</div>
							<div class="elementor-element elementor-element-a76ba92 elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="a76ba92" data-element_type="widget" data-widget_type="text-editor.default">
								<div class="elementor-widget-container">
									To empower individuals and communities by providing quality healthcare, education, and
									welfare programs that contribute to long-term societal growth and well-being. We are committed
									to making a meaningful difference, ensuring that the communities around us grow alongside us. </div>
							</div>
						</div>
					</div>
				</div>
				<div class="elementor-element elementor-element-671d93a spacing e-flex e-con-boxed e-con e-parent" data-id="671d93a" data-element_type="container">
					<div class="e-con-inner">
						<div class="elementor-element elementor-element-fe1da81 e-con-full e-flex e-con e-child" data-id="fe1da81" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
							<div class="elementor-element elementor-element-1ad8288 e-con-full e-flex e-con e-child" data-id="1ad8288" data-element_type="container">
								<div class="elementor-element elementor-element-5993e6f elementor-invisibl elementor-widget elementor-widget-heading" data-id="5993e6f" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
									<div class="elementor-widget-container">
										<h2 class="elementor-heading-title elementor-size-default">Annapoorna “ Nourishing lives </h2>
									</div>
								</div>
								<div class="elementor-element elementor-element-2062c0c elementor-widget elementor-widget-text-editor" data-id="2062c0c" data-element_type="widget" data-widget_type="text-editor.default">
									<div class="elementor-widget-container  text-justify">
										Under the Annapoorna initiative, Gallantt Group operates a daily free food distribution program through specially designated delivery vans. This program ensures fresh, wholesome meals reach the underprivileged, reflecting our dedication to eradicating hunger and uplifting communities. Annapoorna stands as a symbol of hope, compassion, and unwavering commitment to societal welfare.
																<div class="counter-box">
    Free meals served till date: <strong id="mealCount"><?= number_format($currentMeals) ?></strong>
</div>
									</div>

				

<!-- Optional: Animate the number -->
<script>
    function animateCounter(id, start, end, duration) {
        const element = document.getElementById(id);
        let current = start;
        const increment = Math.ceil((end - start) / (duration / 50)); // change per step
        const stepTime = 50;

        const timer = setInterval(() => {
            current += increment;
            if (current >= end) {
                current = end;
                clearInterval(timer);
            }
            element.innerText = current.toLocaleString('en-IN');
        }, stepTime);
    }

    // Animate only if you want smooth increase from a base number (optional)
    animateCounter("mealCount", <?= $currentMeals - 200 ?>, <?= $currentMeals ?>, 800);
</script>
								</div>
							</div>
							<div class="elementor-element elementor-element-3c51f75 e-con-full e-flex e-con e-child" data-id="3c51f75" data-element_type="container">
								<div class="elementor-element elementor-element-257c9d5 elementor-widget elementor-widget-image" data-id="257c9d5" data-element_type="widget" data-widget_type="image.default">
									<div class="elementor-widget-container">
										<img loading="lazy" decoding="async" width="1020" height="383" src="<?php echo ABS_URL ?>assets/foundation/Nourishing-lives.jpg" class="attachment-full size-full wp-image-7335" alt="Sponsorship">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="elementor-element elementor-element-1a5cb5c e-flex e-con-boxed e-con e-parent" data-id="1a5cb5c" data-element_type="container">
					<div class="e-con-inner">
						<div class="elementor-element elementor-element-1572a93 elementor-invisibl elementor-widget elementor-widget-heading" data-id="1572a93" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
							<div class="elementor-widget-container">
								<h2 class="elementor-heading-title elementor-size-default">Employee Welfare</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="elementor-element elementor-element-9f46d56 e-grid e-con-boxed e-con e-parent" data-id="9f46d56" data-element_type="container">
					<div class="e-con-inner">


					<?php


$db = Database::getDB();

$stmt = $db->query("SELECT * FROM web_employeewelfare ORDER BY id DESC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row):
?>
    <div class="elementor-element elementor-element-cf8c933 e-con-full e-flex e-con e-child"
         style="background-image: url('<?php echo ABS_URL ?>dir/admin/employee-welfare/<?php echo htmlspecialchars($row['image']); ?>');"
         data-id="cf8c933"
         data-element_type="container"
         id="foundation"
         data-settings='{"background_background":"classic"}'>
        
        <div class="elementor-element elementor-element-7a09def elementor-widget__width-initial phara elementor-widget elementor-widget-text-editor"
             data-id="7a09def"
             data-element_type="widget"
             data-widget_type="text-editor.default">
            <div class="elementor-widget-container">
                <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
            </div>
        </div>

        <div class="elementor-element elementor-element-fcc10a9 elementor-absolute elementor-widget elementor-widget-heading"
             data-id="fcc10a9"
             data-element_type="widget"
             data-settings='{"_position":"absolute"}'
             data-widget_type="heading.default">
            <div class="elementor-widget-container">
                <h2 class="elementor-heading-title elementor-size-default mt-2">
                    <?php echo htmlspecialchars($row['title']); ?>
                </h2>
            </div>
        </div>
    </div>
<?php endforeach; ?>

						
						
						


					</div>
				</div>
				<div class="elementor-element elementor-element-df5b435 spacing e-flex e-con-boxed e-con e-parent" data-id="df5b435" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
					<div class="e-con-inner">
						<div class="elementor-element elementor-element-27aa7e3 elementor-invisibl elementor-widget elementor-widget-heading" data-id="27aa7e3" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
							<div class="elementor-widget-container">
								<!-- <h2 class="elementor-heading-title elementor-size-default">Gallery</h2>	 -->
							</div>
						</div>
						<div class="elementor-element elementor-element-8dc87ce e-flex e-con-boxed e-con e-child" data-id="8dc87ce" data-element_type="container">
							<div class="e-con-inner">
							<h1>Recent Events </h1>
								<div class="elementor-element elementor-element-de9af9b elementor-grid-3 elementor-grid-tablet-2 elementor-grid-mobile-1 elementor-widget elementor-widget-loop-grid" data-id="de9af9b" data-element_type="widget" data-settings="{&quot;template_id&quot;:&quot;7265&quot;,&quot;pagination_type&quot;:&quot;load_more_on_click&quot;,&quot;row_gap&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:45,&quot;sizes&quot;:[]},&quot;row_gap_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:45,&quot;sizes&quot;:[]},&quot;_skin&quot;:&quot;post&quot;,&quot;columns&quot;:&quot;3&quot;,&quot;columns_tablet&quot;:&quot;2&quot;,&quot;columns_mobile&quot;:&quot;1&quot;,&quot;edit_handle_selector&quot;:&quot;[data-elementor-type=\&quot;loop-item\&quot;]&quot;,&quot;load_more_spinner&quot;:{&quot;value&quot;:&quot;fas fa-spinner&quot;,&quot;library&quot;:&quot;fa-solid&quot;},&quot;row_gap_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="loop-grid.post">
									
									<div class="elementor-widget-container">
										<div class="elementor-loop-container elementor-grid">




											<?php foreach ($mediaGallery as $media): ?>

												<style id="loop-7265">
													.elementor-7265 .elementor-element.elementor-element-8840bee {
														--display: flex;
														--flex-direction: column;
														--container-widget-width: 100%;
														--container-widget-height: initial;
														--container-widget-flex-grow: 0;
														--container-widget-align-self: initial;
														--flex-wrap-mobile: wrap;
														--gap: 5px 5px;
														--overflow: hidden;
														--background-transition: 0.3s;
														--margin-top: 0px;
														--margin-bottom: 0px;
														--margin-left: 0px;
														--margin-right: 0px;
														--padding-top: 0px;
														--padding-bottom: 0px;
														--padding-left: 0px;
														--padding-right: 0px;
													}

													.elementor-7265 .elementor-element.elementor-element-17091cc {
														--display: flex;
														--min-height: 376px;
														--justify-content: flex-end;
														--overflow: hidden;
														--background-transition: 0.3s;
														--padding-top: 0px;
														--padding-bottom: 0px;
														--padding-left: 0px;
														--padding-right: 0px;
													}

													.elementor-7265 .elementor-element.elementor-element-17091cc:not(.elementor-motion-effects-element-type-background),
													.elementor-7265 .elementor-element.elementor-element-17091cc>.elementor-motion-effects-container>.elementor-motion-effects-layer {
														background-position: center center;
														background-repeat: no-repeat;
														background-size: cover;
													}

													.elementor-7265 .elementor-element.elementor-element-17091cc,
													.elementor-7265 .elementor-element.elementor-element-17091cc::before {
														--border-transition: 0.3s;
													}

													.elementor-7265 .elementor-element.elementor-element-293a20d {
														--display: flex;
														--background-transition: 0.3s;
														--padding-top: 40px;
														--padding-bottom: 40px;
														--padding-left: 38px;
														--padding-right: 38px;
													}

													.elementor-7265 .elementor-element.elementor-element-293a20d:not(.elementor-motion-effects-element-type-background),
													.elementor-7265 .elementor-element.elementor-element-293a20d>.elementor-motion-effects-container>.elementor-motion-effects-layer {
														background-color: var(--e-global-color-primary);
													}

													.elementor-7265 .elementor-element.elementor-element-293a20d,
													.elementor-7265 .elementor-element.elementor-element-293a20d::before {
														--border-transition: 0.3s;
													}

													.elementor-7265 .elementor-element.elementor-element-f8ac6b5 {
														color: #797C7F;
														font-family: "Kumbh Sans", Sans-serif;
														font-size: 17px;
														font-weight: 400;
														line-height: 28px;
													}

													.elementor-7265 .elementor-element.elementor-element-edc6c76>.elementor-widget-container {
														margin: 15px 0px 0px 0px;
													}

													.elementor-7265 .elementor-element.elementor-element-edc6c76 {
														text-align: left;
													}

													.elementor-7265 .elementor-element.elementor-element-edc6c76 .elementor-heading-title {
														color: #797C7F;
														font-family: "Kumbh Sans", Sans-serif;
														font-size: 16px;
														font-weight: 400;
														text-transform: uppercase;
														line-height: 28px;
													}

													.elementor-7265 .elementor-element.elementor-element-2ec4fb0 {
														text-align: left;
													}

													.elementor-7265 .elementor-element.elementor-element-2ec4fb0 .elementor-heading-title {
														font-family: "Kumbh Sans", Sans-serif;
														font-size: 24px;
														font-weight: 700;
														line-height: 36px;
													}
												</style>

												<div data-elementor-type="loop-item" data-elementor-id="7265" class="elementor elementor-7265 e-loop-item e-loop-item-7318 post-7318 post type-post status-publish format-standard has-post-thumbnail hentry category-stories" data-elementor-post-type="elementor_library" data-custom-edit-handle="1">
													<div class="elementor-element elementor-element-8840bee stories_card e-con-full e-flex e-con e-parent" data-id="8840bee" data-element_type="container">
														<div class="elementor-element elementor-element-17091cc e-con-full post_img e-flex e-con e-child" data-id="17091cc" data-element_type="container" data-settings='{"background_background":"classic"}'
															style="background-image: url('./dir/admin/media/uploads/<?= htmlspecialchars($media['media_image']) ?>'); background-position: center center; background-repeat: no-repeat; background-size: cover;">

															<div class="elementor-element elementor-element-293a20d e-con-full s_info_card e-flex e-con e-child" data-id="293a20d" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
																<div class="elementor-element elementor-element-f8ac6b5 elementor-widget elementor-widget-text-editor" data-id="f8ac6b5" data-element_type="widget" data-widget_type="text-editor.default">
																	<div class="elementor-widget-container">
																		<?= $media['description'] ?>
																	</div>
																</div>
															</div>
														</div>
														<div class="elementor-element elementor-element-edc6c76 elementor-widget elementor-widget-heading" data-id="edc6c76" data-element_type="widget" data-widget_type="heading.default">
															<div class="elementor-widget-container">
																<span class="elementor-heading-title elementor-size-default"><span><?= htmlspecialchars($media['category']) ?></span></span>
															</div>
														</div>
														<div class="elementor-element elementor-element-2ec4fb0 elementor-widget elementor-widget-heading" data-id="2ec4fb0" data-element_type="widget" data-widget_type="heading.default">
															<div class="elementor-widget-container">
																<h3 class="elementor-heading-title elementor-size-default"><a href="#"><?= htmlspecialchars($media['media_name']) ?></a></h3>
															</div>
														</div>
													</div>
												</div>


											<?php endforeach; ?>
















										</div>


										<div class="e-load-more-anchor" data-page="1" data-max-page="2" data-next-page="foundation.php2/"></div>
										<div class="e-loop__load-more elementor-button-wrapper">
											<a href="<?php echo ABS_URL ?>media" class="elementor-button-link elementor-button" role="button">
												<span class="elementor-button-content-wrapper">
													<span class="elementor-button-text">Load More</span>
												</span>
												<span class="e-load-more-spinner">
													<i aria-hidden="true" class="fas fa-spinner"></i> </span></a>
										</div>
										<div class="e-load-more-message"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				

				<div class="elementor-element elementor-element-c64cf9f e-flex e-con-boxed e-con e-parent" data-id="c64cf9f" data-element_type="container">
					 <div class="e-con-inner">
                        <style>
                             .form .elementor-field:not(.elementor-select-wrapper) {
    background-color: #ffffff;
    border-color: #F1F1F1;
    border-width: 0px 0px 1px 0px;
                             }
                           .form .elementor-field-group

 {
    
    margin-bottom: 24px;
}
.form .elementor-button[type="submit"] {
    background-color: var(--e-global-color-primary);
    color: #ffffff;
}
.form .elementor-button {
    font-family: "Jost", Sans-serif;
    font-size: 16px;
    font-weight: 600;
    line-height: 28px;
    border-radius: 30px 30px 30px 30px;
    padding: 8px 40px 8px 40px;
}
                        </style>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card my-4 p-0">
                                    <div class="card-body p-0">
                                        <img src="./assets/home/Contact.img" alt="">
                                        <div class="card-inner p-4 bg-danger text-light">
                                            <h2 class="mb-4">Reach Out to Us</h2>
                                            <div class="contact">
                                                <h4 class="mb-3 text-light"><svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="24" height="25" viewBox="0 0 24 25" fill="none"><path d="M21.97 18.9355C21.97 19.2955 21.89 19.6655 21.72 20.0255C21.55 20.3855 21.33 20.7255 21.04 21.0455C20.55 21.5855 20.01 21.9755 19.4 22.2255C18.8 22.4755 18.15 22.6055 17.45 22.6055C16.43 22.6055 15.34 22.3655 14.19 21.8755C13.04 21.3855 11.89 20.7255 10.75 19.8955C9.6 19.0555 8.51 18.1255 7.47 17.0955C6.44 16.0555 5.51 14.9655 4.68 13.8255C3.86 12.6855 3.2 11.5455 2.72 10.4155C2.24 9.27547 2 8.18547 2 7.14547C2 6.46547 2.12 5.81547 2.36 5.21547C2.6 4.60547 2.98 4.04547 3.51 3.54547C4.15 2.91547 4.85 2.60547 5.59 2.60547C5.87 2.60547 6.15 2.66547 6.4 2.78547C6.66 2.90547 6.89 3.08547 7.07 3.34547L9.39 6.61547C9.57 6.86547 9.7 7.09547 9.79 7.31547C9.88 7.52547 9.93 7.73547 9.93 7.92547C9.93 8.16547 9.86 8.40547 9.72 8.63547C9.59 8.86547 9.4 9.10547 9.16 9.34547L8.4 10.1355C8.29 10.2455 8.24 10.3755 8.24 10.5355C8.24 10.6155 8.25 10.6855 8.27 10.7655C8.3 10.8455 8.33 10.9055 8.35 10.9655C8.53 11.2955 8.84 11.7255 9.28 12.2455C9.73 12.7655 10.21 13.2955 10.73 13.8255C11.27 14.3555 11.79 14.8455 12.32 15.2955C12.84 15.7355 13.27 16.0355 13.61 16.2155C13.66 16.2355 13.72 16.2655 13.79 16.2955C13.87 16.3255 13.95 16.3355 14.04 16.3355C14.21 16.3355 14.34 16.2755 14.45 16.1655L15.21 15.4155C15.46 15.1655 15.7 14.9755 15.93 14.8555C16.16 14.7155 16.39 14.6455 16.64 14.6455C16.83 14.6455 17.03 14.6855 17.25 14.7755C17.47 14.8655 17.7 14.9955 17.95 15.1655L21.26 17.5155C21.52 17.6955 21.7 17.9055 21.81 18.1555C21.91 18.4055 21.97 18.6555 21.97 18.9355Z" stroke="white" stroke-miterlimit="10"></path><path opacity="0.4" d="M18.5 9.60547C18.5 9.00547 18.03 8.08547 17.33 7.33547C16.69 6.64547 15.84 6.10547 15 6.10547" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path><path opacity="0.4" d="M22 9.60547C22 5.73547 18.87 2.60547 15 2.60547" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path></svg> Phone : <a href="tel:+919559767333" class="text-light">+91 9559767333</a></p>
                                                <h4 class="mb-3 text-light"><svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="24" height="25" viewBox="0 0 24 25" fill="none"><path d="M17 21.1055H7C4 21.1055 2 19.6055 2 16.1055V9.10547C2 5.60547 4 4.10547 7 4.10547H17C20 4.10547 22 5.60547 22 9.10547V16.1055C22 19.6055 20 21.1055 17 21.1055Z" stroke="white" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path opacity="0.4" d="M17 9.60547L13.87 12.1055C12.84 12.9255 11.15 12.9255 10.12 12.1055L7 9.60547" stroke="white" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></svg> Email : <a href="mailto:gil@gallantt.com"  class="text-light">gil@gallantt.com</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 form my-auto">
                                	<div class="elementor-element elementor-element-069a519 e-con-full e-flex e-con e-child" data-id="069a519" data-element_type="container">
				<div class="elementor-element elementor-element-e529079 elementor-invisibl elementor-widget elementor-widget-heading" data-id="e529079" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h4 class="elementor-heading-title elementor-size-default">Contact Us</h4>		</div>
				</div>
				<div class="elementor-element elementor-element-0da7d1d elementor-invisibl elementor-widget elementor-widget-heading" data-id="0da7d1d" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h1 class="elementor-heading-title elementor-size-default">Get in Touch</h1>		</div>
				</div>
				<div class="elementor-element elementor-element-2e6b178 elementor-invisibl elementor-widget elementor-widget-text-editor" data-id="2e6b178" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slideInUp&quot;}" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							For inquiries and feedback, please fill out the form below.						</div>
				</div>
				<div class="elementor-element elementor-element-d93859f elementor-button-align-start elementor-widget elementor-widget-form" data-id="d93859f" data-element_type="widget" data-settings="{&quot;button_width&quot;:&quot;33&quot;,&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;}" data-widget_type="form.default">
				<div class="elementor-widget-container">
					<form class="elementor-form" id="contact_form"  method="post" name="New Form">
			

							<input type="hidden" name="queried_id" value="3465">
			
			<div class="elementor-form-fields-wrapper elementor-labels-above">
								<div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100 elementor-field-required">
													<input size="1" type="text" name="name" id="form-field-name" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Name" required="required" aria-required="true">
											</div>
								<div class="elementor-field-type-email elementor-field-group elementor-column elementor-field-group-email elementor-col-100 elementor-field-required">
													<input size="1" type="email" name="email" id="form-field-email" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Email" required="required" aria-required="true">
											</div>
								<div class="elementor-field-type-tel elementor-field-group elementor-column elementor-field-group-field_774bfaf elementor-col-100 elementor-field-required">
							<input size="1" type="tel" name="phone" id="form-field-field_774bfaf" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Phone Number" required="required" aria-required="true" pattern="[0-9()#&amp;+*-=.]+" title="Only numbers and phone characters (#, -, *, etc) are accepted.">

						</div>
								<div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_bfee571 elementor-col-100 elementor-field-required">
													<input size="1" type="text" name="subject" id="form-field-field_bfee571" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Subject" required="required" aria-required="true">
											</div>
								<div class="elementor-field-type-textarea elementor-field-group elementor-column elementor-field-group-field_47f6437 elementor-col-100 elementor-field-required">
					<textarea class="elementor-field-textual elementor-field  elementor-size-sm" name="message" id="form-field-field_47f6437" rows="4" placeholder="Message" required="required" aria-required="true"></textarea>				</div>
								<div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-33 e-form__buttons">
					<button class="elementor-button elementor-size-sm" type="submit" id="cursor-pointer">
						<span class="elementor-button-content-wrapper">
																						<span class="elementor-button-text">Send</span>
													</span>
					</button>
				</div>
			</div>
		</form>
				</div>
				</div>
				</div>
                            </div>
                        </div>
                    </div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>


	</main>

	<div data-elementor-type="footer" data-elementor-id="200" class="elementor elementor-200 elementor-location-footer" data-elementor-post-type="elementor_library">

		<?php require_once ABS_PATH . 'components/footer/footer.php'; ?>
	</div>



	<script type="text/javascript">
		const lazyloadRunObserver = () => {
			const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
			const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						let lazyloadBackground = entry.target;
						if (lazyloadBackground) {
							lazyloadBackground.classList.add('e-lazyloaded');
						}
						lazyloadBackgroundObserver.unobserve(entry.target);
					}
				});
			}, {
				rootMargin: '200px 0px 200px 0px'
			});
			lazyloadBackgrounds.forEach((lazyloadBackground) => {
				lazyloadBackgroundObserver.observe(lazyloadBackground);
			});
		};
		const events = [
			'DOMContentLoaded',
			'elementor/lazyload/observe',
		];
		events.forEach((event) => {
			document.addEventListener(event, lazyloadRunObserver);
		});
	</script>
	<link rel="stylesheet" id="elementor-post-3641-css" href="<?= ABS_URL ?>assets/foundation/post-3641.css" media="all">
	<link rel="stylesheet" id="e-animation-slideInUp-css" href="<?= ABS_URL ?>assets/foundation/slideInUp.min.css" media="all">
	<link rel="stylesheet" id="elementor-post-148-css" href="<?= ABS_URL ?>assets/foundation/post-148.css" media="all">
	<link rel="stylesheet" id="widget-search-form-css" href="<?= ABS_URL ?>assets/foundation/widget-search-form.min.css" media="all">
	<link rel="stylesheet" id="e-animation-slideInDown-css" href="<?= ABS_URL ?>assets/foundation/slideInDown.min.css" media="all">
	<link rel="stylesheet" id="e-motion-fx-css" href="<?= ABS_URL ?>assets/foundation/motion-fx.min.css" media="all">
	<link rel="stylesheet" id="e-sticky-css" href="<?= ABS_URL ?>assets/foundation/sticky.min.css" media="all">
	<link rel="stylesheet" id="e-popup-css" href="<?= ABS_URL ?>assets/foundation/popup.min.css" media="all">
	<script src="<?php echo ABS_URL ?>assets/foundation/jquery.smartmenus.min.js.download" id="smartmenus-js"></script>
	<script src="<?php echo ABS_URL ?>assets/foundation/jquery.sticky.min.js.download" id="e-sticky-js"></script>
	<script src="<?php echo ABS_URL ?>assets/foundation/imagesloaded.min.js.download" id="imagesloaded-js"></script>
	<script src="<?php echo ABS_URL ?>assets/foundation/webpack-pro.runtime.min.js.download" id="elementor-pro-webpack-runtime-js"></script>
	<script src="<?php echo ABS_URL ?>assets/foundation/webpack.runtime.min.js.download" id="elementor-webpack-runtime-js"></script>
	<script src="<?php echo ABS_URL ?>assets/foundation/frontend-modules.min.js.download" id="elementor-frontend-modules-js"></script>
	<script src="<?php echo ABS_URL ?>assets/foundation/hooks.min.js.download" id="wp-hooks-js"></script>
	<script src="<?php echo ABS_URL ?>assets/foundation/i18n.min.js.download" id="wp-i18n-js"></script>
</body>
<script src="./assets/bootstrap/dist/js/bootstrap.bundle.js"></script>

</html>