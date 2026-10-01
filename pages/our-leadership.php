<?php
require_once '../config/config.php';
$db = Database::getDB();
$stmt = $db->query("SELECT * FROM boards ORDER BY order_index ASC");
$directors = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total_directors = count($directors);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US" prefix="og: https://ogp.me/ns#">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <title>Our Leadership - Gallantt Group of Industries</title>
  <style>
    img:is([sizes="auto" i], [sizes^="auto," i]) {
      contain-intrinsic-size: 3000px 1500px
    }
  </style>
	<link href="<?php echo ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo ABS_URL ?>components/navbar/header.css">
<link rel="stylesheet" href="<?php echo ABS_URL ?>css/all.min.css">
<link rel="stylesheet" href="<?php echo ABS_URL ?>assets/custom.css">
<link rel="stylesheet" href="<?php echo ABS_URL ?>assets/responsive.css">
  <meta name="description" content="&quot;Empowering Investors with Transparent Financial Information and Insights&quot; - C.P. Agarwal Chairman &amp; Managing Director Investors Key Milestones Key Milestones Driving Our Financial Success Record Revenue Achievement Enhanced Production Capacity Increased Operating Margins 26.43 MMTFY24 Crude Steel Production 175,006 INR,CroresFY24 Consolidated Revenue from Operations 28,236 INR,CroresFY24 Consolidated Operating EBITDA Iframe Section Stock Information Financial Highlights &amp; Reports Financial">
  <meta name="robots" content="max-image-preview:large">
  <link rel="canonical" href="<?php echo ABS_URL ?>investors">
  <meta name="generator" content="All in One SEO (AIOSEO) 4.7.4.2">
  <meta property="og:locale" content="en_US">
  <meta property="og:site_name" content="Gallantt Group of Industries - Gallantt Group of Industries">
  <meta property="og:type" content="article">
  <meta property="og:title" content="Investors - Gallantt Group of Industries">
  <meta property="og:description" content="&quot;Empowering Investors with Transparent Financial Information and Insights&quot; - C.P. Agarwal Chairman &amp; Managing Director Investors Key Milestones Key Milestones Driving Our Financial Success Record Revenue Achievement Enhanced Production Capacity Increased Operating Margins 26.43 MMTFY24 Crude Steel Production 175,006 INR,CroresFY24 Consolidated Revenue from Operations 28,236 INR,CroresFY24 Consolidated Operating EBITDA Iframe Section Stock Information Financial Highlights &amp; Reports Financial">
  <meta property="og:url" content="<?php echo ABS_URL ?>investors">
  <meta property="og:image" content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
  <meta property="og:image:secure_url" content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
  <meta property="article:published_time" content="2024-07-26T11:54:45+00:00">
  <meta property="article:modified_time" content="2024-11-08T10:43:03+00:00">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Investors - Gallantt Group of Industries">
  <meta name="twitter:description" content="&quot;Empowering Investors with Transparent Financial Information and Insights&quot; - C.P. Agarwal Chairman &amp; Managing Director Investors Key Milestones Key Milestones Driving Our Financial Success Record Revenue Achievement Enhanced Production Capacity Increased Operating Margins 26.43 MMTFY24 Crude Steel Production 175,006 INR,CroresFY24 Consolidated Revenue from Operations 28,236 INR,CroresFY24 Consolidated Operating EBITDA Iframe Section Stock Information Financial Highlights &amp; Reports Financial">
  <meta name="twitter:image" content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
  <link rel="alternate" type="application/rss+xml" title="Gallantt Group of Industries » Feed" href="<?php echo ABS_URL ?>feed/">
  <link rel="alternate" type="application/rss+xml" title="Gallantt Group of Industries » Comments Feed" href="<?php echo ABS_URL ?>comments/feed/">
<link rel=stylesheet id=elementor-icons-shared-0-css href="<?php echo ABS_URL?>assets/about-us/fontawesome.min.css" media=all>
<link rel=stylesheet id=elementor-icons-fa-solid-css href="<?php echo ABS_URL?>assets/about-us/solid.min.css" media=all>
<link rel=stylesheet id=elementor-icons-fa-brands-css href="<?php echo ABS_URL?>assets/about-us/brands.min.css" media=all>
<!-- <link rel="stylesheet" href="<?php echo ABS_URL ?>css/all.min.css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
    <style>
        :root {
            --brand-red: #CE2029;
            --text-dark: #222222;
            --text-muted: #666666;
            --bg-light: #F9F9F9;
        }
        body {
            background-color: var(--bg-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
        }
        /* --- Header Section --- */
        .directors-header {
            background-color: var(--brand-red);
            color: #ffffff;
            padding: 80px 20px;
            text-align: center;
        }
        .directors-header h1 {
            font-size: 3.5rem;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
        .directors-header h1 em {
            font-style: italic;
            text-decoration: underline;
            text-underline-offset: 8px;
        }
        .directors-header p {
            max-width: 600px;
            margin: 20px auto 0;
            font-size: 1.05rem;
            opacity: 0.9;
            line-height: 1.6;
        }
        /* --- Counter Divider --- */
        .counter-divider {
            text-align: center;
            margin-top: -25px;
            margin-bottom: 40px;
        }
        .counter-badge {
            background: #ffffff;
            display: inline-block;
            padding: 10px 25px;
            border-bottom: 3px solid var(--brand-red);
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .counter-badge h2 {
            color: var(--brand-red);
            font-weight: 700;
            margin: 0;
            line-height: 1;
        }
        .counter-badge small {
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.7rem;
            color: var(--text-muted);
            font-weight: 600;
        }
        /* --- Control Toolbar --- */
        .controls-toolbar {
            border-bottom: 1px solid #E5E5E5;
            padding-bottom: 15px;
            margin-bottom: 40px;
        }
        .section-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--text-muted);
            font-weight: bold;
        }
        .mode-toggle-btn {
            border: 1px solid #222;
            background: transparent;
            color: var(--text-dark);
            padding: 6px 20px;
            border-radius: 30px;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .mode-toggle-btn:hover {
            background: var(--text-dark);
            color: #fff;
        }
        /* --- Executive Layout Panels --- */
        .director-panel-block {
            display: flex;
            align-items: stretch;
            gap: 15px;
            height: 100%;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s ease;
            will-change: transform;
            opacity: 1 !important;
        }
        .director-panel-block:hover .director-image-card img {
    transform: scale(1.2) !important; /* Adjust this value (e.g., 1.05 for more subtle, 1.10 for more noticeable) */
}
        .director-data-card, .director-image-card {
            width: 50%; 
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.04);
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.03);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            /* Ensure the cards themselves and their internal widgets are fully visible */
    opacity: 1 !important;
    visibility: visible !important;
        }
        .director-data-card {
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-top: 4px solid var(--brand-red);
        }
        .director-name {
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 4px;
            font-size: 1.25rem;
            transition: font-size 0.4s ease, color 0.3s ease, transform 0.4s ease;
        }
        .director-designation {
            color: var(--brand-red);
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 15px;
            transition: all 0.4s ease;
        }
        .director-bio {
            color: var(--text-muted);
            font-size: 0.65rem;
            line-height: 1.6;
            margin: 0;
        }
        .director-image-card {
            position: relative;
            min-height: 360px;
            background: #fdfdfd; 
            display: flex;
            align-items: center;
            justify-content: center;
        }
        /* FIX 1: Prevent Image Cropping with true containment proportions */
        .director-image-card img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: contain; 
            border-radius: 20px;
            z-index: 1;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            /* Force the image to stay completely visible without needing a hover trigger */
    opacity: 1 !important;
    display: block !important;
        }
