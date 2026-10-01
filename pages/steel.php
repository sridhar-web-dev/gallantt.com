<?php require_once '../config/config.php'; 
$brochure = new Brochure();
$businessName = 'steel'; // Set according to the business page
$brochures = $brochure->getBrochures($businessName);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US" prefix="og: https://ogp.me/ns#">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title>Steel - Gallantt Group of Industries</title>
	<style>img:is([sizes="auto" i], [sizes^="auto," i]) { contain-intrinsic-size: 3000px 1500px }</style>
		<link href="<?php echo ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo ABS_URL ?>components/navbar/header.css">
<link rel="stylesheet" href="<?php echo ABS_URL ?>css/all.min.css">
<link rel="stylesheet" href="<?php echo ABS_URL ?>assets/custom.css">
<link rel="stylesheet" href="<?php echo ABS_URL ?>assets/responsive.css">
		<!-- All in One SEO 4.7.4.2 - aioseo.com -->
		<meta name="description" content="&quot;Forging the Backbone of Tomorrow’s Infrastructure” - C.P. Agarwal Chairman &amp; Managing Director Steel Transforming Ore to Steel: Precision &amp; Strength Redefined Synergizing Are Info Refined Steel Unveiling Precision Ore to Reinforcement Excellence Believing in Steel, Building with Trust We believe in steel, not just as material, but as a symbol of unwavering commitment. Just">
		<meta name="robots" content="max-image-preview:large">
		<link rel="canonical" href="<?php echo ABS_URL ?>steel">
		<meta property="og:locale" content="en_US">
		<meta property="og:site_name" content="Gallantt Group of Industries - Gallantt Group of Industries">
		<meta property="og:type" content="article">
		<meta property="og:title" content="Steel - Gallantt Group of Industries">
		<meta property="og:description" content="&quot;Forging the Backbone of Tomorrow’s Infrastructure” - C.P. Agarwal Chairman &amp; Managing Director Steel Transforming Ore to Steel: Precision &amp; Strength Redefined Synergizing Are Info Refined Steel Unveiling Precision Ore to Reinforcement Excellence Believing in Steel, Building with Trust We believe in steel, not just as material, but as a symbol of unwavering commitment. Just">
		<meta property="og:url" content="<?php echo ABS_URL ?>steel">
		<meta property="og:image" content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
		<meta property="og:image:secure_url" content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="Steel - Gallantt Group of Industries">
		<meta name="twitter:description" content="&quot;Forging the Backbone of Tomorrow’s Infrastructure” - C.P. Agarwal Chairman &amp; Managing Director Steel Transforming Ore to Steel: Precision &amp; Strength Redefined Synergizing Are Info Refined Steel Unveiling Precision Ore to Reinforcement Excellence Believing in Steel, Building with Trust We believe in steel, not just as material, but as a symbol of unwavering commitment. Just">
		<meta name="twitter:image" content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
		<!-- All in One SEO -->
<link rel="alternate" type="application/rss+xml" title="Gallantt Group of Industries » Feed" href="<?php echo ABS_URL ?>feed/">
<link rel="alternate" type="application/rss+xml" title="Gallantt Group of Industries » Comments Feed" href="<?php echo ABS_URL ?>comments/feed/">
<style id="wp-emoji-styles-inline-css">
	img.wp-smiley, img.emoji {
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
<link rel="stylesheet" id="bplugins-plyrio-css" href="<?= ABS_URL ?>assets/steel/h5vp.css" media="all">
<link rel="stylesheet" id="html5-player-video-style-css" href="<?= ABS_URL ?>assets/steel/frontend.css" media="all">
<style id="classic-theme-styles-inline-css">
/*! This file is auto-generated */
.wp-block-button__link{color:#fff;background-color:#32373c;border-radius:9999px;box-shadow:none;text-decoration:none;padding:calc(.667em + 2px) calc(1.333em + 2px);font-size:1.125em}.wp-block-file__button{background:#32373c;color:#fff;text-decoration:none}
</style>
<style id="global-styles-inline-css">
:root{--wp--preset--aspect-ratio--square: 1;--wp--preset--aspect-ratio--4-3: 4/3;--wp--preset--aspect-ratio--3-4: 3/4;--wp--preset--aspect-ratio--3-2: 3/2;--wp--preset--aspect-ratio--2-3: 2/3;--wp--preset--aspect-ratio--16-9: 16/9;--wp--preset--aspect-ratio--9-16: 9/16;--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;--wp--preset--spacing--20: 0.44rem;--wp--preset--spacing--30: 0.67rem;--wp--preset--spacing--40: 1rem;--wp--preset--spacing--50: 1.5rem;--wp--preset--spacing--60: 2.25rem;--wp--preset--spacing--70: 3.38rem;--wp--preset--spacing--80: 5.06rem;--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);--wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);--wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);}:where(.is-layout-flex){gap: 0.5em;}:where(.is-layout-grid){gap: 0.5em;}body .is-layout-flex{display: flex;}.is-layout-flex{flex-wrap: wrap;align-items: center;}.is-layout-flex > :is(*, div){margin: 0;}body .is-layout-grid{display: grid;}.is-layout-grid > :is(*, div){margin: 0;}:where(.wp-block-columns.is-layout-flex){gap: 2em;}:where(.wp-block-columns.is-layout-grid){gap: 2em;}:where(.wp-block-post-template.is-layout-flex){gap: 1.25em;}:where(.wp-block-post-template.is-layout-grid){gap: 1.25em;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}
:where(.wp-block-post-template.is-layout-flex){gap: 1.25em;}:where(.wp-block-post-template.is-layout-grid){gap: 1.25em;}
:where(.wp-block-columns.is-layout-flex){gap: 2em;}:where(.wp-block-columns.is-layout-grid){gap: 2em;}
:root :where(.wp-block-pullquote){font-size: 1.5em;line-height: 1.6;}
</style>
<link rel="stylesheet" href="<?= ABS_URL ?>assets/steel/dialog.min.css"><link rel="stylesheet" id="elementor-frontend-css" href="<?= ABS_URL ?>assets/steel/frontend.min.css" media="all">
<link rel="stylesheet" id="widget-image-css" href="<?= ABS_URL ?>assets/steel/widget-image.min.css" media="all">
<link rel="stylesheet" id="widget-nav-menu-css" href="<?= ABS_URL ?>assets/steel/widget-nav-menu.min.css" media="all">
<link rel="stylesheet" id="widget-image-box-css" href="<?= ABS_URL ?>assets/steel/widget-image-box.min.css" media="all">
<link rel="stylesheet" id="widget-mega-menu-css" href="<?= ABS_URL ?>assets/steel/widget-mega-menu.min.css" media="all">
<link rel="stylesheet" id="widget-heading-css" href="<?= ABS_URL ?>assets/steel/widget-heading.min.css" media="all">
<link rel="stylesheet" id="widget-text-editor-css" href="<?= ABS_URL ?>assets/steel/widget-text-editor.min.css" media="all">
<link rel="stylesheet" id="widget-form-css" href="<?= ABS_URL ?>assets/steel/widget-form.min.css" media="all">
<link rel="stylesheet" id="widget-divider-css" href="<?= ABS_URL ?>assets/steel/widget-divider.min.css" media="all">
<link rel="stylesheet" id="widget-icon-list-css" href="<?= ABS_URL ?>assets/steel/widget-icon-list.min.css" media="all">
<link rel="stylesheet" id="e-animation-bounce-css" href="<?= ABS_URL ?>assets/steel/bounce.min.css" media="all">
<link rel="stylesheet" id="e-animation-fadeInUp-css" href="<?= ABS_URL ?>assets/steel/fadeInUp.min.css" media="all">
<link rel="stylesheet" id="e-animation-fadeIn-css" href="<?= ABS_URL ?>assets/steel/fadeIn.min.css" media="all">
<link rel="stylesheet" id="elementor-icons-css" href="<?= ABS_URL ?>assets/steel/elementor-icons.min.css" media="all">
<link rel="stylesheet" id="swiper-css" href="<?= ABS_URL ?>assets/steel/swiper.min.css" media="all">
<link rel="stylesheet" id="e-swiper-css" href="<?= ABS_URL ?>assets/steel/e-swiper.min.css" media="all">
<link rel="stylesheet" id="elementor-post-6-css" href="<?= ABS_URL ?>assets/steel/post-6.css" media="all">
<link rel="stylesheet" id="e-animation-bounceInUp-css" href="<?= ABS_URL ?>assets/steel/bounceInUp.min.css" media="all">
<link rel="stylesheet" id="e-animation-slideInUp-css" href="<?= ABS_URL ?>assets/steel/slideInUp.min.css" media="all">
<link rel="stylesheet" id="e-animation-bounceInLeft-css" href="<?= ABS_URL ?>assets/steel/bounceInLeft.min.css" media="all">
<link rel="stylesheet" id="widget-counter-css" href="<?= ABS_URL ?>assets/steel/widget-counter.min.css" media="all">
<link rel="stylesheet" id="widget-icon-box-css" href="<?= ABS_URL ?>assets/steel/widget-icon-box.min.css" media="all">
<link rel="stylesheet" id="widget-video-css" href="<?= ABS_URL ?>assets/steel/widget-video.min.css" media="all">
<link rel="stylesheet" id="widget-nested-tabs-css" href="<?= ABS_URL ?>assets/steel/widget-nested-tabs.min.css" media="all">
<link rel="stylesheet" id="e-animation-zoomIn-css" href="<?= ABS_URL ?>assets/steel/zoomIn.min.css" media="all">
<link rel="stylesheet" id="widget-loop-builder-css" href="<?= ABS_URL ?>assets/steel/widget-loop-builder.min.css" media="all">
<link rel="stylesheet" id="elementor-post-3465-css" href="<?= ABS_URL ?>assets/steel/post-3465.css" media="all">
<link rel="stylesheet" id="elementor-post-76-css" href="<?= ABS_URL ?>assets/steel/post-76.css" media="all">
<link rel="stylesheet" id="elementor-post-200-css" href="<?= ABS_URL ?>assets/steel/post-200.css" media="all">
<link rel="stylesheet" id="elementor-post-5351-css" href="<?= ABS_URL ?>assets/steel/post-5351.css" media="all">
<link rel="stylesheet" id="google-fonts-1-css" href="<?= ABS_URL ?>assets/steel/css" media="all">
 <!-- Owl Carousal -->
 <link rel="stylesheet" href="./assets/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <!-- Font Awesome -->
