<?php 
require_once '../config/config.php';
$job = new Job();
$jobs = $job->getActiveJobs();
$GujaratJobs = $job->getActiveJobs('Gujarat');
$UttarPradeshJobs = $job->getActiveJobs('Uttar Pradesh');
?>
<!doctype html>
<html dir=ltr lang=en-US prefix="og: https://ogp.me/ns#">
<head>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<meta name=viewport content="width=device-width,initial-scale=1">
<link rel=profile href=https://gmpg.org/xfn/11>
<title>Careers - Gallantt Group of Industries</title>
<style>img:is([sizes=auto i],[sizes^="auto," i]){contain-intrinsic-size:3000px 1500px}</style>
<link href="<?php echo ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css" rel=stylesheet>
<link rel=stylesheet href="<?php echo ABS_URL ?>components/navbar/header.css">
<link rel="stylesheet" href="<?php echo ABS_URL ?>assets/custom.css">
<link rel="stylesheet" href="<?php echo ABS_URL ?>assets/responsive.css">
<meta name=description content="&quot;Empowering Careers, Strengthening Futures&quot; - C.P. Agarwal Chairman &amp; Managing Director Careers JOIN OUR TEAM At Gallantt Group, we believe that our people are our greatest strength. We are committed to fostering a culture of innovation, dedication, and excellence. Join us and become part of a dynamic team that is shaping the future of India&#39;s">
<meta name=robots content=max-image-preview:large>
<link rel=canonical href="<?php echo ABS_URL ?>careers">
<meta property=og:locale content=en_US>
<meta property=og:site_name content="Gallantt Group of Industries - Gallantt Group of Industries">
<meta property=og:type content=article>
<meta property=og:title content="Careers - Gallantt Group of Industries">
<meta property=og:description content="&quot;Empowering Careers, Strengthening Futures&quot; - C.P. Agarwal Chairman &amp; Managing Director Careers JOIN OUR TEAM At Gallantt Group, we believe that our people are our greatest strength. We are committed to fostering a culture of innovation, dedication, and excellence. Join us and become part of a dynamic team that is shaping the future of India&#39;s">
<meta property=og:url content=careers.php>
<meta property=og:image content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
<meta property=og:image:secure_url content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
<meta property=article:published_time content=2024-09-06T10:33:50+00:00>
<meta property=article:modified_time content=2024-11-11T09:20:41+00:00>
<meta name=twitter:card content=summary_large_image>
<meta name=twitter:title content="Careers - Gallantt Group of Industries">
<meta name=twitter:description content="&quot;Empowering Careers, Strengthening Futures&quot; - C.P. Agarwal Chairman &amp; Managing Director Careers JOIN OUR TEAM At Gallantt Group, we believe that our people are our greatest strength. We are committed to fostering a culture of innovation, dedication, and excellence. Join us and become part of a dynamic team that is shaping the future of India&#39;s">
<meta name=twitter:image content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
<style id=wp-emoji-styles-inline-css>img.emoji,img.wp-smiley{display:inline!important;border:none!important;box-shadow:none!important;height:1em!important;width:1em!important;margin:0 .07em!important;vertical-align:-.1em!important;background:0 0!important;padding:0!important}</style>
<link rel=stylesheet id=bplugins-plyrio-css href="<?= ABS_URL ?>assets/careers/h5vp.css" media=all>
<link rel=stylesheet id=html5-player-video-style-css href="<?= ABS_URL ?>assets/careers/frontend.css" media=all>
<style id=classic-theme-styles-inline-css>/*! This file is auto-generated */.wp-block-button__link{color:#fff;background-color:#32373c;border-radius:9999px;box-shadow:none;text-decoration:none;padding:calc(.667em + 2px) calc(1.333em + 2px);font-size:1.125em}.wp-block-file__button{background:#32373c;color:#fff;text-decoration:none}</style>
<style id=global-styles-inline-css>:root{--wp--preset--aspect-ratio--square:1;--wp--preset--aspect-ratio--4-3:4/3;--wp--preset--aspect-ratio--3-4:3/4;--wp--preset--aspect-ratio--3-2:3/2;--wp--preset--aspect-ratio--2-3:2/3;--wp--preset--aspect-ratio--16-9:16/9;--wp--preset--aspect-ratio--9-16:9/16;--wp--preset--color--black:#000000;--wp--preset--color--cyan-bluish-gray:#abb8c3;--wp--preset--color--white:#ffffff;--wp--preset--color--pale-pink:#f78da7;--wp--preset--color--vivid-red:#cf2e2e;--wp--preset--color--luminous-vivid-orange:#ff6900;--wp--preset--color--luminous-vivid-amber:#fcb900;--wp--preset--color--light-green-cyan:#7bdcb5;--wp--preset--color--vivid-green-cyan:#00d084;--wp--preset--color--pale-cyan-blue:#8ed1fc;--wp--preset--color--vivid-cyan-blue:#0693e3;--wp--preset--color--vivid-purple:#9b51e0;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple:linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan:linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange:linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red:linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray:linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);--wp--preset--gradient--cool-to-warm-spectrum:linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);--wp--preset--gradient--blush-light-purple:linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);--wp--preset--gradient--blush-bordeaux:linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);--wp--preset--gradient--luminous-dusk:linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);--wp--preset--gradient--pale-ocean:linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);--wp--preset--gradient--electric-grass:linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);--wp--preset--gradient--midnight:linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);--wp--preset--font-size--small:13px;--wp--preset--font-size--medium:20px;--wp--preset--font-size--large:36px;--wp--preset--font-size--x-large:42px;--wp--preset--spacing--20:0.44rem;--wp--preset--spacing--30:0.67rem;--wp--preset--spacing--40:1rem;--wp--preset--spacing--50:1.5rem;--wp--preset--spacing--60:2.25rem;--wp--preset--spacing--70:3.38rem;--wp--preset--spacing--80:5.06rem;--wp--preset--shadow--natural:6px 6px 9px rgba(0, 0, 0, 0.2);--wp--preset--shadow--deep:12px 12px 50px rgba(0, 0, 0, 0.4);--wp--preset--shadow--sharp:6px 6px 0px rgba(0, 0, 0, 0.2);--wp--preset--shadow--outlined:6px 6px 0px -3px rgba(255, 255, 255, 1),6px 6px rgba(0, 0, 0, 1);--wp--preset--shadow--crisp:6px 6px 0px rgba(0, 0, 0, 1)}:where(.is-layout-flex){gap:.5em}:where(.is-layout-grid){gap:.5em}body .is-layout-flex{display:flex}.is-layout-flex{flex-wrap:wrap;align-items:center}.is-layout-flex>:is(*,div){margin:0}body .is-layout-grid{display:grid}.is-layout-grid>:is(*,div){margin:0}.has-black-color{color:var(--wp--preset--color--black)!important}.has-cyan-bluish-gray-color{color:var(--wp--preset--color--cyan-bluish-gray)!important}.has-white-color{color:var(--wp--preset--color--white)!important}.has-pale-pink-color{color:var(--wp--preset--color--pale-pink)!important}.has-vivid-red-color{color:var(--wp--preset--color--vivid-red)!important}.has-luminous-vivid-orange-color{color:var(--wp--preset--color--luminous-vivid-orange)!important}.has-luminous-vivid-amber-color{color:var(--wp--preset--color--luminous-vivid-amber)!important}.has-light-green-cyan-color{color:var(--wp--preset--color--light-green-cyan)!important}.has-vivid-green-cyan-color{color:var(--wp--preset--color--vivid-green-cyan)!important}.has-pale-cyan-blue-color{color:var(--wp--preset--color--pale-cyan-blue)!important}.has-vivid-cyan-blue-color{color:var(--wp--preset--color--vivid-cyan-blue)!important}.has-vivid-purple-color{color:var(--wp--preset--color--vivid-purple)!important}.has-black-background-color{background-color:var(--wp--preset--color--black)!important}.has-cyan-bluish-gray-background-color{background-color:var(--wp--preset--color--cyan-bluish-gray)!important}.has-white-background-color{background-color:var(--wp--preset--color--white)!important}.has-pale-pink-background-color{background-color:var(--wp--preset--color--pale-pink)!important}.has-vivid-red-background-color{background-color:var(--wp--preset--color--vivid-red)!important}.has-luminous-vivid-orange-background-color{background-color:var(--wp--preset--color--luminous-vivid-orange)!important}.has-luminous-vivid-amber-background-color{background-color:var(--wp--preset--color--luminous-vivid-amber)!important}.has-light-green-cyan-background-color{background-color:var(--wp--preset--color--light-green-cyan)!important}.has-vivid-green-cyan-background-color{background-color:var(--wp--preset--color--vivid-green-cyan)!important}.has-pale-cyan-blue-background-color{background-color:var(--wp--preset--color--pale-cyan-blue)!important}.has-vivid-cyan-blue-background-color{background-color:var(--wp--preset--color--vivid-cyan-blue)!important}.has-vivid-purple-background-color{background-color:var(--wp--preset--color--vivid-purple)!important}.has-black-border-color{border-color:var(--wp--preset--color--black)!important}.has-cyan-bluish-gray-border-color{border-color:var(--wp--preset--color--cyan-bluish-gray)!important}.has-white-border-color{border-color:var(--wp--preset--color--white)!important}.has-pale-pink-border-color{border-color:var(--wp--preset--color--pale-pink)!important}.has-vivid-red-border-color{border-color:var(--wp--preset--color--vivid-red)!important}.has-luminous-vivid-orange-border-color{border-color:var(--wp--preset--color--luminous-vivid-orange)!important}.has-luminous-vivid-amber-border-color{border-color:var(--wp--preset--color--luminous-vivid-amber)!important}.has-light-green-cyan-border-color{border-color:var(--wp--preset--color--light-green-cyan)!important}.has-vivid-green-cyan-border-color{border-color:var(--wp--preset--color--vivid-green-cyan)!important}.has-pale-cyan-blue-border-color{border-color:var(--wp--preset--color--pale-cyan-blue)!important}.has-vivid-cyan-blue-border-color{border-color:var(--wp--preset--color--vivid-cyan-blue)!important}.has-vivid-purple-border-color{border-color:var(--wp--preset--color--vivid-purple)!important}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background:var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple)!important}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background:var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan)!important}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background:var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange)!important}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background:var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red)!important}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background:var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray)!important}.has-cool-to-warm-spectrum-gradient-background{background:var(--wp--preset--gradient--cool-to-warm-spectrum)!important}.has-blush-light-purple-gradient-background{background:var(--wp--preset--gradient--blush-light-purple)!important}.has-blush-bordeaux-gradient-background{background:var(--wp--preset--gradient--blush-bordeaux)!important}.has-luminous-dusk-gradient-background{background:var(--wp--preset--gradient--luminous-dusk)!important}.has-pale-ocean-gradient-background{background:var(--wp--preset--gradient--pale-ocean)!important}.has-electric-grass-gradient-background{background:var(--wp--preset--gradient--electric-grass)!important}.has-midnight-gradient-background{background:var(--wp--preset--gradient--midnight)!important}.has-small-font-size{font-size:var(--wp--preset--font-size--small)!important}.has-medium-font-size{font-size:var(--wp--preset--font-size--medium)!important}.has-large-font-size{font-size:var(--wp--preset--font-size--large)!important}.has-x-large-font-size{font-size:var(--wp--preset--font-size--x-large)!important}:where(.wp-block-post-template.is-layout-flex){gap:1.25em}:where(.wp-block-post-template.is-layout-grid){gap:1.25em}:where(.wp-block-columns.is-layout-flex){gap:2em}:where(.wp-block-columns.is-layout-grid){gap:2em}:root :where(.wp-block-pullquote){font-size:1.5em;line-height:1.6}</style>
<link rel=stylesheet href="<?= ABS_URL ?>assets/careers/dialog.min.css">
<link rel=stylesheet id=elementor-frontend-css href="<?= ABS_URL ?>assets/careers/frontend.min.css" media=all>
<link rel=stylesheet id=widget-image-css href="<?= ABS_URL ?>assets/careers/widget-image.min.css" media=all>
<link rel=stylesheet id=widget-nav-menu-css href="<?= ABS_URL ?>assets/careers/widget-nav-menu.min.css" media=all>
<link rel=stylesheet id=widget-image-box-css href="<?= ABS_URL ?>assets/careers/widget-image-box.min.css" media=all>
<link rel=stylesheet id=widget-mega-menu-css href="<?= ABS_URL ?>assets/careers/widget-mega-menu.min.css" media=all>
<link rel=stylesheet id=widget-heading-css href="<?= ABS_URL ?>assets/careers/widget-heading.min.css" media=all>
<link rel=stylesheet id=widget-text-editor-css href="<?= ABS_URL ?>assets/careers/widget-text-editor.min.css" media=all>
<link rel=stylesheet id=widget-form-css href="<?= ABS_URL ?>assets/careers/widget-form.min.css" media=all>
<link rel=stylesheet id=widget-divider-css href="<?= ABS_URL ?>assets/careers/widget-divider.min.css" media=all>
<link rel=stylesheet id=widget-icon-list-css href="<?= ABS_URL ?>assets/careers/widget-icon-list.min.css" media=all>
<link rel=stylesheet id=e-animation-bounce-css href="<?= ABS_URL ?>assets/careers/bounce.min.css" media=all>
<link rel=stylesheet id=e-animation-fadeInUp-css href="<?= ABS_URL ?>assets/careers/fadeInUp.min.css" media=all>
<link rel=stylesheet id=e-animation-fadeIn-css href="<?= ABS_URL ?>assets/careers/fadeIn.min.css" media=all>
<link rel=stylesheet id=elementor-icons-css href="<?= ABS_URL ?>assets/careers/elementor-icons.min.css" media=all>
<link rel=stylesheet id=swiper-css href="<?= ABS_URL ?>assets/careers/swiper.min.css" media=all>
<link rel=stylesheet id=e-swiper-css href="<?= ABS_URL ?>assets/careers/e-swiper.min.css" media=all>
<link rel=stylesheet id=elementor-post-6-css href="<?= ABS_URL ?>assets/careers/post-6.css" media=all>
<link rel=stylesheet id=widget-loop-filter-css href="<?= ABS_URL ?>assets/careers/widget-loop-filter.min.css" media=all>
<link rel=stylesheet id=widget-loop-builder-css href="<?= ABS_URL ?>assets/careers/widget-loop-builder.min.css" media=all>
<link rel=stylesheet id=widget-image-carousel-css href="<?= ABS_URL ?>assets/careers/widget-image-carousel.min.css" media=all>
<link rel=stylesheet id=elementor-post-2559-css href="<?= ABS_URL ?>assets/careers/post-2559.css" media=all>
<link rel=stylesheet id=elementor-post-76-css href="<?= ABS_URL ?>assets/careers/post-76.css" media=all>
<link rel=stylesheet id=elementor-post-200-css href="<?= ABS_URL ?>assets/careers/post-200.css" media=all>
<link rel=stylesheet id=elementor-post-5351-css href="<?= ABS_URL ?>assets/careers/post-5351.css" media=all>
<link rel=stylesheet id=google-fonts-1-css href="<?= ABS_URL ?>assets/careers/css" media=all>
<link rel=stylesheet id=elementor-icons-shared-0-css href="<?= ABS_URL ?>assets/careers/fontawesome.min.css" media=all>
<link rel=stylesheet id=elementor-icons-fa-solid-css href="<?= ABS_URL ?>assets/careers/solid.min.css" media=all>
<link rel=stylesheet id=elementor-icons-fa-brands-css href="<?= ABS_URL ?>assets/careers/brands.min.css" media=all>
<link rel=stylesheet href=<?php echo ABS_URL ?>css/all.min.css>
<link rel=preconnect href=https://fonts.gstatic.com/ crossorigin="">
<script src=assets/careers/jquery.min.js.download id=jquery-core-js></script>
<script src=assets/careers/jquery-migrate.min.js.download id=jquery-migrate-js></script>
<style>#h5vpQuickPlayer{width:100%;max-width:100%;margin:0 auto}</style>
<meta name=generator content="Elementor 3.25.4; features: additional_custom_breakpoints, e_optimized_control_loading; settings: css_print_method-external, google_font-enabled, font_display-swap">
<style>.e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),.e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) *{background-image:none!important}@media screen and (max-height:1024px){.e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload),.e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload) *{background-image:none!important}}@media screen and (max-height:640px){.e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),.e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) *{background-image:none!important}}</style>
<link rel=icon href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes=32x32>
<link rel=icon href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes=192x192>
<link rel=apple-touch-icon href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
<meta name=msapplication-TileImage content="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
<style id=wp-custom-css>#discription_section,#header_btn{background:linear-gradient(180deg,#0066a4 0,#0063a0 34%,#025c95 66%,#044e82 97%,#044d80 100%)}#cursor-pointer,.goBackBtn a{cursor:pointer}#view-data-btn,.eicon-play:before{color:#fff;line-height:28px;font-weight:600}body:not(.home) #primery_menu{background-color:#e82429!important}#header_btn{transition:.5s}#header_btn:hover{background:linear-gradient(180deg,#025c95 0,#044e82 34%,#044d80 66%,#0063a0 97%,#0066a4 100%)}.search_popup .dialog-close-button i{position:absolute;right:0;top:17px}#footer_icon_list .elementor-widget .elementor-icon-list-icon i{width:36px;border:1px solid;border-radius:100px;padding:8px 7px 7px 8px}.heading_text_building{font-size:158px;line-height:120px;letter-spacing:.02em}.heading_text_innovation{font-size:104px;line-height:120px;letter-spacing:.02em}@media (max-width:1024px){.heading_text_building{font-size:120px;line-height:100px}.heading_text_innovation{font-size:80px;line-height:100px}}@media (max-width:768px){.heading_text_building{font-size:90px;line-height:80px}.heading_text_innovation{font-size:60px;line-height:80px}}@media (max-width:480px){.heading_text_building{font-size:60px;line-height:60px}.heading_text_innovation{font-size:40px;line-height:60px}}.custom_hero_banner::after{content:'';position:absolute;top:0;left:0;right:0;bottom:0;background-color:transparent;background-image:linear-gradient(180deg,#e82429 3.95%,rgba(232,36,41,0) 40%);pointer-events:none;opacity:.75}@media(max-width:1199px){#gallantt_text{display:none}}.spacing{margin-top:120px;margin-bottom:120px}@media (max-width:992px){.spacing{margin-top:90px;margin-bottom:90px}}#business_slider .elementor-element .swiper~.elementor-swiper-button.swiper-button-disabled{border:2px solid #03001B66;border-radius:30px;padding:10px;background:#fff}#business_slider .elementor-element .swiper~.elementor-swiper-button.swiper-button-disabled svg{filter:brightness(0)}#business_slider .elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-prev:hover{color:inherit;border-style:solid}#business_slider .elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-next,.elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-prev{border:2px solid transparent;border-radius:30px;padding:10px;background-color:#b22222}#business_slider .elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-prev{color:inherit;border-style:solid!important}#business_slider .elementor-widget-loop-carousel .elementor-swiper-button.elementor-swiper-button-next svg{filter:brightness(10)}#home_counter_text .elementor-counter-title{display:block;position:absolute;top:calc(50% - 1px);left:50%;z-index:0;transform:translate(-50%,-50%);width:100%;text-align:center;margin:0;background:#fff;opacity:1;white-space:nowrap}#left_line::before{content:"";display:block;height:102px;width:4.5px;position:absolute;left:0;top:39%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%);background:linear-gradient(180deg,#e82429 1%,#be1d21 30%,#801316 70%,#680f11 100%)}@media (min-width:1024px){#stare-of-image{margin-top:81px}#stare-of-image:after{content:"";display:block;height:545px;width:3px;position:absolute;right:0;top:50%;-webkit-transform:translateY(-53%);-ms-transform:translateY(-53%);transform:translateY(-53%);background-color:#e82429}#cmd-box-layout{height:460px;position:relative;left:65px;top:180px;margin-bottom:170px;z-index:1;backdrop-filter:blur(5px)}#discription_section{height:360px;position:relative;right:40px}#video_section{height:450px}#video_wedget{height:500px}#box_hover_animation{background:#f5f5f5;background:linear-gradient(90deg,#f5f5f5 69%,#000 66%)}.box_hover_effect{transition:.8s;position:relative;top:0;right:0;margin-top:0;margin-right:0}#box_hover_animation:hover .box_hover_effect{top:50px;right:25px;margin-top:50px;margin-right:25px}}@media (max-width:768px){.spacing{margin-top:48px;margin-bottom:48px}#video_section,#video_wedget{height:250px}}@media (max-width:576px){.spacing{margin-top:28px;margin-bottom:28px}#video_section,#video_wedget{height:200px}}.dialog-lightbox-close-button .eicon-close:before{content:'';display:inline-block;width:30px;height:30px;vertical-align:middle;-webkit-transition:-webkit-transform .3s,color .3s;-ms-transition:-ms-transform .3s,color .3s;transition:transform .3s,color .3s;-webkit-transform-origin:50% 50%;-ms-transform-origin:50% 50%;transform-origin:50% 50%}.dialog-lightbox-close-button .eicon-close:hover:before{-webkit-transform:rotate(180deg);-ms-transform:rotate(180deg);transform:rotate(180deg)}.eicon-play:before{content:'Play Video';border:1px solid #fffFFF8F;border-radius:30px;font-family:Jost;font-size:18px;padding:10px 24px;transition:.5s;display:flex;justify-content:center;align-items:center}.eicon-play:hover:before{background-color:#000}::-webkit-scrollbar{width:7px;height:30px}::-webkit-scrollbar-thumb{background-color:#0066a4;border-radius:4px;border:3px solid transparent}::-webkit-scrollbar-track{background:0 0}.elementor-field-group .elementor-field-textual:focus{box-shadow:none}.slide img{filter:grayscale(100);opacity:.3;transition:1s}.slide:hover img{filter:grayscale(0);opacity:1}#primery_menu .sub-arrow i{display:none}#primery_menu .elementor-nav-menu .sub-arrow{background-repeat:no-repeat;width:18px;height:18px;position:relative;bottom:-1px;left:7px}#video_section .elementor-custom-embed-image-overlay img{transition:.9s .1s}#video_section:hover .elementor-custom-embed-image-overlay img{filter:grayscale(1)}.current_openings_card .elementor-icon-list-item span:is(.label){color:#03001b}.current_openings_card .elementor-icon-list-item span:is(.label) span{color:#797c7f}.job_landing_banner{background:linear-gradient(180deg,#e82429 1%,#be1d21 30%,#801316 70%,#680f11 100%)}#counters_border_bottom .elementor-counter-number-wrapper:after{content:"";position:absolute;width:65%;height:1px;background-color:#ccc;top:68%}.goBackBtn a{pointer-events:all}.vertical_shake{animation:2s infinite vertical-shaking;transition:1s}@keyframes vertical-shaking{0%,100%{transform:translateY(0)}25%{transform:translateY(45px)}50%{transform:translateY(-15px)}75%{transform:translateY(5px)}}.application_form .elementor-field-type-html{margin-top:20px}.team_section .swiper-slide{clip-path:polygon(0 0,100% 8%,100% 100%,0% 100%)}#foundation .phara,.team_inner .elementor-widget-container{opacity:0}#foundation .phara:hover,.team_inner .elementor-widget-container:hover{opacity:1}.team_inner{width:100%;height:100%;background-size:contain;background-position:bottom center;background-repeat:no-repeat}#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper,.swiper-container)~.elementor-swiper-button-next,#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper,.swiper-container)~.elementor-swiper-button-prev{border:2px solid #03001B66;border-radius:30px;padding:10px;background-color:#fff;transition:.5s}#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper,.swiper-container)~.elementor-swiper-button-next:hover,#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper,.swiper-container)~.elementor-swiper-button-prev:hover{background-color:#b22222;border:2px solid transparent}#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper,.swiper-container)~.elementor-swiper-button-next:hover svg,#team_section .elementor-widget-n-carousel.elementor-element :is(.swiper,.swiper-container)~.elementor-swiper-button-prev:hover svg{filter:invert(1)}#cement_form .eicon-caret-down:before{content:"\e92a";color:transparent}#cement_form .eicon-caret-down{background-repeat:no-repeat;width:18px;height:18px;position:relative;bottom:-1px;left:7px}#cement_form .elementor-field-group{justify-content:center}label[for=form-field-name-0],label[for=form-field-name-1]{font-size:17px;font-weight:600!important;text-align:left}#cement_form .elementor-field-subgroup{gap:30px;margin-bottom:25px}#cement_form .e-form__buttons{margin-top:30px}@media (min-width:1024px){#cmd-box-layout,#discription_section{transition:.9s;position:relative}#cmd_sections_hover:hover #cmd-box-layout{transform:translate(0,-25px)}#cmd_sections_hover:hover #discription_section{transform:translate(0,25px)}.forgin_an{transition:.8s;position:relative;top:0;right:0;margin-top:0;margin-right:0}.box_forgin_an:hover .forgin_an{top:20px;left:20px;margin-top:20px;margin-left:25px}#image_border_left:after{content:"";display:block;height:200%;width:3px;position:absolute;right:0;top:50%;-webkit-transform:translateY(-53%);-ms-transform:translateY(-53%);transform:translateY(-53%);background-color:#e82429}#steel_img_box{width:87%}}#tab_section .elementor-widget-n-tabs .e-n-tabs-heading{background:var(--e-global-color-primary);border-radius:30px}.aioseo-breadcrumb{color:#fff;font-weight:600}.aioseo-breadcrumb a{font-weight:200;color:#fff}.aioseo-breadcrumb-separator{color:#fff}#acco_left_border{border-left:4px solid #000}#acco_left_border svg{position:relative;left:-14px;top:-.99px}@media (min-width:768px){#future_sustainability_image_box::after{content:"";position:absolute;top:0;width:1px;height:361px;background-color:#000;transform:translateX(-50%);right:-9%}}#primery_menu .elementor-nav-menu--dropdown li a{border-radius:12px;margin:3px 0}.rotate-animation{width:59px;height:60px;animation:1.5s infinite rotatePause;margin-right:73px}@keyframes rotatePause{0%{transform:rotate(0)}100%,50%{transform:rotate(90deg)}}@media (max-width:1024px){#primery_menu .elementor-nav-menu .sub-arrow{position:absolute;right:15px;bottom:auto;left:auto}#primery_menu .elementor-nav-menu--dropdown a.elementor-item-active{color:#fff}}.achieve_dot_1{animation:1.5s infinite achieveCardDots;border-radius:100%}@keyframes achieveCardDots{0%,100%{transform:scale(1)}25%{transform:scale(1.5)}50%{transform:scale(1.3)}}#pdf_doc li{width:fit-content;background:#f9f9f9;padding:10px;border-radius:12px}.filter-container{display:flex;gap:20px;justify-content:space-evenly;flex-wrap:wrap}@media(min-width:1199px){#video_section .elementor-wrapper{--video-aspect-ratio:0}.filter-container{gap:150px}}.filter-container select{padding:12px 24px 12px 5px;border:0;border-bottom:1px solid;width:300px;color:#00000066;font-size:17px;font-weight:400;font-family:'Kumbh Sans'}#view-data-btn{background-color:var(--e-global-color-primary);font-family:Jost,Sans-serif;font-size:16px;border-radius:30px;padding:8px 40px;border:0;margin-top:40px}.custom_price_table{width:600px;border-collapse:collapse;overflow-x:scroll;font-size:17px;font-weight:600;text-align:center}#data-table-container{display:flex;justify-content:center}.filter_div{display:flex;flex-direction:column;align-items:center}select:focus{outline:0}.custom_price_table tbody tr td:first-child,.custom_price_table thead tr th:first-child{background-color:#0000000A}.custom_price_table td,.custom_price_table th{padding:20px;vertical-align:middle}.custom_price_table th{border-bottom:1px solid #000;width:50%}.custom_hero_slide span.swiper-pagination-bullet.swiper-pagination-bullet{height:6px;border-radius:50px}.swiper-horizontal>.swiper-pagination-bullets,.swiper-pagination-bullets.swiper-pagination-horizontal,.swiper-pagination-custom,.swiper-pagination-fraction{z-index:10;left:47%;transform:translate(0,-50%)}.stories_card .s_info_card{opacity:0;height:0%;transition:opacity .3s,height .3s;overflow:hidden}.stories_card:hover .s_info_card{opacity:1;height:fit-content;max-height:300px!important}.stories_card .post_img{max-height:367px;height:367px}.stories_card:hover .s_info_card .elementor-widget-container{overflow:hidden;-webkit-line-clamp:6;width:-webkit-fill-available;display:-webkit-box;-webkit-box-orient:vertical}</style>
<script src=assets/careers/wp-emoji-release.min.js.download defer></script>
</head>
<body class="page-template-default page page-id-2559 wp-custom-logo elementor-default elementor-kit-6 elementor-page elementor-page-2559 e--ua-blink e--ua-chrome e--ua-webkit dialog-body dialog-lightbox-body dialog-container dialog-lightbox-container" data-elementor-device-mode=desktop>
<?php require_once ABS_PATH . './components/navbar/header.php'; ?>
<main id=content class="site-main post-2559 page type-page status-publish has-post-thumbnail hentry">
<div class=page-content>
<div data-elementor-type=wp-page data-elementor-id=2559 class="elementor elementor-2559" data-elementor-post-type=page>
<div class="elementor-element elementor-element-15c4703 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id=15c4703 data-element_type=container data-settings={&quot;background_background&quot;:&quot;gradient&quot;}>
<div class=e-con-inner>
<div class="elementor-element elementor-element-b52035c e-con-full e-flex e-con e-child" data-id=b52035c data-element_type=container>
<div class="elementor-element elementor-element-d901e91 elementor-widget elementor-widget-heading" data-id=d901e91 data-element_type=widget data-widget_type=heading.default>
<div class=elementor-widget-container>
<h2 class="elementor-heading-title elementor-size-default">"Empowering Careers, Strengthening Futures"</h2>
</div>
</div>
<div class="elementor-element elementor-element-44ffe98 e-con-full e-flex e-con e-child" data-id=44ffe98 data-element_type=container>
<div class="elementor-element elementor-element-7788cc6 elementor-widget elementor-widget-heading" data-id=7788cc6 data-element_type=widget data-widget_type=heading.default>
<div class=elementor-widget-container>
</div>
</div>
<div class="elementor-element elementor-element-8e6de68 elementor-widget elementor-widget-heading" data-id=8e6de68 data-element_type=widget data-widget_type=heading.default>
</div>
</div>
</div>
<div class="elementor-element elementor-element-8acee68 e-con-full e-flex e-con e-child" data-id=8acee68 data-element_type=container>
<div class="elementor-element elementor-element-6c1bcd1 rotate-animation elementor-hidden-mobile elementor-widget elementor-widget-image" data-id=6c1bcd1 data-element_type=widget data-widget_type=image.default>
<div class=elementor-widget-container>
<img decoding=async width=59 height=60 src=assets/careers/triangle-icon.png class="attachment-large size-large wp-image-5503" alt="">
</div>
</div>
<div class="elementor-element elementor-element-e27c28d elementor-widget elementor-widget-heading" data-id=e27c28d data-element_type=widget data-widget_type=heading.default>
<div class=elementor-widget-container>
<h2 class="elementor-heading-title elementor-size-default">Careers</h2>
</div>
</div>
<div class="elementor-element elementor-element-0f72343 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id=0f72343 data-element_type=widget data-widget_type=divider.default>
<div class=elementor-widget-container>
<div class=elementor-divider>
<span class=elementor-divider-separator>
</span>
</div>
</div>
</div>
<div class="elementor-element elementor-element-81f95d1 elementor-absolute elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id=81f95d1 data-element_type=widget data-settings={&quot;_position&quot;:&quot;absolute&quot;} data-widget_type=divider.default>
<div class=elementor-widget-container>
<div class=elementor-divider>
<span class=elementor-divider-separator>
</span>
</div>
</div>
</div>
<div class="elementor-element elementor-element-2d32a8f elementor-widget elementor-widget-wp-widget-aioseo-breadcrumb-widget" data-id=2d32a8f data-element_type=widget data-widget_type=wp-widget-aioseo-breadcrumb-widget.default>
<div class=elementor-widget-container>
<div class=aioseo-breadcrumbs><span class=aioseo-breadcrumb>
<a href=index.php title=Home>Home</a>
</span><span class=aioseo-breadcrumb-separator>/</span><span class=aioseo-breadcrumb>
Careers
</span></div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-element my-5 elementor-element-fea0ff4 e-flex e-con-boxed e-con e-parent e-lazyloaded" data-id=fea0ff4 data-element_type=container>
<div class='container'>
<?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
<div class="container text-center mt-4">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Thank you for applying with Gallantt Group.</strong><br>
        Your job application has been received successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php endif; ?>