/* Ensure any wrapped Elementor utility layout container inside stays visible */
.director-panel-block .elementor-widget-container {
    opacity: 1 !important;
    visibility: visible !important;
}
        /* Background Design Accents */
        .bg-accent-blue::before {
            content: '';
            position: absolute;
            top: 15%; left: 10%; right: 5%; bottom: 5%;
            background: #A9C6E2;
            transform: skewY(-6deg);
            z-index: 0;
            border-radius: 12px;
        }
        .bg-accent-yellow::before {
            content: '';
            position: absolute;
            top: 5%; left: 5%; right: 15%; bottom: 10%;
            background: #F4E3B1;
            transform: skewX(-4deg);
            z-index: 0;
            border-radius: 12px;
        }
        /* FIX 2: Dynamic Active State Scaling on Slider Elements */
        .carousel-item.active .director-panel-block {
            transform: scale(1.02);
        }
        .carousel-item.active .director-image-card img {
            transform: scale(1.06); 
        }
        .carousel-item.active .director-name {
            font-size: 1.45rem; 
            color: #000000;
        }
        .carousel-item.active .director-designation {
            font-size: 0.95rem;
        }
        /* FIX 3: Dynamic Premium Interactions for View-All Grid Items */
        .view-all-mode-active .col-lg-6:hover .director-panel-block {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        }
        .view-all-mode-active .col-lg-6:hover .director-image-card img {
            transform: scale(1.08); 
        }
        .view-all-mode-active .col-lg-6:hover .director-name {
            color: var(--brand-red);
            transform: scale(1.03);
            transform-origin: left center;
        }
        /* --- Slider Overrides --- */
        /* ==========================================================================
   SWIPER JS LAYOUT LOGIC ENGINE
   ========================================================================== */
.slider-navigation-container {
    position: relative;
    width: 100%;
    overflow: hidden;
    padding: 0 15px;
}
/* Overlapping circular badges anchored to the left/right track boundaries */
.slider-arrow-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    background-color: #ffffff !important;
    border: 1px solid rgba(0, 0, 0, 0.06) !important;
    border-radius: 50% !important;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 1 !important;
    z-index: 15;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08) !important;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
}
.slider-arrow-prev {
    left: -10px; /* Aligns left button onto the edge boundary */
}
.slider-arrow-next {
    right: -10px; /* Aligns right button onto the edge boundary */
}
/* Dynamic color styles matching image 2 */
.slider-arrow-btn svg {
    width: 16px;
    height: 16px;
    fill: #0066A4; /* Structural blue chevron color */
    transition: transform 0.2s ease, fill 0.2s ease;
}
/* Premium hover state feedback */
.slider-arrow-btn:hover {
    background-color: var(--brand-red) !important;
    box-shadow: 0 6px 20px rgba(206, 32, 41, 0.3) !important;
    border-color: var(--brand-red) !important;
}
.slider-arrow-btn:hover svg {
    fill: #ffffff !important;
}
.slider-arrow-prev:hover svg {
    transform: translateX(-2px);
}
.slider-arrow-next:hover svg {
    transform: translateX(2px);
}
@media (max-width: 991px) {
    .slider-arrow-btn { 
        display: none !important; 
    }
}
/* Base slide dimensions management */
#sliderViewTrack .swiper-slide {
    height: auto !important; /* Forces uniform column layout scales */
    display: flex;
    justify-content: center;
}
/* Swiper navigation arrow styling overrides */
.swiper-button-prev, .swiper-button-next {
    width: 50px !important;
    height: 50px !important;
    background: #ffffff !important;
    border: 1px solid #eeeeee !important;
    border-radius: 50% !important;
    color: #002B66 !important;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    transition: all 0.2s ease;
}
.swiper-button-prev:after, .swiper-button-next:after {
    font-size: 16px !important;
    font-weight: bold;
}
.swiper-button-prev:hover, .swiper-button-next:hover {
    background: var(--brand-red) !important;
    color: #ffffff !important;
    border-color: var(--brand-red) !important;
}
/* Hide navigation arrows seamlessly on mobile devices */
@media (max-width: 991px) {
    .swiper-button-prev, .swiper-button-next {
        display: none !important;
    }
    .director-panel-block {
        flex-direction: column;
        gap: 20px;
        margin-bottom: 30px;
    }
    .director-data-card, .director-image-card {
        width: 100%;
    }
    .director-image-card {
        min-height: 280px;
        order: -1; 
    }
}
        /* --- View All Grid Overrides --- */
        .view-all-mode-active .carousel-inner {
            display: flex !important;
            flex-direction: row !important;
            flex-wrap: wrap !important;
            gap: 0 !important;
        }
        .view-all-mode-active .carousel-item {
            display: block !important;
            width: 100% !important;
            margin-right: 0 !important;
            float: none !important;
            position: relative !important;
            transform: none !important;
            transition: none !important;
        }
        /* ==========================================================================
   FIX: Premium Active Card Highlighting (Slider Mode Automation)
   ========================================================================== */