<!-- Font Awesome -->
<link rel="stylesheet" id="elementor-icons-shared-0-css" href="<?= ABS_URL ?>assets/steel/fontawesome.min.css" media="all">
<link rel="stylesheet" id="elementor-icons-fa-solid-css" href="<?= ABS_URL ?>assets/steel/solid.min.css" media="all">
<link rel="stylesheet" id="elementor-icons-fa-brands-css" href="<?= ABS_URL ?>assets/steel/brands.min.css" media="all">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin=""><script src="assets/steel/jquery.min.js.download" id="jquery-core-js"></script>
<script src="assets/steel/jquery-migrate.min.js.download" id="jquery-migrate-js"></script>
<link rel="https://api.w.org/" href="<?php echo ABS_URL ?>wp-json/"><link rel="alternate" title="JSON" type="application/json" href="<?php echo ABS_URL ?>wp-json/wp/v2/pages/3465"><link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo ABS_URL ?>xmlrpc.php?rsd">
<meta name="generator" content="WordPress 6.7.1">
<link rel="shortlink" href="<?php echo ABS_URL ?>?p=3465">
 <style> #h5vpQuickPlayer { width: 100%; max-width: 100%; margin: 0 auto; } </style> <meta name="generator" content="Elementor 3.25.4; features: additional_custom_breakpoints, e_optimized_control_loading; settings: css_print_method-external, google_font-enabled, font_display-swap">
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
	    background-color: #E82429!important;
}
#header_btn {
    background: linear-gradient(180deg, #0066A4 0%, #0063A0 34%, #025C95 66%, #044E82 97%, #044D80 100%);
    transition: 0.5s all ease;
}
#header_btn:hover {
    background: linear-gradient(180deg, #025C95 0%, #044E82 34%, #044D80 66%, #0063A0 97%, #0066A4 100%);
}
.search_popup   .dialog-close-button i {
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
	opacity:0.75;
}
@media(max-width:1199px){
	#gallantt_text{
		display:none;
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
#business_slider .elementor-element .swiper~.elementor-swiper-button.swiper-button-disabled{
    border: 2px solid #03001B66;
    border-radius: 30px;
    padding: 10px;
	background: white;
}
#business_slider .elementor-element .swiper~.elementor-swiper-button.swiper-button-disabled svg{
	filter: brightness(0);
}
#business_slider .elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-prev:hover {
    color: inherit;
    border-style: solid;
}
#business_slider .elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-next, .elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-prev {
    border: 2px solid transparent;
    border-radius: 30px;
    padding: 10px;
/*     background: linear-gradient(180deg, #E82429 1%, #BE1D21 30%, #801316 70%, #680F11 100%); */
	background-color: firebrick ;
}
#business_slider .elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-prev {
	 color: inherit;
    border-style: solid!important;
}
#business_slider .elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-next svg{
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
   	height:460px;
    position: relative;
    left: 65px;
    top: 180px;
    margin-bottom: 170px;
    z-index: 1;
    backdrop-filter: blur(5px);
	}}
#discription_section{
	background: linear-gradient(180deg, #0066A4 0%, #0063A0 34%, #025C95 66%, #044E82 97%, #044D80 100%);
}
@media (min-width: 1024px) {
#discription_section{
   	height:360px;
    position: relative;
    right: 40px;
	}}
@media (min-width: 1024px) {
#video_section{
	height:450px;
}
#video_wedget{
		height:500px;
	}}
@media (max-width: 768px) {
#video_section{
	height:250px;
}
#video_wedget{
		height:250px;
	}}
@media (max-width: 576px) {
#video_section{
	height:200px;
}
#video_wedget{
		height:200px;
	}}
.dialog-lightbox-close-button .eicon-close:before{
    content: '';
    display: inline-block;
    width: 30px;
    height: 30px;
    background-size: contain;
	vertical-align: middle;
	-webkit-transition: -webkit-transform .3s ease,color .3s ease;
  -ms-transition: -ms-transform .3s ease,color .3s ease;
  transition: transform .3s ease,color .3s ease;
  -webkit-transform-origin: 50% 50%;
  -ms-transform-origin: 50% 50%;
  transform-origin: 50% 50%;
}
.dialog-lightbox-close-button .eicon-close:hover:before{
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
    background-color:#000000;
}
*::-webkit-scrollbar {
    width: 7px;
	  height:30px;
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
	#box_hover_animation{
  background: rgb(245,245,245);
  background: linear-gradient(90deg, rgba(245,245,245,1) 69%, rgba(0,0,0,1) 66%);
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
  #cmd-box-layout{
    transition: all 0.9s ease;
    position: relative;
  }
  #cmd_sections_hover:hover #cmd-box-layout {
    transform: translate(0px, -25px);
  }
	 #discription_section{
    transition: all 0.9s ease;
    position: relative;
  }
  #cmd_sections_hover:hover #discription_section{
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
@media(min-width:1199px){
#video_section .elementor-wrapper {
  --video-aspect-ratio: 0;
	}}
#primery_menu .sub-arrow i{
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
#video_section .elementor-custom-embed-image-overlay img{
	transition:0.9s ease all;
	transition-delay: 100ms;
}
#video_section:hover .elementor-custom-embed-image-overlay img{
	filter:grayscale(1);
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
#counters_border_bottom .elementor-counter-number-wrapper:after{
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
opacity :0;
}
.team_inner .elementor-widget-container:hover{
opacity :1;
}
.team_inner  {
    width: 100%;
    height: 100%;
    background-size: contain;
	background-position: bottom center;
	background-repeat: no-repeat;
}
#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper, .swiper-container) ~ .elementor-swiper-button-prev,
#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper, .swiper-container) ~ .elementor-swiper-button-next {
  border: 2px solid #03001B66;
  border-radius: 30px;
  padding: 10px;
  background-color: white;
	transition: 0.5s all ease;
}
#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper, .swiper-container) ~ .elementor-swiper-button-prev:hover,
#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper, .swiper-container) ~ .elementor-swiper-button-next:hover {
  background-color: firebrick ;
  border: 2px solid transparent;
}
#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper, .swiper-container) ~ .elementor-swiper-button-prev:hover svg,
#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper, .swiper-container) ~ .elementor-swiper-button-next:hover svg {
  filter: invert(1);
}
@media (min-width: 1024px) {
  .forgin_an{
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
#cement_form  .elementor-field-group {
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
	margin-bottom:25px;
}
#cement_form .e-form__buttons {
    margin-top:30px;
}
@media (min-width: 1024px) {
#steel_img_box{
    width: 87%;
	}}