<div class="row">
<div class="col-lg-6 my-auto">
<div class="elementor-element elementor-element-6838c52 elementor-widget elementor-widget-heading" data-id=6838c52 data-element_type=widget data-widget_type=heading.default>
<div class=elementor-widget-container>
<h2 class="elementor-heading-title elementor-size-default mb-3 text-center text-lg-start">JOIN OUR TEAM</h2>
</div>
</div>
<div class="elementor-element elementor-element-ecade54 elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id=ecade54 data-element_type=widget data-widget_type=text-editor.default>
<div class=elementor-widget-container>
<p class="text-justify">At Gallantt Group, we believe that our people are our greatest strength. We are committed to fostering a culture of innovation, dedication, and excellence. Join us and become part of a dynamic team that is shaping the future of India’s infrastructure. Whether you are an experienced professional or a fresh graduate, Gallantt Group offers exciting career opportunities across various sectors, including steel, cement, power generation, real estate, and more. If you are passionate about making a difference and driving progress, we invite you to explore a career with us.</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="elementor-element elementor-element-6838c52 elementor-widget elementor-widget-heading" data-id=6838c52 data-element_type=widget data-widget_type=heading.default>
<div class=elementor-widget-container>
<img src="<?php echo ABS_URL ?>assets/careers/career.jpg" alt=""  class="my-3 img-fluid">
</div>
</div>