/* 1. Default State: Scale down inactive cards slightly or keep them neutral */
.carousel-item .director-panel-block {
    transform: scale(0.98);
    opacity: 0.85;
    transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.6s ease, box-shadow 0.6s ease;
}
.carousel-item .director-image-card img {
    transform: scale(1);
    transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
}
/* 2. Active State: Maximize prominence when the slide layer goes live */
.carousel-item.active .director-panel-block {
    transform: scale(1.03) !important; /* Pop the active card forward */
    opacity: 1 !important;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08) !important;
}
/* 3. Image Zoom Enhancement on Active Card */
.carousel-item.active .director-image-card img {
    transform: scale(1.08) !important; /* Displays a distinctly larger image dynamically */
}
/* 4. Text Prominence Expansion on Active Card */
.carousel-item.active .director-name {
    font-size: 1.2rem !important; /* Noticeably larger, prominent header text */
    font-weight: 800 !important;
    color: #000000 !important;
}
.carousel-item.active .director-designation {
    font-size: 0.95rem !important; /* Scale designation text in proportion */
    letter-spacing: 0.5px;
}
/* 5. Clean Transition Rules during Slide Animations */
.carousel-item-next .director-panel-block,
.carousel-item-prev .director-panel-block,
.carousel-item-start .director-panel-block,
.carousel-item-end .director-panel-block {
    transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.6s ease !important;
}
        /* Absolute reset overrides when context switches to plain Grid list layouts */
        .view-all-mode-active .carousel-item .director-panel-block {
            transform: none !important;
        }
        .view-all-mode-active .carousel-item .director-image-card img {
            transform: none !important;
        }
        .view-all-mode-active .carousel-item .director-name {
            font-size: 1.25rem !important;
        }
        .view-all-mode-active .carousel-item .director-designation {
            font-size: 0.85rem !important;
        }
        /* Hide control layout elements when viewing all grid elements */
        .slider-navigation-container.arrows-disabled .slider-arrow {
            display: none !important;
        }
        /* Top border section */
        .top-line {
            height: 1px;
            background: #d9d9d9;
            margin-top: 40px;
        }
        .content-section {
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }
        /* Right vertical pink border */
        .content-section::after {
            content: "";
            position: absolute;
            right: 40px;
            top: 0;
            height: 100%;
            width: 6px;
            background: rgba(255, 125, 125, 0.25);
        }
        .vision-title {
            font-family: Georgia, serif;
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 25px;
        }
        .vision-title .red {
            color: #d62828;
        }
        .underline {
            width: 70px;
            height: 3px;
            background: #d62828;
            margin: 0 auto 35px;
        }
        .description {
            max-width: 650px;
            margin: auto;
            color: #666;
            font-size: 17px;
            line-height: 1.9;
        }
        .copyright {
            margin-top: 50px;
            color: #d0d0d0;
            font-size: 15px;
        }
        @media (max-width: 768px) {
            .vision-title {
                font-size: 36px;
            }
            .description {
                font-size: 15px;
                padding: 0 20px;
            }
            .content-section::after {
                right: 15px;
            }
        }
        /* Responsive Breakpoints */
        @media(max-width: 992px) {
            .director-panel-block {
                flex-direction: column;
                gap: 20px;
                margin-bottom: 30px;
            }
            .director-data-card, .director-image-card {
                width: 100%;
                padding: 15px;
                border-radius: 10px;
            }
            /* .director-image-card {
                min-height: 80px;
                max-height: 160px;
                order: -1; 
            } */
            .director-image-card img
            {
              border-radius: 5px;
            }
            .slider-arrow { display: none !important; }
        }
    </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="<?php echo ABS_URL ?>js/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" id="bplugins-plyrio-css" href="<?= ABS_URL ?>assets/investors/h5vp.css" media="all">
  <link rel="stylesheet" id="html5-player-video-style-css" href="<?= ABS_URL ?>assets/investors/frontend.css" media="all">
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
  <link rel="stylesheet" href="<?= ABS_URL ?>assets/investors/dialog.min.css">
  <link rel="stylesheet" id="elementor-frontend-css" href="<?= ABS_URL ?>assets/investors/frontend.min.css" media="all">
  <link rel="stylesheet" id="widget-image-css" href="<?= ABS_URL ?>assets/investors/widget-image.min.css" media="all">
  <link rel="stylesheet" id="widget-nav-menu-css" href="<?= ABS_URL ?>assets/investors/widget-nav-menu.min.css" media="all">
  <link rel="stylesheet" id="widget-image-box-css" href="<?= ABS_URL ?>assets/investors/widget-image-box.min.css" media="all">
  <link rel="stylesheet" id="widget-mega-menu-css" href="<?= ABS_URL ?>assets/investors/widget-mega-menu.min.css" media="all">
  <link rel="stylesheet" id="widget-heading-css" href="<?= ABS_URL ?>assets/investors/widget-heading.min.css" media="all">
  <link rel="stylesheet" id="widget-text-editor-css" href="<?= ABS_URL ?>assets/investors/widget-text-editor.min.css" media="all">
  <link rel="stylesheet" id="widget-form-css" href="<?= ABS_URL ?>assets/investors/widget-form.min.css" media="all">
  <link rel="stylesheet" id="widget-divider-css" href="<?= ABS_URL ?>assets/investors/widget-divider.min.css" media="all">
  <link rel="stylesheet" id="widget-icon-list-css" href="<?= ABS_URL ?>assets/investors/widget-icon-list.min.css" media="all">
  <link rel="stylesheet" id="e-animation-bounce-css" href="<?= ABS_URL ?>assets/investors/bounce.min.css" media="all">
  <link rel="stylesheet" id="e-animation-fadeInUp-css" href="<?= ABS_URL ?>assets/investors/fadeInUp.min.css" media="all">
  <link rel="stylesheet" id="e-animation-fadeIn-css" href="<?= ABS_URL ?>assets/investors/fadeIn.min.css" media="all">
  <link rel="stylesheet" id="elementor-icons-css" href="<?= ABS_URL ?>assets/investors/elementor-icons.min.css" media="all">
  <link rel="stylesheet" id="swiper-css" href="<?= ABS_URL ?>assets/investors/swiper.min.css" media="all">
  <link rel="stylesheet" id="e-swiper-css" href="<?= ABS_URL ?>assets/investors/e-swiper.min.css" media="all">
  <link rel="stylesheet" id="elementor-post-6-css" href="<?= ABS_URL ?>assets/investors/post-6.css" media="all">
  <link rel="stylesheet" id="e-animation-bounceInUp-css" href="<?= ABS_URL ?>assets/investors/bounceInUp.min.css" media="all">
  <link rel="stylesheet" id="widget-nested-accordion-css" href="<?= ABS_URL ?>assets/investors/widget-nested-accordion.min.css" media="all">
  <link rel="stylesheet" id="widget-nested-tabs-css" href="<?= ABS_URL ?>assets/investors/widget-nested-tabs.min.css" media="all">
  <link rel="stylesheet" id="widget-image-carousel-css" href="<?= ABS_URL ?>assets/investors/widget-image-carousel.min.css" media="all">
  <link rel="stylesheet" id="widget-counter-css" href="<?= ABS_URL ?>assets/investors/widget-counter.min.css" media="all">
  <link rel="stylesheet" id="elementor-post-62-css" href="<?= ABS_URL ?>assets/investors/post-62.css" media="all">
  <link rel="stylesheet" id="elementor-post-76-css" href="<?= ABS_URL ?>assets/investors/post-76.css" media="all">
  <link rel="stylesheet" id="elementor-post-200-css" href="<?= ABS_URL ?>assets/investors/post-200.css" media="all">
  <link rel="stylesheet" id="elementor-post-5351-css" href="<?= ABS_URL ?>assets/investors/post-5351.css" media="all">
  <link rel="stylesheet" id="google-fonts-1-css" href="<?= ABS_URL ?>assets/investors/css" media="all">
  <link rel="stylesheet" id="elementor-icons-shared-0-css" href="<?= ABS_URL ?>assets/investors/fontawesome.min.css" media="all">
  <link rel="stylesheet" id="elementor-icons-fa-solid-css" href="<?= ABS_URL ?>assets/investors/solid.min.css" media="all">
  <link rel="stylesheet" id="elementor-icons-fa-brands-css" href="<?= ABS_URL ?>assets/investors/brands.min.css" media="all">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <script src="<?php echo ABS_URL ?>assets/investors/jquery.min.js.download" id="jquery-core-js"></script>
  <script src="<?php echo ABS_URL ?>assets/investors/jquery-migrate.min.js.download" id="jquery-migrate-js"></script>
  <link rel="https://api.w.org/" href="<?php echo ABS_URL ?>wp-json/">
  <link rel="alternate" title="JSON" type="application/json" href="<?php echo ABS_URL ?>wp-json/wp/v2/pages/62">
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo ABS_URL ?>xmlrpc.php?rsd">
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
      /* background: linear-gradient(180deg, #E82429 3.95%, rgba(232, 36, 41, 0) 100%); */
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
      /* background: linear-gradient(180deg, #E82429 1%, #BE1D21 30%, #801316 70%, #680F11 100%); */
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
      /* filter: grayscale(100); */
      /* opacity: .3; */
      transition: 1s all ease;
    }
    /* .slide img:hover {
  filter: grayscale(0);
  opacity: 1;
} */
    .slide:hover img {
      /* filter: grayscale(0); */
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
    /* .team_inner .elementor-widget-container {
      opacity: 0;
    }
    .team_inner .elementor-widget-container:hover {
      opacity: 1;
    } */
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
    .read-more-link
    {
      font-size: 12px;
      color: #CE2029;
    }
    /* ==========================================================================
   DIRECTOR CONTENT HOVER EFFECT (IMAGE ZOOM ONLY)
   ========================================================================== */
/* Triggers when mouse enters ANYWHERE on the parent panel block container */
.director-panel-block:hover .director-image-card img {
    transform: scale(1.12) !important; /* Premium clean image zoom */
}
/* Ensure the image card acts as a rigid frame mask */
.director-image-card {
    overflow: hidden !important; /* Prevents the zooming image from bleeding out of its boundary */
    position: relative;
}
/* Ensure the image layer transitions like silk */
.director-image-card img {
    transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1) !important;
    will-change: transform;
}
/* ==========================================================================
   CLEAN COEXISTENCE FOR GRID MODE ("VIEW ALL")
   ========================================================================== */