#cursor-pointer{
cursor: pointer;
}
#tab_section .elementor-widget-n-tabs .e-n-tabs-heading {
  background: var( --e-global-color-primary );
  border-radius: 30px;
}
.aioseo-breadcrumb{
    color: white;
    font-weight: 600;
}
.aioseo-breadcrumb a{
  font-weight: 200;
     color: white;
}
.aioseo-breadcrumb-separator{
  color: white;
}
#acco_left_border{
	border-left:4px solid #000000;
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
#primery_menu .elementor-nav-menu--dropdown li a{
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
    color: #fff;
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
        transform: scale(1.3); }
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
@media(min-width:1199px){
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
#view-data-btn{
  background-color: var(--e-global-color-primary);
  color: #ffffff;
  font-family: "Jost", Sans-serif;
  font-size: 16px;
  font-weight: 600;
  line-height: 28px;
  border-radius: 30px 30px 30px 30px;
  padding: 8px 40px 8px 40px;
  border: 0;
	margin-top:40px;
}
.custom_price_table{
	width: 600px;
  border-collapse: collapse;
  overflow-x: scroll;
  font-size: 17px;
  font-weight: 600;
  text-align: center;
}
#data-table-container{
	display:flex;
	justify-content:center;
}
.filter_div{
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
.custom_price_table th, .custom_price_table td {
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
.swiper-horizontal>.swiper-pagination-bullets, .swiper-pagination-bullets.swiper-pagination-horizontal, .swiper-pagination-custom, .swiper-pagination-fraction {
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
		<script src="assets/steel/wp-emoji-release.min.js.download" defer=""></script></head>
<body class="page-template-default page page-id-3465 wp-custom-logo elementor-default elementor-kit-6 elementor-page elementor-page-3465 e--ua-blink e--ua-chrome e--ua-webkit dialog-body dialog-lightbox-body dialog-container dialog-lightbox-container" data-elementor-device-mode="desktop">
<?php require_once ABS_PATH . './components/navbar/header.php'; ?>
<main id="content" class="site-main post-3465 page type-page status-publish hentry">
	<div class="page-content">
				<div data-elementor-type="wp-page" data-elementor-id="3465" class="elementor elementor-3465 elementor-motion-effects-parent" data-elementor-post-type="page">
				<div class="elementor-element elementor-element-ceeb535 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="ceeb535" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
					<div class="e-con-inner">
		<div class="elementor-element elementor-element-74149bb e-con-full e-flex e-con e-child" data-id="74149bb" data-element_type="container">
				<div class="elementor-element elementor-element-6753edb elementor-widget elementor-widget-heading" data-id="6753edb" data-element_type="widget" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default text-light">"Forging the Backbone of Tomorrow’s Infrastructure” </h2>		</div>
				</div>
		<div class="elementor-element elementor-element-a6460b6 e-con-full e-flex e-con e-child" data-id="a6460b6" data-element_type="container">
				<div class="elementor-element elementor-element-7e05d77 elementor-widget elementor-widget-heading" data-id="7e05d77" data-element_type="widget" data-widget_type="heading.default">
				<div class="elementor-widget-container">
					</div>
				</div>
				<div class="elementor-element elementor-element-1978258 elementor-widget elementor-widget-heading" data-id="1978258" data-element_type="widget" data-widget_type="heading.default">
				</div>
				</div>
				</div>
		<div class="elementor-element elementor-element-aa958dc e-con-full e-flex e-con e-child" data-id="aa958dc" data-element_type="container">
				<div class="elementor-element elementor-element-259dbe0 rotate-animation elementor-hidden-mobile elementor-widget elementor-widget-image" data-id="259dbe0" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img decoding="async" width="59" height="60" src="assets/steel/triangle-icon.png" class="attachment-large size-large wp-image-5503" alt="">													</div>
				</div>
				<div class="elementor-element elementor-element-3c576d8 elementor-widget elementor-widget-heading" data-id="3c576d8" data-element_type="widget" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default text-light">Steel</h2>		</div>
				</div>
				<div class="elementor-element elementor-element-9d08749 elementor-widget__width-initial elementor-widget elementor-widget-heading" data-id="9d08749" data-element_type="widget" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<p class="elementor-heading-title elementor-size-default text-light">Transforming Ore to Steel: Precision &amp; Strength Redefined
</p>		</div>
				</div>
				<div class="elementor-element elementor-element-be171e5 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="be171e5" data-element_type="widget" data-widget_type="divider.default">
				<div class="elementor-widget-container">
					<div class="elementor-divider">
			<span class="elementor-divider-separator">
						</span>
		</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-607a9dc elementor-absolute elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="607a9dc" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="divider.default">
				<div class="elementor-widget-container">
					<div class="elementor-divider">
			<span class="elementor-divider-separator">
						</span>
		</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-0a490ba elementor-widget elementor-widget-wp-widget-aioseo-breadcrumb-widget" data-id="0a490ba" data-element_type="widget" data-widget_type="wp-widget-aioseo-breadcrumb-widget.default">
				<div class="elementor-widget-container">
			<div class="aioseo-breadcrumbs"><span class="aioseo-breadcrumb">
	<a href=index.php title="Home">Home</a>
</span><span class="aioseo-breadcrumb-separator">/</span><span class="aioseo-breadcrumb">
	Steel
</span></div>		</div>
				</div>
				</div>
					</div>
				</div>
		<div class="elementor-element elementor-element-a6a3815 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="a6a3815" data-element_type="container">
					<div class="e-con-inner">
				<div class="elementor-element elementor-element-91f7f69 elementor-widget elementor-widget-heading animated bounceInUp" data-id="91f7f69" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default">Synergizing Ore into Refined Steel</h2>		</div>
				</div>
				<div class="elementor-element elementor-element-e90d3d7 elementor-widget elementor-widget-text-editor animated slideInUp" data-id="e90d3d7" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slideInUp&quot;}" data-widget_type="text-editor.default">
				</div>
					</div>
				</div>
		<div class="elementor-element elementor-element-2f0064b spacing e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="2f0064b" data-element_type="container">
					<div class="e-con-inner">
		<div class="elementor-element elementor-element-a720aee e-con-full e-flex e-con e-child" data-id="a720aee" data-element_type="container">
				<div class="elementor-element elementor-element-05ea86b elementor-widget elementor-widget-heading animated bounceInUp" data-id="05ea86b" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default">Believing in Steel, Building with Trust</h2>		</div>
				</div>
				<div class="elementor-element elementor-element-d0acda7 elementor-invisibl elementor-widget elementor-widget-text-editor" data-id="d0acda7" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slideInUp&quot;}" data-widget_type="text-editor.default">
				<div class="elementor-widget-container text-justify">
							We believe in steel, not just as material, but as a symbol of unwavering commitment. Just like India's relentless infrastructure push, Gallantt Advance Fe550D TMT Rebars embody endurance, precision, and reliability. They rise to the challenge, withstand the test of time, and carry the weight of ambition. Every kilometer paved, every station built, every dream realized reflects not just the visionaries, but the silent heroes – the steel that binds, the trust that fuels. We are proud to be part of this saga, contributing to a stronger, more connected India, building the India of tomorrow, one unwavering structure at a time.						</div>
				</div>
				</div>
		<div class="elementor-element elementor-element-3c26e2c e-con-full e-flex e-con e-child" data-id="3c26e2c" data-element_type="container">
				<div class="elementor-element elementor-element-bd1400c elementor-invisibl elementor-widget elementor-widget-image" data-id="bd1400c" data-element_type="widget" id="stare-of-image" data-settings="{&quot;_animation&quot;:&quot;bounceInLeft&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img fetchpriority="high" decoding="async" width="2560" height="2560" src="assets/steel/Believing-in-Steel-Building-with-Trust-scaled.jpg" class="attachment-full size-full wp-image-7113" alt="Believing in Steel Building with Trust" >													</div>
				</div>
				</div>
					</div>
				</div>
		<div class="elementor-element elementor-element-20ae85f e-flex e-con-boxed e-con e-parent" data-id="20ae85f" data-element_type="container">
					<div class="e-con-inner">
		<div class="elementor-element elementor-element-3edcdf4 e-con-full e-flex e-con e-child" data-id="3edcdf4" data-element_type="container">
				</div>
		<div class="elementor-element elementor-element-339a865 e-con-full e-flex e-con e-child" data-id="339a865" data-element_type="container">
		<div class="elementor-element elementor-element-69d8cae e-con-full e-flex e-con e-child" data-id="69d8cae" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
				<div class="elementor-element elementor-element-c263af0 elementor-widget elementor-widget-text-editor" data-id="c263af0" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							Our Product
Range						</div>
				</div>
				<div class="elementor-element elementor-element-b1bf023 elementor-widget elementor-widget-text-editor" data-id="b1bf023" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							Fe550D TMT Rebars<br>
Fe550, Fe500 , Fe 500D, Fe 500CRS, Fe 500DCRS						</div>
				</div>
				</div>
				</div>
					</div>
				</div>
		<div id="manufacturing-process" class="elementor-element elementor-element-d56f9c0 e-flex e-con-boxed e-con e-parent" data-id="d56f9c0" data-element_type="container"  ><div class="elementor-background-slideshow swiper" dir="rtl"><div class="swiper-wrapper"><div class="elementor-background-slideshow__slide swiper-slide">
            <div class="elementor-background-slideshow__slide__image" style="background-image:linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo ABS_URL ?>assets/steel/bg.jpg');">
                 <div class="bg-overlay"></div>
            </div></div></div></div>
					<div class="e-con-inner">
				<div class="elementor-element elementor-element-9492e4d elementor-widget elementor-widget-text-editor" data-id="9492e4d" data-element_type="widget" data-widget_type="text-editor.default">
				</div>
				<div class="elementor-element elementor-element-8584702 elementor-invisibl elementor-widget elementor-widget-heading" data-id="8584702" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default text-light">Crafting Steel Excellence</h2>		</div>
				</div>
		<div class="elementor-element elementor-element-998a01b e-con-full e-flex e-con e-child" data-id="998a01b" data-element_type="container">
		<div class="elementor-element elementor-element-d356b74 e-con-full e-flex e-con e-child" data-id="d356b74" data-element_type="container">
				<div class="elementor-element elementor-element-fd5a17d elementor-invisibl elementor-widget elementor-widget-heading" data-id="fd5a17d" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default">Manufacturing Process</h2>		</div>
				</div>
				<div class="elementor-element elementor-element-30078d8 elementor-invisibl elementor-widget elementor-widget-text-editor" data-id="30078d8" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slideInUp&quot;}" data-widget_type="text-editor.default">
				<div class="elementor-widget-container text-justify">
							Our state-of-the-art manufacturing facility embodies unparalleled Process, integrating a sponge iron unit, steel melt shop, rolling mill, pellet plant. With precision engineering and cutting-edge technology, we ensure seamless production. deliver-ing high-quality steel products while optimizing efficiency and maintaining envision0-metal sustainability. 						</div>
				</div>
				</div>
		<div class="elementor-element elementor-element-b0491ef e-con-full e-flex e-con e-child" data-id="b0491ef" data-element_type="container">
				<div class="elementor-element elementor-element-8af1f42 elementor-widget elementor-widget-html" data-id="8af1f42" data-element_type="widget" data-widget_type="html.default">
				<div class="elementor-widget-container">
			<style>
            table {
                width: 100%;
                border-collapse: collapse;
                font-family: "Kumbh Sans", Sans-serif;
                font-size: 16px;
                font-weight: 400;
                line-height: 28px;
                color:#fff;
                overflow-x: scroll;
            }
            th {
                border: 2px solid #F6F6F6;
                text-align: left;
                padding: 8px 8px 8px 15px
            }
            th {
                background-color: #F38929;
                color: #FFF;
                font-family: "Jost", sans-serif;
                font-size: 20px;
                font-weight: 600;
                line-height: 28px;
                width: 50%;
            }
            td {
                padding: 15px;
                border-right: 1px solid #FFFFFF3D;
            }
            table th,
            table td {
                border-bottom: 0;
                border-top: 0
            }
            table th,
            table td {
                padding: 15px;
                line-height: 1.5;
                vertical-align: top;
                border: 1px solid #f5f5f5;
                text-align: center;
				color: #fff;
            }
        </style>
            <table>
                <thead>
                    <tr>
                        <th style="border-right: 1px solid black;">Units</th>
                        <th>Total Group Capacity (TPA)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sponge Iron</td>
                        <td>1035000</td>
                    </tr>
                    <tr>
                        <td>Pellet Plant</td>
                        <td>792000</td>
                    </tr>
                    <tr>
                        <td>Steel Melt Shop</td>
                        <td>1031250</td>
                    </tr>
                    <tr>
                        <td>Rolling Mil</td>
                        <td>950400</td>
                    </tr>
                    <tr>
                        <td>Captive Power Plant</td>
                        <td>129 MW</td>
                    </tr>
                </tbody>
            </table>		</div>
				</div>
				</div>
				</div>
		<div class="elementor-element elementor-element-979e7f4 e-con-full e-flex e-con e-child" data-id="979e7f4" data-element_type="container">
		<div class="elementor-element elementor-element-a153030 e-grid e-con-boxed e-con e-child" data-id="a153030" data-element_type="container">
				</div>
				</div>
		<div class="elementor-element elementor-element-4603fcd e-con-full e-flex e-con e-child" data-id="4603fcd" data-element_type="container">
		<div class="elementor-element elementor-element-dc40c26 e-con-full e-flex e-con e-child" data-id="dc40c26" data-element_type="container">
				<div class="elementor-element elementor-element-820c7ee elementor-widget elementor-widget-text-editor" data-id="820c7ee" data-element_type="widget" data-widget_type="text-editor.default">
				</div>
				<div class="elementor-element elementor-element-2a45c7d elementor-invisibl elementor-widget elementor-widget-heading" data-id="2a45c7d" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default">Fully automated steel making</h2>		</div>
				</div>
				</div>
		<div class="elementor-element elementor-element-1c51d88 e-con-full e-flex e-con e-child" data-id="1c51d88" data-element_type="container">
		<div class="elementor-element elementor-element-fb8dcd5 e-con-full e-flex e-con e-child" data-id="fb8dcd5" data-element_type="container">
				<div class="elementor-element elementor-element-296ee4f elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="296ee4f" data-element_type="widget" data-widget_type="icon-list.default">
				<div class="elementor-widget-container">
					<ul class="elementor-icon-list-items">
							<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text">Ladle Refining Furnace</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text">Rolling Mill</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text">Quenched Tempered In Line Steel Making</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text">Online Real Time Quality Monitoring</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text">Automatic Bar Bending, bundling &amp; Loading </span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text">Internationally Acclaimed Labs</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text">Cement Plant</span>
									</li>
						</ul>
				</div>
				</div>
				</div>
		<div class="elementor-element elementor-element-a4ec3ce e-con-full e-flex e-con e-child" data-id="a4ec3ce" data-element_type="container">
				<div class="elementor-element elementor-element-55e742a elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="55e742a" data-element_type="widget" data-widget_type="icon-list.default">
				<div class="elementor-widget-container">
					<ul class="elementor-icon-list-items">
							<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text">Captive power plant</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text">Company owned railway racks</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text">Railway Siding</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text">Wagon tippler</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text">Sponge iron kilns</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text">Pellet paint</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text">Steel melt shop</span>
									</li>
						</ul>
				</div>
				</div>
				</div>
				</div>
				</div>
					</div>
				</div>
		<div class="elementor-element elementor-element-f4fb36f e-flex e-con-boxed e-con e-parent" data-id="f4fb36f" data-element_type="container">
					<div class="e-con-inner">
				<div class="elementor-element elementor-element-449119e elementor-widget elementor-widget-text-editor" data-id="449119e" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							Manufacturing Prowess						</div>
				</div>
				<div class="elementor-element elementor-element-8b30b71 elementor-invisibl elementor-widget elementor-widget-heading" data-id="8b30b71" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default">Integrated Steel Making Process</h2>		</div>
				</div>
				<div class="elementor-element elementor-element-8b50668 elementor-widget elementor-widget-video" data-id="8b50668" data-element_type="widget" data-settings="{&quot;video_type&quot;:&quot;hosted&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;play_on_mobile&quot;:&quot;yes&quot;,&quot;mute&quot;:&quot;yes&quot;,&quot;loop&quot;:&quot;yes&quot;}" data-widget_type="video.default">
				<div class="elementor-widget-container">
					<div class="e-hosted-video elementor-wrapper elementor-open-inline">
					<video class="elementor-video" src="https://res.cloudinary.com/videoapi-demo/video/upload/q_auto/mpwvvgjffq6wpvge9nbe.mp4" autoplay="" loop="" muted="muted" playsinline="" controlslist="nodownload"></video>
				</div>
				</div>
				</div>
					</div>
				</div>
		<div class="elementor-element elementor-element-87c0c08 e-flex e-con-boxed e-con e-parent elementor-motion-effects-element" data-id="87c0c08" data-element_type="container" data-settings="{&quot;motion_fx_motion_fx_scrolling&quot;:&quot;yes&quot;,&quot;motion_fx_translateY_effect&quot;:&quot;yes&quot;,&quot;motion_fx_translateY_speed&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:5,&quot;sizes&quot;:[]},&quot;motion_fx_translateY_affectedRange&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:0,&quot;end&quot;:100}},&quot;motion_fx_devices&quot;:[&quot;desktop&quot;,&quot;tablet&quot;,&quot;mobile&quot;]}" style="margin-bottom: 250px;--translateY: 211.20000000000002px; --e-transform-transition-duration: 100ms; transform: translateY(var(--translateY));">
					<div class="e-con-inner">
		<div class="elementor-element elementor-element-be249d2 e-con-full e-flex e-con e-child" data-id="be249d2" data-element_type="container">
		<div class="elementor-element elementor-element-d161987 e-con-full e-flex e-con e-child" data-id="d161987" data-element_type="container">
				<div class="elementor-element elementor-element-080bbac elementor-position-top elementor-widget elementor-widget-image-box" data-id="080bbac" data-element_type="widget" id="steel_img_box" data-widget_type="image-box.default">
				<div class="elementor-widget-container">
			<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img decoding="async" src="assets/steel/higher-yield-strength.svg" class="attachment-full size-full wp-image-4392" alt=""></figure><div class="elementor-image-box-content"><h3 class="elementor-image-box-title">Higher yield strength</h3><p class="elementor-image-box-description">Higher yield strength and load-bearing capacity, require less steel for the same structural integrity, contributing to overall project costsavings</p></div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-3281991 elementor-absolute elementor-hidden-mobile elementor-view-default elementor-widget elementor-widget-icon" data-id="3281991" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="6" height="50" viewBox="0 0 6 50" fill="none"><path d="M3 0.203125L0.113249 5.20312H5.88675L3 0.203125ZM2.5 3.28418V5.33822H3.5V3.28418H2.5ZM2.5 7.39225V9.44629H3.5V7.39225H2.5ZM2.5 11.5003V13.5544H3.5V11.5003H2.5ZM2.5 15.6084V17.6624H3.5V15.6084H2.5ZM2.5 19.7165V21.7705H3.5V19.7165H2.5ZM2.5 23.8245V25.8786H3.5V23.8245H2.5ZM2.5 27.9326V29.9867H3.5V27.9326H2.5ZM2.5 32.0407V34.0947H3.5V32.0407H2.5ZM2.5 36.1488V38.2028H3.5V36.1488H2.5ZM2.5 40.2568V42.3109H3.5V40.2568H2.5ZM2.5 44.3649V46.4189H3.5V44.3649H2.5ZM2.5 48.473V49.5H3.5V48.473H2.5Z" fill="black"></path></svg>			</div>
		</div>
				</div>
				</div>
				</div>
		<div class="elementor-element elementor-element-7a1c754 e-con-full e-flex e-con e-child" data-id="7a1c754" data-element_type="container">
				<div class="elementor-element elementor-element-6f722c3 elementor-position-top elementor-widget elementor-widget-image-box" data-id="6f722c3" data-element_type="widget" id="steel_img_box" data-widget_type="image-box.default">
				<div class="elementor-widget-container">
			<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img decoding="async" src="assets/steel/better-bonding.svg" class="attachment-full size-full wp-image-4427" alt=""></figure><div class="elementor-image-box-content"><h3 class="elementor-image-box-title">Better Bonding</h3><p class="elementor-image-box-description">The double M Rib design with 360 Riblack Technology creates a robust bandbetween stool and concrete resulting in much superior bond strength</p></div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-4bdb779 elementor-absolute elementor-hidden-mobile elementor-view-default elementor-widget elementor-widget-icon" data-id="4bdb779" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="6" height="50" viewBox="0 0 6 50" fill="none"><path d="M3 0.203125L0.113249 5.20312H5.88675L3 0.203125ZM2.5 3.28418V5.33822H3.5V3.28418H2.5ZM2.5 7.39225V9.44629H3.5V7.39225H2.5ZM2.5 11.5003V13.5544H3.5V11.5003H2.5ZM2.5 15.6084V17.6624H3.5V15.6084H2.5ZM2.5 19.7165V21.7705H3.5V19.7165H2.5ZM2.5 23.8245V25.8786H3.5V23.8245H2.5ZM2.5 27.9326V29.9867H3.5V27.9326H2.5ZM2.5 32.0407V34.0947H3.5V32.0407H2.5ZM2.5 36.1488V38.2028H3.5V36.1488H2.5ZM2.5 40.2568V42.3109H3.5V40.2568H2.5ZM2.5 44.3649V46.4189H3.5V44.3649H2.5ZM2.5 48.473V49.5H3.5V48.473H2.5Z" fill="black"></path></svg>			</div>
		</div>
				</div>
				</div>
				</div>
				</div>
		<div class="elementor-element elementor-element-100d678 e-con-full elementor-hidden-mobile e-flex e-con e-child" data-id="100d678" data-element_type="container">
				<div class="elementor-element elementor-element-d642b62 elementor-widget elementor-widget-image" data-id="d642b62" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img loading="lazy" decoding="async" width="768" height="230" src="assets/steel/steel-img-768x230.webp" class="attachment-medium_large size-medium_large wp-image-3868" alt="" >													</div>
				</div>
				<div class="elementor-element elementor-element-4c123fe elementor-absolute achieve_dot_1  elementor-view-default elementor-widget elementor-widget-icon" data-id="4c123fe" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none"><circle cx="17.6399" cy="18" r="17.5" fill="#FFD7B4"></circle><circle cx="17.6399" cy="18" r="12.7969" fill="#F3A629"></circle></svg>			</div>
		</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-152c6c8 elementor-absolute achieve_dot_1  elementor-view-default elementor-widget elementor-widget-icon" data-id="152c6c8" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none"><circle cx="17.6399" cy="18" r="17.5" fill="#FFD7B4"></circle><circle cx="17.6399" cy="18" r="12.7969" fill="#F3A629"></circle></svg>			</div>
		</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-9480605 elementor-absolute achieve_dot_1  elementor-view-default elementor-widget elementor-widget-icon" data-id="9480605" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none"><circle cx="17.6399" cy="18" r="17.5" fill="#FFD7B4"></circle><circle cx="17.6399" cy="18" r="12.7969" fill="#F3A629"></circle></svg>			</div>
		</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-4de6fe5 elementor-absolute achieve_dot_1  elementor-view-default elementor-widget elementor-widget-icon" data-id="4de6fe5" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none"><circle cx="17.6399" cy="18" r="17.5" fill="#FFD7B4"></circle><circle cx="17.6399" cy="18" r="12.7969" fill="#F3A629"></circle></svg>			</div>
		</div>
				</div>
				</div>
				</div>
		<div class="elementor-element elementor-element-ff9177b e-con-full e-flex e-con e-child" data-id="ff9177b" data-element_type="container">
		<div class="elementor-element elementor-element-8a98c98 e-con-full e-flex e-con e-child" data-id="8a98c98" data-element_type="container">
				<div class="elementor-element elementor-element-358ec86 elementor-position-top elementor-widget elementor-widget-image-box" data-id="358ec86" data-element_type="widget" id="steel_img_box" data-widget_type="image-box.default">
				<div class="elementor-widget-container">
			<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img decoding="async" src="assets/steel/excellent-ductility-elongation.svg" class="attachment-full size-full wp-image-4428" alt=""></figure><div class="elementor-image-box-content"><h3 class="elementor-image-box-title">Excellent Ductility &amp; Elongation</h3><p class="elementor-image-box-description">Excellent flexibility &amp; uniform elongation induces superior seismic resistance propertries which minimizes the risk of demage during earthquakes safeguarding your structures &amp; Ives</p></div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-79356f3 elementor-absolute elementor-hidden-mobile elementor-view-default elementor-widget elementor-widget-icon" data-id="79356f3" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="6" height="50" viewBox="0 0 6 50" fill="none"><path d="M3 0.203125L0.113249 5.20312H5.88675L3 0.203125ZM2.5 3.28418V5.33822H3.5V3.28418H2.5ZM2.5 7.39225V9.44629H3.5V7.39225H2.5ZM2.5 11.5003V13.5544H3.5V11.5003H2.5ZM2.5 15.6084V17.6624H3.5V15.6084H2.5ZM2.5 19.7165V21.7705H3.5V19.7165H2.5ZM2.5 23.8245V25.8786H3.5V23.8245H2.5ZM2.5 27.9326V29.9867H3.5V27.9326H2.5ZM2.5 32.0407V34.0947H3.5V32.0407H2.5ZM2.5 36.1488V38.2028H3.5V36.1488H2.5ZM2.5 40.2568V42.3109H3.5V40.2568H2.5ZM2.5 44.3649V46.4189H3.5V44.3649H2.5ZM2.5 48.473V49.5H3.5V48.473H2.5Z" fill="black"></path></svg>			</div>
		</div>
				</div>
				</div>
				</div>
		<div class="elementor-element elementor-element-66f5700 e-con-full e-flex e-con e-child" data-id="66f5700" data-element_type="container">
				<div class="elementor-element elementor-element-9f32bb2 elementor-position-top elementor-widget elementor-widget-image-box" data-id="9f32bb2" data-element_type="widget" id="steel_img_box" data-widget_type="image-box.default">
				<div class="elementor-widget-container">
			<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img decoding="async" src="assets/steel/unlocked-savings.svg" class="attachment-full size-full wp-image-4429" alt=""></figure><div class="elementor-image-box-content"><h3 class="elementor-image-box-title">Unlocked Savings</h3><p class="elementor-image-box-description">Upto y% of direct saving on overall steal consumption due to less number of rebars required and reduced maintenance costs as corrosion-resistant properties extend the life of structures.</p></div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-442ac37 elementor-absolute elementor-hidden-mobile elementor-view-default elementor-widget elementor-widget-icon" data-id="442ac37" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="6" height="50" viewBox="0 0 6 50" fill="none"><path d="M3 0.203125L0.113249 5.20312H5.88675L3 0.203125ZM2.5 3.28418V5.33822H3.5V3.28418H2.5ZM2.5 7.39225V9.44629H3.5V7.39225H2.5ZM2.5 11.5003V13.5544H3.5V11.5003H2.5ZM2.5 15.6084V17.6624H3.5V15.6084H2.5ZM2.5 19.7165V21.7705H3.5V19.7165H2.5ZM2.5 23.8245V25.8786H3.5V23.8245H2.5ZM2.5 27.9326V29.9867H3.5V27.9326H2.5ZM2.5 32.0407V34.0947H3.5V32.0407H2.5ZM2.5 36.1488V38.2028H3.5V36.1488H2.5ZM2.5 40.2568V42.3109H3.5V40.2568H2.5ZM2.5 44.3649V46.4189H3.5V44.3649H2.5ZM2.5 48.473V49.5H3.5V48.473H2.5Z" fill="black"></path></svg>			</div>
		</div>
				</div>
				</div>
				</div>
				</div>
					</div>
				</div>
		<div class="elementor-element elementor-element-bb33f2c e-flex e-con-boxed e-con e-parent" data-id="bb33f2c" data-element_type="container">
					<div class="e-con-inner">
				<div class="elementor-element elementor-element-7b3e1e3 elementor-widget elementor-widget-text-editor" data-id="7b3e1e3" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							Strong Bonds, Solid Structures						</div>
				</div>
				<div class="elementor-element elementor-element-5b707a7 elementor-invisibl elementor-widget elementor-widget-heading" data-id="5b707a7" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default">Forging an Unbreakable Bond</h2>		</div>
				</div>
				<div class="elementor-element elementor-element-abd8cc9 elementor-invisibl elementor-widget elementor-widget-text-editor" data-id="abd8cc9" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slideInUp&quot;}" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							What makes a strong bond?						</div>
				</div>
					</div>
				</div>
		<div class="elementor-element elementor-element-1ddf8ed box_forgin_an e-flex e-con-boxed e-con e-parent" data-id="1ddf8ed" data-element_type="container">
					<div class="e-con-inner">
		<div class="elementor-element elementor-element-5b5880f e-con-full e-flex e-con e-child" data-id="5b5880f" data-element_type="container">
				<div class="elementor-element elementor-element-fd384dc elementor-invisibl elementor-widget elementor-widget-heading" data-id="fd384dc" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default">A strong bond between TMT rebar and concrete results from a combination of factors:</h2>		</div>
				</div>
				<div class="elementor-element elementor-element-accff77 elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="accff77" data-element_type="widget" data-widget_type="icon-list.default">
				<div class="elementor-widget-container">
					<ul class="elementor-icon-list-items ">
							<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text text-justify"><span style="font-weight:600;">Ribbed Design :</span> Unlike smooth bars, TMT rebar features strategic ribs that interlock with the concrete, creating a powerful mechanical grip. This prevents slippage and ensures effective stress transfer.</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text text-justify"><span style="font-weight:600;">Chemical Adhesion : </span>The alkaline nature of concrete triggers a chemical reaction with the steel in the TMT rebar, forming a microscopic bond that further strengthens the connection.</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-circle"></i>						</span>
										<span class="elementor-icon-list-text text-justify"><span style="font-weight:600;">Meticulous Placement and Coverage : </span>Precise positioning and adequate concrete cover ensure the rebar is fully encased, protecting it from corrosion and maximizing its load-bearing capacity.</span>
									</li>
						</ul>
				</div>
				</div>
				</div>
		<div class="elementor-element elementor-element-4164420 e-con-full e-flex e-con e-child" data-id="4164420" data-element_type="container">
		<div class="elementor-element elementor-element-b601fa2 e-con-full e-flex e-con e-child" data-id="b601fa2" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
				<div class="elementor-element elementor-element-4b4e25a forgin_an elementor-widget elementor-widget-image" data-id="4b4e25a" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img loading="lazy" decoding="async" width="2560" height="2560" src="assets/steel/Forging-an-Unbreakable-Bond-scaled.jpg" class="attachment-full size-full wp-image-7117" alt="" >													</div>
				</div>
				</div>
				</div>
					</div>
				</div>
		<div class="elementor-element elementor-element-060e09e e-flex e-con-boxed e-con e-parent" data-id="060e09e" data-element_type="container">
					<div class="e-con-inner">
		<div class="elementor-element elementor-element-5ebc55f e-con-full e-flex e-con e-child" data-id="5ebc55f" data-element_type="container">
				<div class="elementor-element elementor-element-8281ce2 elementor-widget elementor-widget-image" data-id="8281ce2" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img loading="lazy" decoding="async" width="800" height="884" src="assets/steel/The-Power-of-Precision-Amplifying-Bond-Strength-with-double-M-Ribs-927x1024.png" class="attachment-large size-large wp-image-7121" alt="The Power of Precision Amplifying Bond Strength with double M Ribs" >													</div>
				</div>
				</div>
		<div class="elementor-element elementor-element-dd3f130 e-con-full e-flex e-con e-child" data-id="dd3f130" data-element_type="container">
				<div class="elementor-element elementor-element-d590417 elementor-widget elementor-widget-text-editor" data-id="d590417" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							M-Grip: Redefining Structural Strength						</div>
				</div>
				<div class="elementor-element elementor-element-11d9ec1 elementor-invisibl elementor-widget elementor-widget-heading" data-id="11d9ec1" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default">The Power of Precision:
Amplifying Bond Strength with double M Ribs</h2>		</div>
				</div>
				<div class="elementor-element elementor-element-146f333 elementor-invisibl elementor-widget elementor-widget-text-editor" data-id="146f333" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slideInUp&quot;}" data-widget_type="text-editor.default">
				<div class="elementor-widget-container text-justify">
							TMT Bars form the backbone of every construction, be it foundation, column, beam or the slab in any RCC structure across both in commercial and resedential projects. TMT bars are used all projects as a prime element providing the required shape, strength, ductility and durability to every civil structure. Our unwavering commitment to crafting
the cleanest, purest steel possible is why we've invested in cutting-edge ladle refining furnace technology. This innovative process meticulously removes impurities by de- sulphurisation and de- phosphorisation, lowering of gas contents, and adjusting temperature for tapping and alloying, resulting in rebar with 20% higher tensile strength
and excellent ductility.						</div>
				</div>
				</div>
					</div>
				</div>
		<!-- Custom -->
		 <style>
			.custom-01
			{
				padding: 50px 0;
				background-color: #20364D;
			}
			.custom-01 ul li button
			{
				background: transparent;
    border-style: solid;
    border-width: 1px 1px 1px 1px;
    border-color: #fff;
	border-radius: 50px !important;
	padding: 15px 45px;
	font-weight: 700;
	color: #fff !important;
			}
			.custom-01 ul li .active{background-color: #fff !important; color: #20364D !important;}
			.custom-01 ul li
			{
				padding: 0 20px;
			}
		 </style>
		<section class="custom-01">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-12">
					<img src="./assets/steel/Charts_For_data.jpg" alt="" class="img-fluid">
					</div>
				</div>
			</div>
		</section>
		<div class="elementor-element elementor-element-58e7a59 spacing e-flex e-con-boxed e-con e-parent" data-id="58e7a59" data-element_type="container">
					<div class="e-con-inner">
		<div class="elementor-element elementor-element-d0478a0 e-con-full e-flex e-con e-child" data-id="d0478a0" data-element_type="container">
				<div class="elementor-element elementor-element-4695839 elementor-widget elementor-widget-image" data-id="4695839" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img loading="lazy" decoding="async" width="1084" height="1080" src="assets/steel/LRF-Refining-Excellence-1.png" class="attachment-full size-full wp-image-7129" alt="LRF Refining-Excellence">													</div>
				</div>
				</div>
		<div class="elementor-element elementor-element-e5eacae e-con-full e-flex e-con e-child" data-id="e5eacae" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
				<div class="elementor-element elementor-element-df44def elementor-invisibl elementor-widget elementor-widget-heading" data-id="df44def" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default text-light">LRF Refining Excellence</h2>		</div>
				</div>
				<div class="elementor-element elementor-element-b7d0431 elementor-invisibl elementor-widget elementor-widget-text-editor" data-id="b7d0431" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slideInUp&quot;}" data-widget_type="text-editor.default">
				<div class="elementor-widget-container text-justify">
							TMT Bars form the backbone of every construction, be it foundation, column, beam or
