<?php
    require_once '../config/config.php';

    $limit = 15; // Number of blogs per page
    // Get the current page number, default is 1
    $page   = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
    try {
        // Get database connection
        $db = Database::getDB();
        // Fetch total number of blogs
        $totalQuery = $db->query("SELECT COUNT(*) as total FROM web_blogs");
        $totalBlogs = $totalQuery->fetch(PDO::FETCH_ASSOC)['total'];
        // Fetch blog records with pagination
        $stmt = $db->prepare("SELECT * FROM web_blogs WHERE status = '1' ORDER BY blog_id DESC LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Calculate total pages
        $totalPages = ceil($totalBlogs / $limit);
    } catch (PDOException $e) {
        die("Database Error: " . $e->getMessage());
    }
?>
<!DOCTYPE html>
<!-- saved from url=(0038)media.php -->
<html dir="ltr" lang="en-US" prefix="og: https://ogp.me/ns#"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title>Media - Gallantt Group of Industries</title>
	<style>img:is([sizes="auto" i], [sizes^="auto," i]) { contain-intrinsic-size: 3000px 1500px }</style>
		<link href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= ABS_URL ?>components/navbar/header.css">
		<!-- All in One SEO 4.7.4.2 - aioseo.com -->
		<meta name="description" content="&quot;Shaping a Stronger Future: Gallantt Group’s Journey of Progress and Excellence&quot; - C.P. Agarwal Chairman &amp; Managing Director Media">
		<meta name="robots" content="max-image-preview:large">
		<link rel="canonical" href="media.php">
		<meta name="generator" content="All in One SEO (AIOSEO) 4.7.4.2">
		<meta property="og:locale" content="en_US">
		<meta property="og:site_name" content="Gallantt Group of Industries - Gallantt Group of Industries">
		<meta property="og:type" content="article">
		<meta property="og:title" content="Media - Gallantt Group of Industries">
		<meta property="og:description" content="&quot;Shaping a Stronger Future: Gallantt Group’s Journey of Progress and Excellence&quot; - C.P. Agarwal Chairman &amp; Managing Director Media">
		<meta property="og:url" content="media.php">
		<meta property="og:image" content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
		<meta property="og:image:secure_url" content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
		<meta property="article:published_time" content="2024-07-26T11:54:03+00:00">
		<meta property="article:modified_time" content="2024-11-11T12:18:22+00:00">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="Media - Gallantt Group of Industries">
		<meta name="twitter:description" content="&quot;Shaping a Stronger Future: Gallantt Group’s Journey of Progress and Excellence&quot; - C.P. Agarwal Chairman &amp; Managing Director Media">
		<meta name="twitter:image" content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
		
		<!-- All in One SEO -->
<link rel="alternate" type="application/rss+xml" title="Gallantt Group of Industries » Feed" href="<?php echo ABS_URL ?>feed/">
<link rel="alternate" type="application/rss+xml" title="Gallantt Group of Industries » Comments Feed" href="<?php echo ABS_URL ?>comments/feed/">
<script>
window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/nexevo-demo.in\/gallantt\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.7.1"}};
/*! This file is auto-generated */
!function(i,n){var o,s,e;function c(e){try{var t={supportTests:e,timestamp:(new Date).valueOf()};sessionStorage.setItem(o,JSON.stringify(t))}catch(e){}}function p(e,t,n){e.clearRect(0,0,e.canvas.width,e.canvas.height),e.fillText(t,0,0);var t=new Uint32Array(e.getImageData(0,0,e.canvas.width,e.canvas.height).data),r=(e.clearRect(0,0,e.canvas.width,e.canvas.height),e.fillText(n,0,0),new Uint32Array(e.getImageData(0,0,e.canvas.width,e.canvas.height).data));return t.every(function(e,t){return e===r[t]})}function u(e,t,n){switch(t){case"flag":return n(e,"\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f","\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f")?!1:!n(e,"\ud83c\uddfa\ud83c\uddf3","\ud83c\uddfa\u200b\ud83c\uddf3")&&!n(e,"\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f","\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f");case"emoji":return!n(e,"\ud83d\udc26\u200d\u2b1b","\ud83d\udc26\u200b\u2b1b")}return!1}function f(e,t,n){var r="undefined"!=typeof WorkerGlobalScope&&self instanceof WorkerGlobalScope?new OffscreenCanvas(300,150):i.createElement("canvas"),a=r.getContext("2d",{willReadFrequently:!0}),o=(a.textBaseline="top",a.font="600 32px Arial",{});return e.forEach(function(e){o[e]=t(a,e,n)}),o}function t(e){var t=i.createElement("script");t.src=e,t.defer=!0,i.head.appendChild(t)}"undefined"!=typeof Promise&&(o="wpEmojiSettingsSupports",s=["flag","emoji"],n.supports={everything:!0,everythingExceptFlag:!0},e=new Promise(function(e){i.addEventListener("DOMContentLoaded",e,{once:!0})}),new Promise(function(t){var n=function(){try{var e=JSON.parse(sessionStorage.getItem(o));if("object"==typeof e&&"number"==typeof e.timestamp&&(new Date).valueOf()<e.timestamp+604800&&"object"==typeof e.supportTests)return e.supportTests}catch(e){}return null}();if(!n){if("undefined"!=typeof Worker&&"undefined"!=typeof OffscreenCanvas&&"undefined"!=typeof URL&&URL.createObjectURL&&"undefined"!=typeof Blob)try{var e="postMessage("+f.toString()+"("+[JSON.stringify(s),u.toString(),p.toString()].join(",")+"));",r=new Blob([e],{type:"text/javascript"}),a=new Worker(URL.createObjectURL(r),{name:"wpTestEmojiSupports"});return void(a.onmessage=function(e){c(n=e.data),a.terminate(),t(n)})}catch(e){}c(n=f(s,u,p))}t(n)}).then(function(e){for(var t in e)n.supports[t]=e[t],n.supports.everything=n.supports.everything&&n.supports[t],"flag"!==t&&(n.supports.everythingExceptFlag=n.supports.everythingExceptFlag&&n.supports[t]);n.supports.everythingExceptFlag=n.supports.everythingExceptFlag&&!n.supports.flag,n.DOMReady=!1,n.readyCallback=function(){n.DOMReady=!0}}).then(function(){return e}).then(function(){var e;n.supports.everything||(n.readyCallback(),(e=n.source||{}).concatemoji?t(e.concatemoji):e.wpemoji&&e.twemoji&&(t(e.twemoji),t(e.wpemoji)))}))}((window,document),window._wpemojiSettings);
</script>
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
<link rel="stylesheet" id="bplugins-plyrio-css" href="<?php echo ABS_URL ?>assets/media/h5vp.css" media="all">
<link rel="stylesheet" id="html5-player-video-style-css" href="<?php echo ABS_URL ?>assets/media/frontend.css" media="all">
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
<link rel="stylesheet" href="<?php echo ABS_URL ?>assets/media/dialog.min.css"><link rel="stylesheet" id="elementor-frontend-css" href="<?php echo ABS_URL ?>assets/media/frontend.min.css" media="all">
<link rel="stylesheet" id="widget-image-css" href="<?php echo ABS_URL ?>assets/media/widget-image.min.css" media="all">
<link rel="stylesheet" id="widget-nav-menu-css" href="<?php echo ABS_URL ?>assets/media/widget-nav-menu.min.css" media="all">
<link rel="stylesheet" id="widget-image-box-css" href="<?php echo ABS_URL ?>assets/media/widget-image-box.min.css" media="all">
<link rel="stylesheet" id="widget-mega-menu-css" href="<?php echo ABS_URL ?>assets/media/widget-mega-menu.min.css" media="all">
<link rel="stylesheet" id="widget-heading-css" href="<?php echo ABS_URL ?>assets/media/widget-heading.min.css" media="all">
<link rel="stylesheet" id="widget-text-editor-css" href="<?php echo ABS_URL ?>assets/media/widget-text-editor.min.css" media="all">
<link rel="stylesheet" id="widget-form-css" href="<?php echo ABS_URL ?>assets/media/widget-form.min.css" media="all">
<link rel="stylesheet" id="widget-divider-css" href="<?php echo ABS_URL ?>assets/media/widget-divider.min.css" media="all">
<link rel="stylesheet" id="widget-icon-list-css" href="<?php echo ABS_URL ?>assets/media/widget-icon-list.min.css" media="all">
<link rel="stylesheet" id="e-animation-bounce-css" href="<?php echo ABS_URL ?>assets/media/bounce.min.css" media="all">
<link rel="stylesheet" id="e-animation-fadeInUp-css" href="<?php echo ABS_URL ?>assets/media/fadeInUp.min.css" media="all">
<link rel="stylesheet" id="e-animation-fadeIn-css" href="<?php echo ABS_URL ?>assets/media/fadeIn.min.css" media="all">
<link rel="stylesheet" id="elementor-icons-css" href="<?php echo ABS_URL ?>assets/media/elementor-icons.min.css" media="all">
<link rel="stylesheet" id="swiper-css" href="<?php echo ABS_URL ?>assets/media/swiper.min.css" media="all">
<link rel="stylesheet" id="e-swiper-css" href="<?php echo ABS_URL ?>assets/media/e-swiper.min.css" media="all">
<link rel="stylesheet" id="elementor-post-6-css" href="<?php echo ABS_URL ?>assets/media/post-6.css" media="all">
<link rel="stylesheet" id="widget-loop-builder-css" href="<?php echo ABS_URL ?>assets/media/widget-loop-builder.min.css" media="all">
<link rel="stylesheet" id="elementor-post-60-css" href="<?php echo ABS_URL ?>assets/media/post-60.css" media="all">
<link rel="stylesheet" id="elementor-post-76-css" href="<?php echo ABS_URL ?>assets/media/post-76.css" media="all">
<link rel="stylesheet" id="elementor-post-200-css" href="<?php echo ABS_URL ?>assets/media/post-200.css" media="all">
<link rel="stylesheet" id="elementor-post-5351-css" href="<?php echo ABS_URL ?>assets/media/post-5351.css" media="all">
<link rel="stylesheet" id="google-fonts-1-css" href="<?php echo ABS_URL ?>assets/media/css" media="all">
<link rel="stylesheet" id="elementor-icons-shared-0-css" href="<?php echo ABS_URL ?>assets/media/fontawesome.min.css" media="all">
<link rel="stylesheet" id="elementor-icons-fa-solid-css" href="<?php echo ABS_URL ?>assets/media/solid.min.css" media="all">
<link rel="stylesheet" id="elementor-icons-fa-brands-css" href="<?php echo ABS_URL ?>assets/media/brands.min.css" media="all">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin=""><script src="<?php echo ABS_URL ?>assets/media/jquery.min.js.download" id="jquery-core-js"></script>
<script src="<?php echo ABS_URL ?>assets/media/jquery-migrate.min.js.download" id="jquery-migrate-js"></script>
<link rel="https://api.w.org/" href="<?php echo ABS_URL ?>wp-json/"><link rel="alternate" title="JSON" type="application/json" href="<?php echo ABS_URL ?>wp-json/wp/v2/pages/60"><link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo ABS_URL ?>xmlrpc.php?rsd">
<meta name="generator" content="WordPress 6.7.1">
<link rel="shortlink" href="<?php echo ABS_URL ?>?p=60">
<link rel="alternate" title="oEmbed (JSON)" type="application/json+oembed" href="<?php echo ABS_URL ?>wp-json/oembed/1.0/embed?url=https%3A%2F%2Fnexevo-demo.in%2Fgallantt%2Fmedia%2F">
<link rel="alternate" title="oEmbed (XML)" type="text/xml+oembed" href="<?php echo ABS_URL ?>wp-json/oembed/1.0/embed?url=https%3A%2F%2Fnexevo-demo.in%2Fgallantt%2Fmedia%2F&amp;format=xml">
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
    background: url(https://nexevo-demo.in/gallantt/wp-content/uploads/2024/08/nav-arrow-down.svg) no-repeat center center;
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
    background-image: url(https://nexevo-demo.in/gallantt/wp-content/uploads/2024/07/nav-arrow-down.svg);
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
    background-image: url(https://nexevo-demo.in/gallantt/wp-content/uploads/2024/09/arrow-down.svg);
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
		<script src="<?php echo ABS_URL ?>assets/media/wp-emoji-release.min.js.download" defer=""></script></head>
<body class="page-template-default page page-id-60 wp-custom-logo elementor-default elementor-kit-6 elementor-page elementor-page-60 e--ua-blink e--ua-chrome e--ua-webkit dialog-body dialog-lightbox-body dialog-container dialog-lightbox-container" data-elementor-device-mode="desktop">
<?php require_once ABS_PATH . 'components/navbar/header.php'; ?>
<main id="content" class="site-main post-60 page type-page status-publish hentry">
	<div class="page-content">
				<div data-elementor-type="wp-page" data-elementor-id="60" class="elementor elementor-60" data-elementor-post-type="page">
				<div class="elementor-element elementor-element-435427c e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="435427c" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
					<div class="e-con-inner">
		<div class="elementor-element elementor-element-5ac9e85 e-con-full e-flex e-con e-child" data-id="5ac9e85" data-element_type="container">
				<div class="elementor-element elementor-element-6cd542e elementor-widget elementor-widget-heading" data-id="6cd542e" data-element_type="widget" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default">"Shaping a Stronger Future: Gallantt Group’s Journey of Progress and Excellence"</h2>		</div>
				</div>
		<div class="elementor-element elementor-element-4db12ef e-con-full e-flex e-con e-child" data-id="4db12ef" data-element_type="container">
				<div class="elementor-element elementor-element-7b7c68b elementor-widget elementor-widget-heading" data-id="7b7c68b" data-element_type="widget" data-widget_type="heading.default">
				<div class="elementor-widget-container">
					</div>
				</div>
				<div class="elementor-element elementor-element-eafd95b elementor-widget elementor-widget-heading" data-id="eafd95b" data-element_type="widget" data-widget_type="heading.default">
				
				</div>
				</div>
		<div class="elementor-element elementor-element-b270e64 e-con-full e-flex e-con e-child" data-id="b270e64" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;slideshow&quot;,&quot;background_slideshow_gallery&quot;:[{&quot;id&quot;:2579,&quot;url&quot;:&quot;https:\/\/nexevo-demo.in\/gallantt\/wp-content\/uploads\/2024\/09\/career-g.png&quot;},{&quot;id&quot;:2584,&quot;url&quot;:&quot;https:\/\/nexevo-demo.in\/gallantt\/wp-content\/uploads\/2024\/09\/career-a.png&quot;},{&quot;id&quot;:2583,&quot;url&quot;:&quot;https:\/\/nexevo-demo.in\/gallantt\/wp-content\/uploads\/2024\/09\/career-l.png&quot;},{&quot;id&quot;:2585,&quot;url&quot;:&quot;https:\/\/nexevo-demo.in\/gallantt\/wp-content\/uploads\/2024\/09\/career-l2.png&quot;},{&quot;id&quot;:2586,&quot;url&quot;:&quot;https:\/\/nexevo-demo.in\/gallantt\/wp-content\/uploads\/2024\/09\/career-a2.png&quot;},{&quot;id&quot;:2582,&quot;url&quot;:&quot;https:\/\/nexevo-demo.in\/gallantt\/wp-content\/uploads\/2024\/09\/career-n.png&quot;},{&quot;id&quot;:2587,&quot;url&quot;:&quot;https:\/\/nexevo-demo.in\/gallantt\/wp-content\/uploads\/2024\/09\/career-t2.png&quot;},{&quot;id&quot;:2581,&quot;url&quot;:&quot;https:\/\/nexevo-demo.in\/gallantt\/wp-content\/uploads\/2024\/09\/career-t.png&quot;}],&quot;background_slideshow_slide_duration&quot;:1000,&quot;background_slideshow_slide_transition&quot;:&quot;slide_up&quot;,&quot;position&quot;:&quot;absolute&quot;,&quot;background_slideshow_loop&quot;:&quot;yes&quot;,&quot;background_slideshow_transition_duration&quot;:500}"><div class="elementor-background-slideshow swiper swiper-initialized swiper-vertical swiper-pointer-events swiper-rtl" dir="rtl"><div class="swiper-wrapper" id="swiper-wrapper-45e7f63b75b22fcd" aria-live="off" style="transition-duration: 500ms; transform: translate3d(0px, -3456px, 0px);"><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" data-swiper-slide-index="0" role="group" aria-label="1 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-g.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="1" role="group" aria-label="2 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-a.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="2" role="group" aria-label="3 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-l.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" role="group" aria-label="4 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-l2.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate" data-swiper-slide-index="4" role="group" aria-label="5 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-a2.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate" data-swiper-slide-index="5" role="group" aria-label="6 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-n.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate" data-swiper-slide-index="6" role="group" aria-label="7 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-t2.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate" data-swiper-slide-index="7" role="group" aria-label="8 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-t.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-prev" data-swiper-slide-index="0" role="group" aria-label="1 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-g.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-active" data-swiper-slide-index="1" role="group" aria-label="2 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-a.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-next" data-swiper-slide-index="2" role="group" aria-label="3 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-l.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide" data-swiper-slide-index="3" role="group" aria-label="4 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-l2.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide" data-swiper-slide-index="4" role="group" aria-label="5 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-a2.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide" data-swiper-slide-index="5" role="group" aria-label="6 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-n.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide" data-swiper-slide-index="6" role="group" aria-label="7 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-t2.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide" data-swiper-slide-index="7" role="group" aria-label="8 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-t.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" data-swiper-slide-index="0" role="group" aria-label="1 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-g.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="1" role="group" aria-label="2 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-a.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="2" role="group" aria-label="3 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-l.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" role="group" aria-label="4 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-l2.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate" data-swiper-slide-index="4" role="group" aria-label="5 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-a2.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate" data-swiper-slide-index="5" role="group" aria-label="6 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-n.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate" data-swiper-slide-index="6" role="group" aria-label="7 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-t2.png&quot;);"></div></div><div class="elementor-background-slideshow__slide swiper-slide swiper-slide-duplicate" data-swiper-slide-index="7" role="group" aria-label="8 / 8" style="height: 384px;"><div class="elementor-background-slideshow__slide__image" style="background-image: url(&quot;<?php echo ABS_URL ?>wp-content/uploads/2024/09/career-t.png&quot;);"></div></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
				</div>
				</div>
		<div class="elementor-element elementor-element-d9657d0 e-con-full e-flex e-con e-child" data-id="d9657d0" data-element_type="container">
				<div class="elementor-element elementor-element-34585c7 rotate-animation elementor-hidden-mobile elementor-widget elementor-widget-image" data-id="34585c7" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img decoding="async" width="59" height="60" src="<?php echo ABS_URL ?>assets/media/triangle-icon.png" class="attachment-large size-large wp-image-5503" alt="">													</div>
				</div>
				<div class="elementor-element elementor-element-4335ce5 elementor-widget elementor-widget-heading" data-id="4335ce5" data-element_type="widget" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default">Blogs</h2>		</div>
				</div>
				<div class="elementor-element elementor-element-31d39f5 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="31d39f5" data-element_type="widget" data-widget_type="divider.default">
				<div class="elementor-widget-container">
					<div class="elementor-divider">
			<span class="elementor-divider-separator">
						</span>
		</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-7122440 elementor-absolute elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="7122440" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="divider.default">
				<div class="elementor-widget-container">
					<div class="elementor-divider">
			<span class="elementor-divider-separator">
						</span>
		</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-bc33f3f elementor-widget elementor-widget-wp-widget-aioseo-breadcrumb-widget" data-id="bc33f3f" data-element_type="widget" data-widget_type="wp-widget-aioseo-breadcrumb-widget.default">
				<div class="elementor-widget-container">
			<div class="aioseo-breadcrumbs"><span class="aioseo-breadcrumb">
	<a href="<?php echo ABS_URL ?>" title="Home">Home</a>
</span><span class="aioseo-breadcrumb-separator">/</span><span class="aioseo-breadcrumb">Blogs</span></div>		</div>
				</div>
				</div>
					</div>
				</div>
		<div class="elementor-element elementor-element-a663875 spacing e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id="a663875" data-element_type="container">
					<div class="e-con-inner">
				<div class="elementor-element elementor-element-ae40df0 elementor-grid-3 elementor-grid-tablet-2 elementor-grid-mobile-1 elementor-widget elementor-widget-loop-grid" data-id="ae40df0" data-element_type="widget" data-settings="{&quot;template_id&quot;:&quot;7265&quot;,&quot;pagination_type&quot;:&quot;load_more_on_click&quot;,&quot;row_gap&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:45,&quot;sizes&quot;:[]},&quot;row_gap_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:45,&quot;sizes&quot;:[]},&quot;columns&quot;:3,&quot;_skin&quot;:&quot;post&quot;,&quot;columns_tablet&quot;:&quot;2&quot;,&quot;columns_mobile&quot;:&quot;1&quot;,&quot;edit_handle_selector&quot;:&quot;[data-elementor-type=\&quot;loop-item\&quot;]&quot;,&quot;load_more_spinner&quot;:{&quot;value&quot;:&quot;fas fa-spinner&quot;,&quot;library&quot;:&quot;fa-solid&quot;},&quot;row_gap_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="loop-grid.post">
				<div class="elementor-widget-container">
					<div class="elementor-loop-container elementor-grid">
		<style id="loop-dynamic-7265">.e-loop-item-7318 .elementor-element.elementor-element-17091cc:not(.elementor-motion-effects-element-type-background), .e-loop-item-7318 .elementor-element.elementor-element-17091cc > .elementor-motion-effects-container > .elementor-motion-effects-layer{background-image:url("<?php echo ABS_URL ?>assets/media/media.jpg");}</style><style id="loop-7265">.elementor-7265 .elementor-element.elementor-element-8840bee{--display:flex;--flex-direction:column;--container-widget-width:100%;--container-widget-height:initial;--container-widget-flex-grow:0;--container-widget-align-self:initial;--flex-wrap-mobile:wrap;--gap:5px 5px;--overflow:hidden;--background-transition:0.3s;--margin-top:0px;--margin-bottom:0px;--margin-left:0px;--margin-right:0px;--padding-top:0px;--padding-bottom:0px;--padding-left:0px;--padding-right:0px;}.elementor-7265 .elementor-element.elementor-element-17091cc{--display:flex;--min-height:376px;--justify-content:flex-end;--overflow:hidden;--background-transition:0.3s;--padding-top:0px;--padding-bottom:0px;--padding-left:0px;--padding-right:0px;}.elementor-7265 .elementor-element.elementor-element-17091cc:not(.elementor-motion-effects-element-type-background), .elementor-7265 .elementor-element.elementor-element-17091cc > .elementor-motion-effects-container > .elementor-motion-effects-layer{background-position:center center;background-repeat:no-repeat;background-size:cover;}.elementor-7265 .elementor-element.elementor-element-17091cc, .elementor-7265 .elementor-element.elementor-element-17091cc::before{--border-transition:0.3s;}.elementor-7265 .elementor-element.elementor-element-293a20d{--display:flex;--background-transition:0.3s;--padding-top:40px;--padding-bottom:40px;--padding-left:38px;--padding-right:38px;}.elementor-7265 .elementor-element.elementor-element-293a20d:not(.elementor-motion-effects-element-type-background), .elementor-7265 .elementor-element.elementor-element-293a20d > .elementor-motion-effects-container > .elementor-motion-effects-layer{background-color:var( --e-global-color-primary );}.elementor-7265 .elementor-element.elementor-element-293a20d, .elementor-7265 .elementor-element.elementor-element-293a20d::before{--border-transition:0.3s;}.elementor-7265 .elementor-element.elementor-element-f8ac6b5{color:#797C7F;font-family:"Kumbh Sans", Sans-serif;font-size:17px;font-weight:400;line-height:28px;}.elementor-7265 .elementor-element.elementor-element-edc6c76 > .elementor-widget-container{margin:15px 0px 0px 0px;}.elementor-7265 .elementor-element.elementor-element-edc6c76{text-align:left;}.elementor-7265 .elementor-element.elementor-element-edc6c76 .elementor-heading-title{color:#797C7F;font-family:"Kumbh Sans", Sans-serif;font-size:16px;font-weight:400;text-transform:uppercase;line-height:28px;}.elementor-7265 .elementor-element.elementor-element-2ec4fb0{text-align:left;}.elementor-7265 .elementor-element.elementor-element-2ec4fb0 .elementor-heading-title{font-family:"Kumbh Sans", Sans-serif;font-size:24px;font-weight:700;line-height:36px;}</style>
    <style>
/* Ensure hover effect applies only to the current media-card */
.media-card {
    position: relative;
    width: 100%;
    height: 250px; /* Adjust height as needed */
    border-radius: 8px;
    overflow: hidden;
    cursor: pointer;
}
/* Overlay (Hidden by Default) */
.media-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7); /* Dark transparent overlay */
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 15px;
}
/* Small Description */
.media-description {
    color: #fff;
    font-size: 14px;
    max-width: 90%;
    line-height: 1.5;
}
.title-section
{
  position: absolute;
  bottom: 10px;
  color: #ffffff;
  padding: 10px;
  background: rgb(8,8,8);
background: linear-gradient(90deg, rgba(8,8,8,1) 0%, rgba(0,0,0,0.7315301120448179) 51%, rgba(0,212,255,0) 100%);
  width: 100%;
}
    </style>
     <!-- Media Gallery Display -->
     <?php foreach ($blogs as $blog): ?>
            <div data-elementor-type="loop-item" class="elementor elementor-<?php echo $blog['blog_id'] ?> e-loop-item">
                <div class="elementor-element elementor-element-8840bee stories_card e-con-full e-flex e-con e-parent">
                    <!-- Blog Image with Hover Overlay -->
                     <a href="<?php echo ABS_URL ?>blogs/desc/<?php echo $blog['blog_id'] ?>/">
                    <div class="elementor-element elementor-element-17091cc e-con-full post_img e-flex e-con e-child media-card"
                         style="background-image: url('<?php echo ABS_URL ?>/dir/admin/blog/uploads/<?php echo $blog['image'] ?>?v=<?php echo PROD_VER ?>'); background-size: cover; background-position: center;">
                    </div>
                    </a>
                    <!-- Blog Title -->
                 <div class="title-section">
                 <div class="elementor-element elementor-element-2ec4fb0 elementor-widget elementor-widget-heading">
                        <div class="elementor-widget-container">
                            <h3 class="elementor-heading-title elementor-size-default">
                                <a href="<?php echo ABS_URL ?>blogs/desc/<?php echo $blog['blog_id'] ?>/">
                                    <?php echo htmlspecialchars($blog['title']) ?>
                                </a>
                            </h3>
                        </div>
                    </div>
                    <!-- Post Date -->
                    <div class="elementor-element elementor-element-edc6c76 elementor-widget elementor-widget-heading">
                        <div class="elementor-widget-container">
                            <span class="elementor-heading-title elementor-size-default">
                                Date of Post : <?= date("d M Y", strtotime($blog['post_date'])) ?>
                            </span>
                        </div>
                    </div>
                 </div>
                </div>
            </div>
        <?php endforeach; ?>
</div>
				</div>
				</div>
				</div>
				</div>
					</div>
				</div>
      <div class="container">
      <div class="row">
<!-- Pagination -->
<div class="pagination w-100">
        <?php if ($page > 1): ?>
            <a href="<?php echo ABS_URL ?>blogs/<?php echo $page - 1 ?>/" class="prev">← Previous</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="<?php echo ABS_URL ?>blogs/<?php echo $i ?>/" class="<?php echo($i == $page) ? 'active' : '' ?>">
                <?php echo $i ?>
            </a>
        <?php endfor; ?>
        <?php if ($page < $totalPages): ?>
            <a href="<?php echo ABS_URL ?>blogs/<?php echo $page + 1 ?>/" class="next">Next →</a>
        <?php endif; ?>
    </div>
</div>
</div>
      </div>
<!-- Pagination -->
<!-- Pagination Styles -->
<style>
.pagination {
  display: flex;
  justify-content : center;
    text-align: center;
    margin: 20px 0;
}
.pagination a {
    padding: 8px 15px;
    margin: 5px;
    text-decoration: none;
    background: #0073e6;
    color: #fff;
    border-radius: 5px;
}
.pagination a.active {
    background: #005bb5;
    font-weight: bold;
}
.pagination a:hover {
    background: #005bb5;
}
</style>
				</div>
			</div>
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
			<link rel="stylesheet" id="elementor-post-148-css" href="<?php echo ABS_URL ?>assets/media/post-148.css" media="all">
<link rel="stylesheet" id="e-animation-bounceInUp-css" href="<?php echo ABS_URL ?>assets/media/bounceInUp.min.css" media="all">
<link rel="stylesheet" id="widget-search-form-css" href="<?php echo ABS_URL ?>assets/media/widget-search-form.min.css" media="all">
<link rel="stylesheet" id="e-animation-slideInDown-css" href="<?php echo ABS_URL ?>assets/media/slideInDown.min.css" media="all">
<link rel="stylesheet" id="e-sticky-css" href="<?php echo ABS_URL ?>assets/media/sticky.min.css" media="all">
<link rel="stylesheet" id="e-popup-css" href="<?php echo ABS_URL ?>assets/media/popup.min.css" media="all">
<script src="<?php echo ABS_URL ?>assets/media/jquery.smartmenus.min.js.download" id="smartmenus-js"></script>
<script src="<?php echo ABS_URL ?>assets/media/jquery.sticky.min.js.download" id="e-sticky-js"></script>
<script src="<?php echo ABS_URL ?>assets/media/imagesloaded.min.js.download" id="imagesloaded-js"></script>
<script src="<?php echo ABS_URL ?>assets/media/webpack-pro.runtime.min.js.download" id="elementor-pro-webpack-runtime-js"></script>
<script src="<?php echo ABS_URL ?>assets/media/webpack.runtime.min.js.download" id="elementor-webpack-runtime-js"></script>
<script src="<?php echo ABS_URL ?>assets/media/frontend-modules.min.js.download" id="elementor-frontend-modules-js"></script>
<script src="<?php echo ABS_URL ?>assets/media/hooks.min.js.download" id="wp-hooks-js"></script>
<script src="<?php echo ABS_URL ?>assets/media/i18n.min.js.download" id="wp-i18n-js"></script>
</body>
<script src="<?php echo ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.js"></script></html>