/* Overrides structural overrides that block image transformations */
.view-all-mode-active .carousel-item .director-image-card img {
    /* Allow CSS to override baseline styles exclusively during active hover states */
    transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1) !important;
}
/* Ensure grid overrides safely fall back to neutral state when NOT hovered */
.view-all-mode-active .carousel-item .director-panel-block:not(:hover) .director-image-card img {
    transform: scale(1) !important;
}
/* Custom Profile Modal Layout */
.custom-profile-modal {
    border: none !important;
    border-radius: 40px !important; /* Heavily rounded corners */
    overflow: visible; /* Allows close button to sit nicely */
    background-color: #ffffff;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
}
/* Image Wrapper with rounded corners */
.modal-img-wrapper {
    width: 100%;
    border-radius: 24px;
    overflow: hidden;
    background-color: #f8f9fa;
}
.modal-img-wrapper img {
    width: 100%;
    height: auto;
    object-fit: cover;
    display: block;
}
/* Top Red Label Badge */
.badge-designation {
    background-color: #e52323; /* Bright red tone */
    color: #ffffff;
    font-size: 11px;
    font-weight: 700;
    padding: 8px 16px;
    border-radius: 6px;
    letter-spacing: 0.5px;
    display: inline-block;
}
/* Typography Styles */
.director-modal-title {
    font-family: 'Georgia', serif; /* Matching the serif font type in the image */
    font-size: 2.2rem;
    font-weight: 700;
    color: #111111;
    margin-bottom: 8px;
}
.director-modal-subtitle {
    color: #e52323;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.5px;
    margin-bottom: 12px;
}
/* Red Divider Accent Line */
.red-line-divider {
    width: 40px;
    height: 3px;
    background-color: #e52323;
}
/* Scrollable Bio Body to prevent viewport overflow */
.director-modal-bio {
    font-size: 14px;
    line-height: 1.7;
    color: #666666;
    white-space: pre-line;
}
.director-modal-bio-wrapper {
    max-height: 320px;
    overflow-y: auto;
    padding-right: 10px;
}
/* Custom Close Button Layout */
.custom-modal-close {
    position: absolute;
    top: 25px;
    right: 25px;
    background: #ffffff;
    border: 1px solid #f0d0d0;
    color: #e52323;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    z-index: 1051;
}
.custom-modal-close:hover {
    background-color: #e52323;
    color: #ffffff;
    border-color: #e52323;
    transform: scale(1.05);
}
/* ==========================================================================
   MOBILE-ONLY SLIDER REDUCTION: SHOW ONLY 1 PROFILE CARD AT A TIME
   ========================================================================== */
   /* @media (max-width: 991px) {
    :not(.view-all-mode-active) > .carousel-inner .carousel-item .row {
        display: flex !important;
        flex-wrap: nowrap !important;
        overflow: hidden !important;
        width: 100% !important;
    }
    :not(.view-all-mode-active) > .carousel-inner .carousel-item .row > .col-lg-6 {
        flex: 0 0 100% !important;
        width: 100% !important;
        max-width: 100% !important;
    }
    :not(.view-all-mode-active) > .carousel-inner .carousel-item .row > .col-lg-6:nth-child(n+2) {
        display: none !important;
    }
} */
  </style>
  <script src="<?php echo ABS_URL ?>assets/investors/wp-emoji-release.min.js.download" defer=""></script>