the slab in any RCC structure across both in commercial and resedential projects. TMT
bars are used all projects as a prime element providing the required shape, strength,
ductility and durability to every civil structure. Our unwavering commitment to crafting
the cleanest, purest steel possible is why we've invested in cutting-edge ladle refining
furnace technology. This innovative process meticulously removes impurities by de-
sulphurisation and de- phosphorisation, lowering of gas contents, and adjusting
temperature for tapping and alloying, resulting in rebar with 20% higher tensile strength
and excellent ductility.						</div>
				</div>
				</div>
					</div>
				</div>
				<style>
		.brochure-box{background:#f8f8f8;border-radius:20px;padding:40px;text-align:center;max-width:700px;margin:40px auto;box-shadow:0 0 5px rgb(0 0 0 / .05)}.download-link{text-decoration:none;color:#111;display:inline-flex;flex-direction:column;align-items:center;gap:10px}.download-link img{width:40px;height:auto;filter:grayscale(100%) sepia(100%) hue-rotate(-50deg) saturate(500%) brightness(1.2)}.download-link .text{font-size:16px;font-weight:500}
				</style>
		<?php if (!empty($brochures)): ?>
    <div class="brochure-box py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="mb-4 text-center">Brochure Download</h2>
                <ul class="list-unstyled d-flex flex-wrap justify-content-center text-center gap-4">
                    <?php foreach ($brochures as $b): ?>
                        <li class="text-center" style="width: 120px;">
                            <a href="<?= ABS_URL ?>uploads/resource/<?= htmlspecialchars($b['file_path']) ?>" download target="_blank" class="d-block">
                                <img src="<?= ABS_URL ?>assets/steel/pdf-icon.svg" alt="PDF Icon" class="img-fluid mb-2" style="max-height: 60px;">
                                <div style="font-size: 14px;"><?= htmlspecialchars($b['brochure_name']) ?></div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="brochure-box py-5 text-center">
        <h2 class="mb-4">Brochure Download</h2>
        <p>No brochures available right now.</p>
    </div>
<?php endif; ?>
		<div class="elementor-element elementor-element-2382b15 e-flex e-con-boxed e-con e-parent" data-id="2382b15" data-element_type="container">
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
                                                <h4 class="mb-3 text-light"><svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="24" height="25" viewBox="0 0 24 25" fill="none"><path d="M21.97 18.9355C21.97 19.2955 21.89 19.6655 21.72 20.0255C21.55 20.3855 21.33 20.7255 21.04 21.0455C20.55 21.5855 20.01 21.9755 19.4 22.2255C18.8 22.4755 18.15 22.6055 17.45 22.6055C16.43 22.6055 15.34 22.3655 14.19 21.8755C13.04 21.3855 11.89 20.7255 10.75 19.8955C9.6 19.0555 8.51 18.1255 7.47 17.0955C6.44 16.0555 5.51 14.9655 4.68 13.8255C3.86 12.6855 3.2 11.5455 2.72 10.4155C2.24 9.27547 2 8.18547 2 7.14547C2 6.46547 2.12 5.81547 2.36 5.21547C2.6 4.60547 2.98 4.04547 3.51 3.54547C4.15 2.91547 4.85 2.60547 5.59 2.60547C5.87 2.60547 6.15 2.66547 6.4 2.78547C6.66 2.90547 6.89 3.08547 7.07 3.34547L9.39 6.61547C9.57 6.86547 9.7 7.09547 9.79 7.31547C9.88 7.52547 9.93 7.73547 9.93 7.92547C9.93 8.16547 9.86 8.40547 9.72 8.63547C9.59 8.86547 9.4 9.10547 9.16 9.34547L8.4 10.1355C8.29 10.2455 8.24 10.3755 8.24 10.5355C8.24 10.6155 8.25 10.6855 8.27 10.7655C8.3 10.8455 8.33 10.9055 8.35 10.9655C8.53 11.2955 8.84 11.7255 9.28 12.2455C9.73 12.7655 10.21 13.2955 10.73 13.8255C11.27 14.3555 11.79 14.8455 12.32 15.2955C12.84 15.7355 13.27 16.0355 13.61 16.2155C13.66 16.2355 13.72 16.2655 13.79 16.2955C13.87 16.3255 13.95 16.3355 14.04 16.3355C14.21 16.3355 14.34 16.2755 14.45 16.1655L15.21 15.4155C15.46 15.1655 15.7 14.9755 15.93 14.8555C16.16 14.7155 16.39 14.6455 16.64 14.6455C16.83 14.6455 17.03 14.6855 17.25 14.7755C17.47 14.8655 17.7 14.9955 17.95 15.1655L21.26 17.5155C21.52 17.6955 21.7 17.9055 21.81 18.1555C21.91 18.4055 21.97 18.6555 21.97 18.9355Z" stroke="white" stroke-miterlimit="10"></path><path opacity="0.4" d="M18.5 9.60547C18.5 9.00547 18.03 8.08547 17.33 7.33547C16.69 6.64547 15.84 6.10547 15 6.10547" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path><path opacity="0.4" d="M22 9.60547C22 5.73547 18.87 2.60547 15 2.60547" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path></svg> Phone : <a href="tel:+916391090000" class="text-light">+91 6391090000</a></p>
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
				<style>
                    .custom-02 {
                        padding: 120px 0;
                        position: relative
                    }
                    .custom-02 h4 {
                        color: #000;
                        font-family: "Jost", Sans-serif;
                        font-size: 15px;
                        font-weight: 500;
                        text-transform: uppercase;
                        line-height: 21px
                    }
                    .custom-02 h2 {
                        color: #000;
                        font-family: "Jost", Sans-serif;
                        font-size: 56px;
                        font-weight: 600;
                        line-height: 60px
                    }
                    .custom-02 .owl-carousel .owl-nav button {
                        margin: 50px 0
                    }
                    .custom-02 .owl-carousel .owl-nav {
                        position: absolute;
                        bottom: 50px;
                        left: -75%
                    }
                    .custom-02 .owl-carousel .owl-nav button.owl-next,
                    .custom-02 .owl-carousel .owl-nav button.owl-prev {
                        margin: 10px 10px 10px 0
                    }
                    .custom-02 .owl-carousel .owl-nav button.owl-next span,
                    .custom-02 .owl-carousel .owl-nav button.owl-prev span {
                        display: block;
                        background: #b22222;
                        color: #ededede6;
                        width: 50px !important;
                        height: 50px !important;
                        font-size: 40px;
                        line-height: 40px;
                        border-radius: 50%
                    }
                    .custom-02 .owl-carousel .owl-nav button.owl-next.disabled span,
                    .custom-02 .owl-carousel .owl-nav button.owl-prev.disabled span {
                        background: #fff;
                        border: 2px solid #03001B66;
                        color: #03001B66
                    }
                    .custom-02 .owl-carousel div a {
                        display: inline-block;
                        overflow: hidden
                    }
                    .custom-02 .owl-carousel div a:hover img {
                        transform: scale(1.1);
                        transition: transform 2s ease
                    }
                    .custom-02 .title {
                        position: relative;
                        padding: 15px 0;
                        background: #000;
                        color: #fff;
                        text-align: center;
                        margin: -40px 15px 0 15px;
                        color: var(--e-global-color-314576f);
                        font-family: "Jost", Sans-serif;
                        font-size: 32px;
                        font-weight: 500;
                        line-height: 40px
                    }
                </style>
                <section class="custom-02">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-lg-4 my-auto">
                                <h4>OUR BUSINESSES</h4>
                                <h2>Other Products</h2>
                            </div>
                            <div class="col-lg-7">
                                <div class="owl-carousel">
                                    <!-- <div>
                                        <a href="<?php echo ABS_URL ?>steel">
                                            <img loading="lazy" decoding="async" width="585" height="726" src="assets/home/steel-1-scaled.jpg" class="attachment-full size-full wp-image-6886" alt="Cement">
                                        </a>
                                        <div class="title">Steel</div>
                                    </div> -->
                                    <div>
                                        <a href="<?php echo ABS_URL ?>cement">
                                            <img loading="lazy" decoding="async" width="585" height="726" src="assets/home//Cement.png" class="attachment-full size-full wp-image-6886" alt="Cement">
                                        </a>
                                        <div class="title">Cement</div>
                                    </div>
                                    <div>
                                        <a href="<?php echo ABS_URL ?>real-estate">
                                            <img loading="lazy" decoding="async" width="585" height="726" src="assets/home//Real-Estate.png" class="attachment-full size-full wp-image-6888" alt="Real Estate">
                                        </a>
                                        <div class="title">Real Estate</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
</main>
			<div data-elementor-type="footer" data-elementor-id="200" class="elementor elementor-200 elementor-location-footer" data-elementor-post-type="elementor_library">
		   <?php require_once ABS_PATH . 'components/footer/footer.php'; ?>
				</div>
					<script type="text/javascript">
				const lazyloadRunObserver = () => {
					const lazyloadBackgrounds = document.querySelectorAll( `.e-con.e-parent:not(.e-lazyloaded)` );
					const lazyloadBackgroundObserver = new IntersectionObserver( ( entries ) => {
						entries.forEach( ( entry ) => {
							if ( entry.isIntersecting ) {
								let lazyloadBackground = entry.target;
								if( lazyloadBackground ) {
									lazyloadBackground.classList.add( 'e-lazyloaded' );
								}
								lazyloadBackgroundObserver.unobserve( entry.target );
							}
						});
					}, { rootMargin: '200px 0px 200px 0px' } );
					lazyloadBackgrounds.forEach( ( lazyloadBackground ) => {
						lazyloadBackgroundObserver.observe( lazyloadBackground );
					} );
				};
				const events = [
					'DOMContentLoaded',
					'elementor/lazyload/observe',
				];
				events.forEach( ( event ) => {
					document.addEventListener( event, lazyloadRunObserver );
				} );
			</script>
			<link rel="stylesheet" id="elementor-post-3641-css" href="<?= ABS_URL ?>assets/steel/post-3641.css" media="all">
<link rel="stylesheet" id="elementor-post-148-css" href="<?= ABS_URL ?>assets/steel/post-148.css" media="all">
<link rel="stylesheet" id="widget-search-form-css" href="<?= ABS_URL ?>assets/steel/widget-search-form.min.css" media="all">
<link rel="stylesheet" id="e-animation-slideInDown-css" href="<?= ABS_URL ?>assets/steel/slideInDown.min.css" media="all">
<link rel="stylesheet" id="e-motion-fx-css" href="<?= ABS_URL ?>assets/steel/motion-fx.min.css" media="all">
<link rel="stylesheet" id="e-sticky-css" href="<?= ABS_URL ?>assets/steel/sticky.min.css" media="all">
<link rel="stylesheet" id="e-popup-css" href="<?= ABS_URL ?>assets/steel/popup.min.css" media="all">
<script src="assets/steel/jquery.smartmenus.min.js.download" id="smartmenus-js"></script>
<script src="assets/steel/jquery.sticky.min.js.download" id="e-sticky-js"></script>
<script src="assets/steel/jquery-numerator.min.js.download" id="jquery-numerator-js"></script>
<script src="assets/steel/imagesloaded.min.js.download" id="imagesloaded-js"></script>
<script src="assets/steel/webpack-pro.runtime.min.js.download" id="elementor-pro-webpack-runtime-js"></script>
<script src="assets/steel/webpack.runtime.min.js.download" id="elementor-webpack-runtime-js"></script>
<script src="assets/steel/frontend-modules.min.js.download" id="elementor-frontend-modules-js"></script>
<script src="assets/steel/hooks.min.js.download" id="wp-hooks-js"></script>
<script src="assets/steel/i18n.min.js.download" id="wp-i18n-js"></script>
</body>
<script src="./assets/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="<?php echo ABS_URL ?>js/jquery-3.6.0.min.js"></script>
<script src="./assets/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
<script>
$(document).ready(function () {
    $('.elementor-counter-number').each(function () {
        var $this = $(this);
        var countTo = $this.attr('data-to-value');
        var duration = parseInt($this.attr('data-duration')) || 2000;
        $({ countNum: $this.text() }).animate(
            { countNum: countTo },
            {
                duration: duration,
                easing: 'swing',
                step: function () {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function () {
                    $this.text(this.countNum);
                },
            }
        );
        // Apply text-dark class
        $this.addClass('text-dark');
    });
});
</script>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            }
        })
    });
</script>
</html>