</div>
</div>

</div>
</div>
<style>.job-list-section{font-family:"Kumbh Sans",Sans-serif}.job-list-section .nav-pills .nav-item{margin:30px 15px}.job-list-section .nav-pills .nav-item .nav-link.active{background-color:#000;color:#f5f5f5}.job-list-section .nav-pills .nav-item .nav-link{padding:10px 30px;border-radius:25px;background-color:#f5f5f5;color:#000}.job-list-section .card{background-color:#f6f6f6;border:none!important;padding:15px;border-radius:20px;margin:10px 0}.job-list-section .table>:not(caption)>*>*{background-color:transparent}.job-list-section .table tr th span{color:#797c7f}.apply-btn{background-color:#e1251b;font-family:"Kumbh Sans",Sans-serif;font-size:16px;font-weight:400;line-height:16px;fill:#fff;color:#fff;transition-duration:1s;border-radius:50px 50px 50px 50px;padding:18px 61px 18px 61px;border:none!important}</style>
<section class='job-list-section' id="ccc">
<div class=container>
<div class="row justify-content-center">
<div class=col-lg-8>
<ul class="nav nav-pills mb-3 justify-content-start justify-content-lg-center" id=pills-tab role=tablist>
<li class=nav-item role=presentation>
<button class="nav-link active" id=pills-all-tab data-bs-toggle=pill data-bs-target=#pills-all type=button role=tab aria-controls=pills-all aria-selected=true>All</button>
</li>
<?php if(!empty($GujaratJobs)) { ?>
<li class=nav-item role=presentation>
<button class=nav-link id=pills-Gujarat-tab data-bs-toggle=pill data-bs-target=#pills-Gujarat type=button role=tab aria-controls=pills-Gujarat aria-selected=false>Gujarat</button>
</li>
<?php } ?>
<?php if(!empty($UttarPradeshJobs)) { ?>
<li class=nav-item role=presentation>
<button class=nav-link id=pills-Uttar-Pradesh-tab data-bs-toggle=pill data-bs-target=#pills-Uttar-Pradesh type=button role=tab aria-controls=pills-Uttar-Pradesh aria-selected=false>Uttar Pradesh</button>
</li>
<?php } ?>
</ul>
</div>
<div class="col-lg-12">
  <div class="tab-content" id="pills-tabContent">

    <!-- All Jobs Tab -->
    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
      <div class="row">
        <?php foreach ($jobs as $index => $job): ?>
          <div class="col-lg-6 mb-4">
            <div class="card">
              <div class="card-body">
                <h4 class="text-center mb-3"><?php echo htmlspecialchars($job['job_title']); ?></h4>
                <hr>
                <table class="table table-borderless bg-transparent my-3">
                  <tbody>
                    <tr>
                      <th>Department: <span><?php echo htmlspecialchars($job['department']); ?></span></th>
                      <th>Experience: <span><?php echo htmlspecialchars($job['experience']); ?></span></th>
                    </tr>
                    <tr>
                      <th>Job type: <span><?php echo htmlspecialchars($job['job_type']); ?></span></th>
                      <th>Location: <span><?php echo htmlspecialchars($job['location']); ?></span></th>
                    </tr>
                    <tr>
                      <th>No of Vacancy : <span class="ms-2"><b><?php echo htmlspecialchars($job['vacancies']); ?></b></span></th>
                      <th>Posted on: <span><?php echo date("d M Y", strtotime($job['date_posted'])); ?></span></th>
                    </tr>
                  </tbody>
                </table>
                <ul class="d-flex justify-content-between align-items-center list-unstyled mt-3">
                  <li>
                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#descModal_all_<?php echo $index; ?>">Read Description</a>
                  </li>
                  <li>
                    <button class="btn btn-primary btn-sm apply-btn" data-bs-toggle="modal" data-bs-target="#applyModal" data-jobtitle="<?php echo htmlspecialchars($job['job_title']); ?>" data-jobid="<?php echo (int)$job['job_id']; ?>">
                      Apply
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Modal for Description -->
          <div class="modal fade" id="descModal_all_<?php echo $index; ?>" tabindex="-1" aria-labelledby="descModalLabel_all_<?php echo $index; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="descModalLabel_all_<?php echo $index; ?>">Job Description:</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h4><b>Title - <?php echo htmlspecialchars($job['job_title']); ?></b></h4>
                  <?php echo $job['job_description']; ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Gujarat Jobs Tab -->
    <div class="tab-pane fade" id="pills-Gujarat" role="tabpanel" aria-labelledby="pills-Gujarat-tab">
      <div class="row">
        <?php foreach ($GujaratJobs as $index => $job): ?>
          <div class="col-lg-6 mb-4">
            <div class="card">
              <div class="card-body">
                <h4 class="text-center mb-3"><?php echo htmlspecialchars($job['job_title']); ?></h4>
                <hr>
                <table class="table table-borderless bg-transparent my-3">
                  <tbody>
                    <tr>
                      <th>Department: <span><?php echo htmlspecialchars($job['department']); ?></span></th>
                      <th>Experience: <span><?php echo htmlspecialchars($job['experience']); ?></span></th>
                    </tr>
                    <tr>
                      <th>Job type: <span><?php echo htmlspecialchars($job['job_type']); ?></span></th>
                      <th>Location: <span><?php echo htmlspecialchars($job['location']); ?></span></th>
                    </tr>
                    <tr>
                      <th>No of Vacancy : <span class="ms-2"><b><?php echo htmlspecialchars($job['vacancies']); ?></b></span></th>
                      <th>Posted on: <span><?php echo date("d M Y", strtotime($job['date_posted'])); ?></span></th>
                    </tr>
                  </tbody>
                </table>
                <ul class="d-flex justify-content-between align-items-center list-unstyled mt-3">
                  <li>
                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#descModal_gujarat_<?php echo $index; ?>">Read Description</a>
                  </li>
                  <li>
                    <button class="btn btn-primary btn-sm apply-btn" data-bs-toggle="modal" data-bs-target="#applyModal" data-jobtitle="<?php echo htmlspecialchars($job['job_title']); ?>" data-jobid="<?php echo (int)$job['job_id']; ?>">
                      Apply
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="descModal_gujarat_<?php echo $index; ?>" tabindex="-1" aria-labelledby="descModalLabel_gujarat_<?php echo $index; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="descModalLabel_gujarat_<?php echo $index; ?>">Job Description:</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h4><b>Title - <?php echo htmlspecialchars($job['job_title']); ?></b></h4>
                  <?php echo $job['job_description']; ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Uttar Pradesh Jobs Tab -->
    <div class="tab-pane fade" id="pills-Uttar-Pradesh" role="tabpanel" aria-labelledby="pills-Uttar-Pradesh-tab">
      <div class="row">
        <?php foreach ($UttarPradeshJobs as $index => $job): ?>
          <div class="col-lg-6 mb-4">
            <div class="card">
              <div class="card-body">
                <h4 class="text-center mb-3"><?php echo htmlspecialchars($job['job_title']); ?></h4>
                <hr>
                <table class="table table-borderless bg-transparent my-3">
                  <tbody>
                    <tr>
                      <th>Department: <span><?php echo htmlspecialchars($job['department']); ?></span></th>
                      <th>Experience: <span><?php echo htmlspecialchars($job['experience']); ?></span></th>
                    </tr>
                    <tr>
                      <th>Job type: <span><?php echo htmlspecialchars($job['job_type']); ?></span></th>
                      <th>Location: <span><?php echo htmlspecialchars($job['location']); ?></span></th>
                    </tr>
                    <tr>
                      <th>No of Vacancy : <span class="ms-2"><b><?php echo htmlspecialchars($job['vacancies']); ?></b></span></th>
                      <th>Posted on: <span><?php echo date("d M Y", strtotime($job['date_posted'])); ?></span></th>
                    </tr>
                  </tbody>
                </table>
                <ul class="d-flex justify-content-between align-items-center list-unstyled mt-3">
                  <li>
                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#descModal_up_<?php echo $index; ?>">Read Description</a>
                  </li>
                  <li>
                    <button class="btn btn-primary btn-sm apply-btn" data-bs-toggle="modal" data-bs-target="#applyModal" data-jobtitle="<?php echo htmlspecialchars($job['job_title']); ?>" data-jobid="<?php echo (int)$job['job_id']; ?>">
                      Apply
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="descModal_up_<?php echo $index; ?>" tabindex="-1" aria-labelledby="descModalLabel_up_<?php echo $index; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="descModalLabel_up_<?php echo $index; ?>">Job Description:</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h4><b>Title - <?php echo htmlspecialchars($job['job_title']); ?></b></h4>
                  <?php echo $job['job_description']; ?>
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
</section>
<div class="elementor-element elementor-element-4645156 e-flex e-con-boxed e-con e-parent" data-id=4645156 data-element_type=container>
<div class=e-con-inner>
<div class="elementor-element elementor-element-0c94038 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id=0c94038 data-element_type=widget data-widget_type=divider.default>
<div class=elementor-widget-container>
<div class=elementor-divider>
<span class=elementor-divider-separator>
</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="modal fade" id=applyModal tabindex=-1 aria-labelledby=applyModalLabel aria-hidden=true>
<div class="modal-dialog modal-dialog-centered">
<form id=applyForm method=POST enctype=multipart/form-data action="<?php echo ABS_URL ?>action/job-apply-process.php">
<div class=modal-content>
<div class=modal-header>
<h5 class=modal-title>Apply for Job</h5>
<button type=button class=btn-close data-bs-dismiss=modal aria-label=Close></button>
</div>
<div class=modal-body>
<input type=hidden id=jobId name=job_id>
<div class=mb-3>
<label for=jobTitle class=form-label>Job Title</label>
<input class=form-control id=jobTitle name=job_title readonly>
</div>
<div class=mb-3>
<label for=applicantName class=form-label>Your Name</label>
<input class=form-control id=applicantName name=name required>
</div>
<div class=mb-3>
<label for=applicantEmail class=form-label>Your Email</label>
<input type=email class=form-control id=applicantEmail name=email required>
</div>
<div class=mb-3>
<label for=applicantResume class=form-label>Upload Resume</label>
<input type=file class=form-control id=applicantResume name=resume required>
</div>
</div>
<div class=modal-footer>
<button type=submit class="btn btn-success">Submit Application</button>
</div>
</div>
</form>
</div>
</div>
</main>
<div data-elementor-type=footer data-elementor-id=200 class="elementor elementor-200 elementor-location-footer" data-elementor-post-type=elementor_library>
<?php require_once ABS_PATH . 'components/footer/footer.php'; ?>
</div>
<script src=<?php echo ABS_URL ?>js/jquery-3.6.0.min.js></script>
<?php if (isset($_GET['status'])): ?>
<script>
const applicationStatus = <?= json_encode($_GET['status']) ?>;
if (applicationStatus === 'already_applied') {
  alert('You have already applied with this email address.');
} else if (applicationStatus === 'invalid_email') {
  alert('Please enter a valid email address.');
}
</script>
<?php endif; ?>
<script>$(document).ready((function(){const e=["application/pdf","application/msword","application/vnd.openxmlformats-officedocument.wordprocessingml.document"];function a(e,a){$(e).next(".error-text").remove(),a&&$(e).after(`<div class="error-text text-danger mt-1">${a}</div>`)}function t(){let t=!0;const l=$("#applicantName").val().trim(),i=$("#applicantEmail").val().trim(),n=$("#applicantResume")[0];if(l.length<3?(a("#applicantName","Name must be at least 3 characters."),t=!1):a("#applicantName",""),/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(i)?a("#applicantEmail",""):(a("#applicantEmail","Please enter a valid email address."),t=!1),0===n.files.length)a("#applicantResume","Please upload your resume."),t=!1;else{const l=n.files[0],i=l.size/1024/1024;e.includes(l.type)?i>1?(a("#applicantResume","File size must be less than 1MB."),t=!1):a("#applicantResume",""):(a("#applicantResume","Only PDF, DOC, or DOCX files are allowed."),t=!1)}$('#applyForm button[type="submit"]').prop("disabled",!t)}$("#applicantName, #applicantEmail").on("input",t),$("#applicantResume").on("change",t)}))</script>
<script>const lazyloadRunObserver=()=>{const e=document.querySelectorAll(".e-con.e-parent:not(.e-lazyloaded)"),t=new IntersectionObserver((e=>{e.forEach((e=>{if(e.isIntersecting){let o=e.target;o&&o.classList.add("e-lazyloaded"),t.unobserve(e.target)}}))}),{rootMargin:"200px 0px 200px 0px"});e.forEach((e=>{t.observe(e)}))},events=["DOMContentLoaded","elementor/lazyload/observe"];events.forEach((e=>{document.addEventListener(e,lazyloadRunObserver)}))</script>
<link rel=stylesheet id=elementor-post-148-css href="<?= ABS_URL ?>assets/careers/post-148.css" media=all>
<link rel=stylesheet id=e-animation-bounceInUp-css href="<?= ABS_URL ?>assets/careers/bounceInUp.min.css" media=all>
<link rel=stylesheet id=widget-search-form-css href="<?= ABS_URL ?>assets/careers/widget-search-form.min.css" media=all>
<link rel=stylesheet id=e-animation-slideInDown-css href="<?= ABS_URL ?>assets/careers/slideInDown.min.css" media=all>
<link rel=stylesheet id=e-sticky-css href="<?= ABS_URL ?>assets/careers/sticky.min.css" media=all>
<link rel=stylesheet id=e-popup-css href="<?= ABS_URL ?>assets/careers/popup.min.css" media=all>
<script src=assets/careers/jquery.smartmenus.min.js.download id=smartmenus-js></script>
<script src=assets/careers/jquery.sticky.min.js.download id=e-sticky-js></script>
<script src=assets/careers/imagesloaded.min.js.download id=imagesloaded-js></script>
<script src=assets/careers/webpack-pro.runtime.min.js.download id=elementor-pro-webpack-runtime-js></script>
<script src=assets/careers/webpack.runtime.min.js.download id=elementor-webpack-runtime-js></script>
<script src=assets/careers/frontend-modules.min.js.download id=elementor-frontend-modules-js></script>
<script src=assets/careers/hooks.min.js.download id=wp-hooks-js></script>
<script src=assets/careers/i18n.min.js.download id=wp-i18n-js></script>
</body>
<script src=<?php echo ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.js></script>
<script>document.addEventListener("DOMContentLoaded",(function(){const t=document.querySelectorAll(".apply-btn"),e=document.getElementById("jobTitle"),n=document.getElementById("jobId");t.forEach((t=>{t.addEventListener("click",(function(){const t=this.getAttribute("data-jobtitle"),d=this.getAttribute("data-jobid");e.value=t,n.value=d}))}))}))</script>
</html>