</head>
<body class="page-template-default page page-id-62 wp-custom-logo elementor-default elementor-kit-6 elementor-page elementor-page-62 e--ua-blink e--ua-chrome e--ua-webkit dialog-body dialog-lightbox-body dialog-container dialog-lightbox-container" data-elementor-device-mode="desktop">
<?php require_once ABS_PATH . 'components/navbar/header.php'; ?>
    <header class="directors-header">
        <div class="container">
            <h1>Board of <em>Directors</em></h1>
            <p>Meet the leaders steering our vision — decades of expertise, integrity, and innovation forged into one board.</p>
        </div>
    </header>
    <!-- <div class="counter-divider">
        <div class="counter-badge">
            <h2><?php //echo $total_directors; ?></h2>
            <small>Directors</small>
        </div>
    </div> -->
    <main class="container my-5">
    <style>
      .director-bio {
    color: var(--text-muted);
    font-size: 0.85rem;
    line-height: 1.6;
    margin: 0 0 10px 0;
    /* Forces the text container to cleanly truncate at exactly 5 lines */
    display: -webkit-box;
    -webkit-line-clamp: 5;
    -webkit-box-orient: vertical;  
    overflow: hidden;
    text-overflow: ellipsis;
}
    </style>
    <div class="d-flex justify-content-between align-items-center controls-toolbar">
        <div class="section-label">Leadership Council</div>
        <div>
            <button class="mode-toggle-btn" id="layoutToggleBtn" data-mode="slider">View All Mode</button>
        </div>
    </div>
    <div class="slider-navigation-container" id="sliderViewTrack">
    <div id="directorsCarouselMobile" class="carousel slide d-block d-lg-none" data-bs-ride="carousel" data-bs-interval="5000" data-bs-touch="true">
        <div class="carousel-inner">
            <?php foreach ($directors as $index => $director): 
                $bio = $director['description'];
            ?>
            <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                <div class="row row-cols-1 g-4 w-100 m-0 px-5">
                    <div class="col">
                        <div class="director-panel-block open-profile-modal"
                             data-title="<?php echo htmlspecialchars($director['title']); ?>"
                             data-designation="<?php echo htmlspecialchars($director['designation']); ?>"
                             data-bio="<?php echo htmlspecialchars($bio); ?>"
                             data-picture="<?php echo htmlspecialchars(ABS_URL . 'uploads/panels/' . basename($director['picture'])); ?>">
                            <div class="director-data-card">
                                <h3 class="director-name"><?php echo htmlspecialchars($director['title']); ?></h3>
                                <p class="director-designation"><?php echo htmlspecialchars($director['designation']); ?></p>
                                <p class="director-bio"><?php echo htmlspecialchars($bio); ?></p>
                                <span class="read-more-link">Read Full Bio</span>
                            </div>
                            <div class="director-image-card">
                                <img src="<?php echo htmlspecialchars(ABS_URL . 'uploads/panels/' . basename($director['picture'])); ?>" alt="<?php echo htmlspecialchars($director['title']); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <button class="slider-arrow-btn slider-arrow-prev" type="button" data-bs-target="#directorsCarouselMobile" data-bs-slide="prev">
            <svg viewBox="0 0 320 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
        </button>
        <button class="slider-arrow-btn slider-arrow-next" type="button" data-bs-target="#directorsCarouselMobile" data-bs-slide="next">
            <svg viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
        </button>
    </div>
    <div id="directorsCarouselDesktop" class="carousel slide d-none d-lg-block" data-bs-ride="carousel" data-bs-interval="5000" data-bs-touch="true">
        <div class="carousel-inner">
            <?php 
            $sliderChunks = array_chunk($directors, 2);
            foreach ($sliderChunks as $slide_index => $pair): 
                $active_class = ($slide_index === 0) ? 'active' : '';
            ?>
            <div class="carousel-item <?php echo $active_class; ?>">
                <div class="row row-cols-2 g-4 w-100 m-0 px-5">
                    <?php foreach ($pair as $director): 
                        $bio = $director['description'];
                    ?>
                    <div class="col">
                        <div class="director-panel-block open-profile-modal"
                             data-title="<?php echo htmlspecialchars($director['title']); ?>"
                             data-designation="<?php echo htmlspecialchars($director['designation']); ?>"
                             data-bio="<?php echo htmlspecialchars($bio); ?>"
                             data-picture="<?php echo htmlspecialchars(ABS_URL . 'uploads/panels/' . basename($director['picture'])); ?>">
                            <div class="director-data-card">
                                <h3 class="director-name"><?php echo htmlspecialchars($director['title']); ?></h3>
                                <p class="director-designation"><?php echo htmlspecialchars($director['designation']); ?></p>
                                <p class="director-bio"><?php echo htmlspecialchars($bio); ?></p>
                                <span class="read-more-link">Read Full Bio</span>
                            </div>
                            <div class="director-image-card">
                                <img src="<?php echo htmlspecialchars(ABS_URL . 'uploads/panels/' . basename($director['picture'])); ?>" alt="<?php echo htmlspecialchars($director['title']); ?>">
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <button class="slider-arrow-btn slider-arrow-prev" type="button" data-bs-target="#directorsCarouselDesktop" data-bs-slide="prev">
            <svg viewBox="0 0 320 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
        </button>
        <button class="slider-arrow-btn slider-arrow-next" type="button" data-bs-target="#directorsCarouselDesktop" data-bs-slide="next">
            <svg viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
        </button>
    </div> 
</div>
<div class="d-none" id="gridViewTrack">
    <div class="row g-4 w-100 m-0">
        <?php foreach ($directors as $director): ?>
        <div class="col-xl-6 col-lg-10 col-md-12 mb-3 mx-auto">
            <div class="director-panel-block open-profile-modal"
                 data-title="<?php echo htmlspecialchars($director['title']); ?>"
                 data-designation="<?php echo htmlspecialchars($director['designation']); ?>"
                 data-bio="<?php echo htmlspecialchars($director['description']); ?>"
                 data-picture="<?php echo htmlspecialchars(ABS_URL . 'uploads/panels/' . basename($director['picture'])); ?>">
                <div class="director-data-card shadow-lg">
                    <div>
                        <h3 class="director-name"><?php echo htmlspecialchars($director['title']); ?></h3>
                        <p class="director-designation"><?php echo htmlspecialchars($director['designation']); ?></p>
                        <p class="director-bio"><?php echo htmlspecialchars($director['description']); ?></p>
                        <span class="read-more-link">Read Full Bio</span>
                    </div>
                </div>
                <div class="director-image-card">
                    <img src="<?php echo htmlspecialchars(ABS_URL . 'uploads/panels/' . basename($director['picture'])); ?>" alt="<?php echo htmlspecialchars($director['title']); ?>">
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
    <div class="modal fade" id="directorProfileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content custom-profile-modal">
                <button type="button" class="custom-modal-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
                <div class="modal-body p-4 p-md-5">
                    <div class="row g-4 align-items-stretch">
                        <div class="col-md-5 d-flex align-items-center justify-content-center">
                            <div class="modal-img-wrapper shadow">
                                <img id="modalDirectorImg" src="" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-7 d-flex flex-column justify-content-center ps-md-4">
                            <div class="mb-3">
                                <span id="modalDirectorPill" class="badge-designation text-uppercase"></span>
                            </div>
                            <h2 id="modalDirectorName" class="director-modal-title"></h2>
                            <p id="modalDirectorDesignation" class="director-modal-subtitle text-uppercase"></p>
                            <div class="red-line-divider mb-4"></div>
                            <div class="director-modal-bio-wrapper">
                                <p id="modalDirectorBio" class="director-modal-bio"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="top-line"></div>
<section class="content-section">
    <div class="container">
        <h1 class="vision-title">
            Gallant <span class="red">Vision</span>
        </h1>
        <div class="underline"></div>
        <p class="description">
            Leadership information is current as of the latest regulatory filing.
            For investor relations and governance queries, please contact the board
            secretariat.
        </p>
        <div class="copyright">
            © 2026 Gallant Vision Boards - All Rights Reserved
        </div>
    </div>
</section>
  <div data-elementor-type="footer" data-elementor-id="200" class="elementor elementor-200 elementor-location-footer" data-elementor-post-type="elementor_library">
    <?php require_once ABS_PATH . 'components/footer/footer.php'; ?>
  </div>
  <script>
  function checkBioOverflow() {
    // Select all bio text nodes currently rendered across all components
    document.querySelectorAll('.director-bio').forEach(bio => {
        const panel = bio.closest('.director-data-card');
        if (!panel) return;
        const readMoreBtn = panel.querySelector('.read-more-link');
        if (!readMoreBtn) return;
        // If scrollHeight > clientHeight, the content exceeds the 5-line CSS clamp constraint
        if (bio.scrollHeight > bio.clientHeight) {
            readMoreBtn.style.setProperty('display', 'inline-flex', 'important');
        } else {
            readMoreBtn.style.setProperty('display', 'none', 'important');
        }
    });
}
document.addEventListener('DOMContentLoaded', () => {
    // Run layout scan after styling computations settle
    setTimeout(checkBioOverflow, 200);
    window.addEventListener('resize', checkBioOverflow);
    // Core Layout View Toggle integration hook
    document.getElementById('layoutToggleBtn')?.addEventListener('click', () => {
        setTimeout(checkBioOverflow, 100);
    });
    // FIX: Listen for Bootstrap Carousel slide completion events 
    // to dynamically recalculate text node heights on subsequent slides
    const mobileCarousel = document.getElementById('directorsCarouselMobile');
    if (mobileCarousel) {
        mobileCarousel.addEventListener('slid.bs.carousel', () => {
            checkBioOverflow();
        });
    }
    const desktopCarousel = document.getElementById('directorsCarouselDesktop');
    if (desktopCarousel) {
        desktopCarousel.addEventListener('slid.bs.carousel', () => {
            checkBioOverflow();
        });
    }
});
  </script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const modalElement = document.getElementById('directorProfileModal');
    if (!modalElement) return;
    const profileModal = new bootstrap.Modal(modalElement);
    document.querySelectorAll('.open-profile-modal').forEach(panel => {
        panel.addEventListener('click', function () {
            // Get data fields
            const title = this.getAttribute('data-title');
            const designation = this.getAttribute('data-designation');
            const bio = this.getAttribute('data-bio');
            const picture = this.getAttribute('data-picture');
            // Apply data to matching styled tags
            document.getElementById('modalDirectorName').textContent = title;
            document.getElementById('modalDirectorPill').textContent = designation; // Maps to the red badge
            document.getElementById('modalDirectorDesignation').textContent = designation; // Maps to secondary tag
            document.getElementById('modalDirectorBio').textContent = bio;
            const modalImg = document.getElementById('modalDirectorImg');
            modalImg.src = picture;
            modalImg.alt = title;
            // Trigger Display
            profileModal.show();
        });
    });
});
</script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.querySelectorAll(".animated-counter").forEach(function(counter) {
        let start = 0;
        let end = parseFloat(counter.textContent.replace(/,/g, "")) || 0; // Remove commas & convert to number
        let duration = 2000; // 2 seconds animation time
        let step = Math.max(1, end / 50); // Adjust step dynamically
        let stepTime = Math.max(20, duration / (end / step)); // Speed adjustment
        // Show the final value instantly
        counter.textContent = end.toLocaleString();
        // Delay before starting the animation
        setTimeout(() => {
          let current = start;
          let timer = setInterval(function() {
            current += step;
            if (current >= end) {
              current = end; // Ensure exact stop
              clearInterval(timer);
            }
            counter.textContent = current.toLocaleString();
          }, stepTime);
        }, 500); // 500ms delay before animation starts
      });
    });
  </script>
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
  <link rel="stylesheet" id="elementor-post-3641-css" href="<?= ABS_URL ?>assets/investors/post-3641.css" media="all">
  <link rel="stylesheet" id="e-animation-slideInUp-css" href="<?= ABS_URL ?>assets/investors/slideInUp.min.css" media="all">
  <link rel="stylesheet" id="elementor-post-148-css" href="<?= ABS_URL ?>assets/investors/post-148.css" media="all">
  <link rel="stylesheet" id="widget-search-form-css" href="<?= ABS_URL ?>assets/investors/widget-search-form.min.css" media="all">
  <link rel="stylesheet" id="e-animation-slideInDown-css" href="<?= ABS_URL ?>assets/investors/slideInDown.min.css" media="all">
  <link rel="stylesheet" id="e-motion-fx-css" href="<?= ABS_URL ?>assets/investors/motion-fx.min.css" media="all">
  <link rel="stylesheet" id="e-sticky-css" href="<?= ABS_URL ?>assets/investors/sticky.min.css" media="all">
  <link rel="stylesheet" id="e-popup-css" href="<?= ABS_URL ?>assets/investors/popup.min.css" media="all">
  <script src="<?php echo ABS_URL ?>assets/investors/jquery.smartmenus.min.js.download" id="smartmenus-js"></script>
  <script src="<?php echo ABS_URL ?>assets/investors/jquery.sticky.min.js.download" id="e-sticky-js"></script>
  <script src="<?php echo ABS_URL ?>assets/investors/jquery-numerator.min.js.download" id="jquery-numerator-js"></script>
  <script src="<?php echo ABS_URL ?>assets/investors/webpack-pro.runtime.min.js.download" id="elementor-pro-webpack-runtime-js"></script>
  <script src="<?php echo ABS_URL ?>assets/investors/webpack.runtime.min.js.download" id="elementor-webpack-runtime-js"></script>
  <script src="<?php echo ABS_URL ?>assets/investors/frontend-modules.min.js.download" id="elementor-frontend-modules-js"></script>
  <script src="<?php echo ABS_URL ?>assets/investors/hooks.min.js.download" id="wp-hooks-js"></script>
  <script src="<?php echo ABS_URL ?>assets/investors/i18n.min.js.download" id="wp-i18n-js"></script>
</body>
<script src="<?php echo ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="<?php echo ABS_URL ?>js/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById('layoutToggleBtn');
    const sliderViewTrack = document.getElementById('sliderViewTrack');
    const gridViewTrack = document.getElementById('gridViewTrack');
    const carouselElMobile = document.getElementById('directorsCarouselMobile');
    const carouselElDesktop = document.getElementById('directorsCarouselDesktop');
    let bsCarouselMobile = new bootstrap.Carousel(carouselElMobile, { interval: 5000, ride: 'carousel', wrap: true });
    let bsCarouselDesktop = new bootstrap.Carousel(carouselElDesktop, { interval: 5000, ride: 'carousel', wrap: true });
    toggleBtn.addEventListener('click', function () {
        const currentMode = toggleBtn.getAttribute('data-mode');
        if (currentMode === 'slider') {
            toggleBtn.setAttribute('data-mode', 'grid');
            toggleBtn.textContent = 'Slider Mode';
            sliderViewTrack.classList.add('d-none');
            gridViewTrack.classList.remove('d-none');
            bsCarouselMobile.dispose();
            bsCarouselDesktop.dispose();
        } else {
            toggleBtn.setAttribute('data-mode', 'slider');
            toggleBtn.textContent = 'View All Mode';
            gridViewTrack.classList.add('d-none');
            sliderViewTrack.classList.remove('d-none');
            bsCarouselMobile = new bootstrap.Carousel(carouselElMobile, { interval: 5000, ride: 'carousel', wrap: true });
            bsCarouselDesktop = new bootstrap.Carousel(carouselElDesktop, { interval: 5000, ride: 'carousel', wrap: true });
            bsCarouselMobile.cycle();
            bsCarouselDesktop.cycle();
        }
    });
});</script>
<script>
  document.querySelectorAll('.accordion-button').forEach(button => {
    button.addEventListener('click', function() {
      const icon = this.querySelector('.icon svg');
      const isExpanded = this.getAttribute('aria-expanded') === 'true';
      if (isExpanded) {
        icon.outerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><circle cx="9.53556" cy="9.88602" r="8.33048" fill="#E1251B"></circle><path d="M5.6213 10.6889C5.3938 10.6889 5.2031 10.6119 5.0492 10.458C4.89531 10.3041 4.81836 10.1134 4.81836 9.88595C4.81836 9.65845 4.89531 9.46775 5.0492 9.31385C5.2031 9.15996 5.3938 9.08301 5.6213 9.08301H13.6507C13.8782 9.08301 14.0689 9.15996 14.2228 9.31385C14.3767 9.46775 14.4536 9.65845 14.4536 9.88595C14.4536 10.1134 14.3767 10.3041 14.2228 10.458C14.0689 10.6119 13.8782 10.6889 13.6507 10.6889H5.6213Z" fill="white"></path></svg>`;
      } else {
        icon.outerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M9.63484 17.9153C9.42073 17.9153 9.21665 17.8785 9.02261 17.8049C8.82856 17.7313 8.65794 17.6142 8.51073 17.4536L2.1073 11.0301C1.9601 10.8695 1.83966 10.6922 1.74598 10.4982C1.65231 10.3041 1.60547 10.1001 1.60547 9.88594C1.60547 9.67183 1.65231 9.46775 1.74598 9.2737C1.83966 9.07966 1.9601 8.90904 2.1073 8.76183L8.51073 2.33833C8.67132 2.17774 8.84529 2.0573 9.03264 1.97701C9.21999 1.89671 9.42073 1.85657 9.63484 1.85657C9.84896 1.85657 10.0564 1.89671 10.2571 1.97701C10.4579 2.0573 10.6318 2.17774 10.779 2.33833L17.1624 8.76183C17.3096 8.92242 17.43 9.09639 17.5237 9.28374C17.6174 9.47109 17.6642 9.67183 17.6642 9.88594C17.6642 10.1001 17.6207 10.3041 17.5337 10.4982C17.4468 10.6922 17.323 10.8695 17.1624 11.0301L10.779 17.4536C10.6318 17.6008 10.4579 17.7146 10.2571 17.7949C10.0564 17.8752 9.84896 17.9153 9.63484 17.9153Z" fill="#07C580"/></svg>`;
      }
    });
  });
</script>
<script>
  jQuery(document).ready(function($) {
    $('.elementor-counter-number').each(function() {
      var $this = $(this);
      var countTo = $this.attr('data-to-value');
      var duration = $this.attr('data-duration') || 2000; // Default to 2000ms
      $({
        countNum: $this.text()
      }).animate({
        countNum: countTo
      }, {
        duration: parseInt(duration),
        easing: 'swing',
        step: function() {
          $this.text(Math.floor(this.countNum));
        },
        complete: function() {
          $this.text(this.countNum);
        }
      });
    });
  });
</script>
<script>
  document.querySelectorAll('.toggle-submenu').forEach(item => {
    item.addEventListener('click', function(e) {
      e.stopPropagation();
      const parent = this.closest('.has-submenu');
      const siblings = Array.from(parent.parentElement.children).filter(el => el !== parent && el.classList.contains('has-submenu'));
      // Close other sibling submenus
      siblings.forEach(sibling => sibling.classList.remove('open'));
      // Toggle current
      parent.classList.toggle('open');
    });
  });
</script>
<script>
        let stockChart;
        function switchTab(tab) {
            $('.tab').removeClass('active');
            $(tab).addClass('active');
            const symbol = $(tab).data('symbol');
            loadStock(symbol);
        }
        function loadStock(symbol) {
            $.getJSON('action/get_stock_data_yahoo.php?symbol=' + symbol, function(data) {
                if (data.error) {
                    alert(data.error);
                    return;
                }
                const ctx = document.getElementById('stockChart').getContext('2d');
                if (stockChart instanceof Chart) stockChart.destroy();
                stockChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.dates,
                        datasets: [{
                            label: `${data.symbol} - Closing Prices`,
                            data: data.prices,
                            borderColor: '#d93025',
                            backgroundColor: '#d9302520',
                            tension: 0.3,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: { title: { display: true, text: 'Date' } },
                            y: { title: { display: true, text: 'Price (INR)' } }
                        }
                    }
                });
                const latest = parseFloat(data.prices[data.prices.length - 1]);
                const previous = parseFloat(data.prices[data.prices.length - 2]);
                const change = latest - previous;
                const changePercent = ((change / previous) * 100).toFixed(2);
                const isUp = change >= 0;
                $('#currentSymbol').text(data.symbol);
                $('#currentPrice').text(`₹${latest.toFixed(2)}`);
                $('#prevClose').text(`Previous Close: ₹${previous.toFixed(2)}`);
                $('#changeInfo')
    .text(` ${isUp ? '+' : ''}₹${change.toFixed(2)} (${isUp ? '+' : ''}${changePercent}%) ${isUp ? '🔼' : '🔽'} Today`)
    .removeClass('positive negative')
    .addClass(isUp ? 'positive' : 'negative');
            });
        }
        $(document).ready(() => {
            loadStock('GALLANTT.NS'); // Load NSE by default
            setInterval(() => loadStock('GALLANTT.NS'), 15000); // Refresh every 15 seconds
        });
    </script>
</html>