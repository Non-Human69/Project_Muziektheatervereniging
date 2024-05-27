<?php


$film_maker_lite_tp_theme_css = '';


//theme color
$film_maker_lite_tp_color_option = get_theme_mod('film_maker_lite_tp_color_option');

if($film_maker_lite_tp_color_option != false){
$film_maker_lite_tp_theme_css .='button[type="submit"], .top-header,.main-navigation .menu > ul > li.highlight,.more-btn a,.box:before,.box:after,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.page-numbers,.prev.page-numbers,.next.page-numbers,span.meta-nav,#theme-sidebar button[type="submit"],#footer button[type="submit"],#comments input[type="submit"],.site-info,.book-tkt-btn a,#slider .carousel-control-prev-icon, #slider .carousel-control-next-icon,#slider .inner_carousel p,.toggle-nav button,.error-404 [type="submit"],.wc-block-cart__submit-container a,.wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link,#latest-release .owl-nav i:hover,#theme-sidebar .wp-block-search .wp-block-search__label:before,#theme-sidebar h3:before, #theme-sidebar h1.wp-block-heading:before, #theme-sidebar h2.wp-block-heading:before, #theme-sidebar h3.wp-block-heading:before,#theme-sidebar h4.wp-block-heading:before, #theme-sidebar h5.wp-block-heading:before, #theme-sidebar h6.wp-block-heading:before{';
$film_maker_lite_tp_theme_css .='background: '.esc_attr($film_maker_lite_tp_color_option).';';
$film_maker_lite_tp_theme_css .='}';
}
if($film_maker_lite_tp_color_option != false){
$film_maker_lite_tp_theme_css .='a,#theme-sidebar .textwidget a,#footer .textwidget a,.comment-body a,.entry-content a,.entry-summary a,.page-template-front-page .media-links a:hover,.topbar-home i.fas.fa-phone-volume,#theme-sidebar h3, a, a:hover,#theme-sidebar .textwidget a, #footer .textwidget a, .comment-body a, .entry-content a, .entry-summary a,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a,#theme-sidebar h3,#theme-sidebar a:hover,h1, h2, h3, h4, h5, h6,h2.woocommerce-loop-product__title, .woocommerce div.product .product_title,.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .main-navigation a:hover,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a,.wp-block-search .wp-block-search__label,.box-info i,.readmore-btn a,a.added_to_cart.wc-forward,.nav ul li a:hover,a:hover,#theme-sidebar a:hover,.media-links i:hover,#theme-sidebar .widget_tag_cloud a:hover, #footer li a:hover, #theme-sidebar li a:hover,#footer .tagcloud a:hover,#footer p.wp-block-tag-cloud a:hover ,#theme-sidebar h2.wp-block-heading, #theme-sidebar h3, #theme-sidebar h1.wp-block-heading, #theme-sidebar .wp-block-search .wp-block-search__label, #theme-sidebar h2.wp-block-heading, #theme-sidebar h3.wp-block-heading, #theme-sidebar h4.wp-block-heading, #theme-sidebar h5.wp-block-heading, #theme-sidebar h6.wp-block-heading {';
$film_maker_lite_tp_theme_css .='color: '.esc_attr($film_maker_lite_tp_color_option).';';
$film_maker_lite_tp_theme_css .='}';
}
if($film_maker_lite_tp_color_option != false){
$film_maker_lite_tp_theme_css .='.readmore-btn a,#footer .tagcloud a:hover,#theme-sidebar .widget_tag_cloud a:hover,#footer p.wp-block-tag-cloud a:hover,#theme-sidebar .tagcloud a:hover  {';
$film_maker_lite_tp_theme_css .='border-color: '.esc_attr($film_maker_lite_tp_color_option).';';
$film_maker_lite_tp_theme_css .='}';
}
if($film_maker_lite_tp_color_option != false){
$film_maker_lite_tp_theme_css .='.page-box,#theme-sidebar section {';
    $film_maker_lite_tp_theme_css .='border-left-color: '.esc_attr($film_maker_lite_tp_color_option).';';
$film_maker_lite_tp_theme_css .='}';
}
if($film_maker_lite_tp_color_option != false){
$film_maker_lite_tp_theme_css .='.page-box,#theme-sidebar section {';
    $film_maker_lite_tp_theme_css .='border-bottom-color: '.esc_attr($film_maker_lite_tp_color_option).';';
$film_maker_lite_tp_theme_css .='}';
}


//preloader

$film_maker_lite_tp_preloader_color1_option = get_theme_mod('film_maker_lite_tp_preloader_color1_option');
$film_maker_lite_tp_preloader_color2_option = get_theme_mod('film_maker_lite_tp_preloader_color2_option');
$film_maker_lite_tp_preloader_bg_color_option = get_theme_mod('film_maker_lite_tp_preloader_bg_color_option');

if($film_maker_lite_tp_preloader_color1_option != false){
$film_maker_lite_tp_theme_css .='.center1{';
	$film_maker_lite_tp_theme_css .='border-color: '.esc_attr($film_maker_lite_tp_preloader_color1_option).' !important;';
$film_maker_lite_tp_theme_css .='}';
}
if($film_maker_lite_tp_preloader_color1_option != false){
$film_maker_lite_tp_theme_css .='.center1 .ring::before{';
	$film_maker_lite_tp_theme_css .='background: '.esc_attr($film_maker_lite_tp_preloader_color1_option).' !important;';
$film_maker_lite_tp_theme_css .='}';
}
if($film_maker_lite_tp_preloader_color2_option != false){
$film_maker_lite_tp_theme_css .='.center2{';
	$film_maker_lite_tp_theme_css .='border-color: '.esc_attr($film_maker_lite_tp_preloader_color2_option).' !important;';
$film_maker_lite_tp_theme_css .='}';
}
if($film_maker_lite_tp_preloader_color2_option != false){
$film_maker_lite_tp_theme_css .='.center2 .ring::before{';
	$film_maker_lite_tp_theme_css .='background: '.esc_attr($film_maker_lite_tp_preloader_color2_option).' !important;';
$film_maker_lite_tp_theme_css .='}';
}
if($film_maker_lite_tp_preloader_bg_color_option != false){
$film_maker_lite_tp_theme_css .='.loader{';
	$film_maker_lite_tp_theme_css .='background: '.esc_attr($film_maker_lite_tp_preloader_bg_color_option).';';
$film_maker_lite_tp_theme_css .='}';
}

// footer-bg-color
$film_maker_lite_tp_footer_bg_color_option = get_theme_mod('film_maker_lite_tp_footer_bg_color_option');

if($film_maker_lite_tp_footer_bg_color_option != false){
$film_maker_lite_tp_theme_css .='#footer{';
	$film_maker_lite_tp_theme_css .='background: '.esc_attr($film_maker_lite_tp_footer_bg_color_option).' !important;';
$film_maker_lite_tp_theme_css .='}';
}

//footer image
$film_maker_lite_footer_widget_image = get_theme_mod('film_maker_lite_footer_widget_image');
if($film_maker_lite_footer_widget_image != false){
$film_maker_lite_tp_theme_css .='#footer{';
	$film_maker_lite_tp_theme_css .='background: url('.esc_attr($film_maker_lite_footer_widget_image).');';
$film_maker_lite_tp_theme_css .='}';
}

//======================= slider Content layout ===================== //

$film_maker_lite_slider_content_layout = get_theme_mod('film_maker_lite_slider_content_layout', 'LEFT-ALIGN'); 
$film_maker_lite_tp_theme_css .= '#slider .carousel-caption, #slider .inner_carousel p{';
switch ($film_maker_lite_slider_content_layout) {
    case 'LEFT-ALIGN':
        $film_maker_lite_tp_theme_css .= 'text-align:left; right: 50%; left: 15%';
        break;
    case 'CENTER-ALIGN':
        $film_maker_lite_tp_theme_css .= 'text-align:center; left: 25%; right: 25%';
        break;
    case 'RIGHT-ALIGN':
        $film_maker_lite_tp_theme_css .= 'text-align:right; left: 50%; right: 15%';
        break;
    default:
        $film_maker_lite_tp_theme_css .= 'text-align:left; right: 50%; left: 15%';
        break;
}
$film_maker_lite_tp_theme_css .= '}';


//Font Weight
$film_maker_lite_menu_font_weight = get_theme_mod( 'film_maker_lite_menu_font_weight','600');
if($film_maker_lite_menu_font_weight == '100'){
$film_maker_lite_tp_theme_css .='.main-navigation a{';
    $film_maker_lite_tp_theme_css .='font-weight: 100;';
$film_maker_lite_tp_theme_css .='}';
}else if($film_maker_lite_menu_font_weight == '200'){
$film_maker_lite_tp_theme_css .='.main-navigation a{';
    $film_maker_lite_tp_theme_css .='font-weight: 200;';
$film_maker_lite_tp_theme_css .='}';
}else if($film_maker_lite_menu_font_weight == '300'){
$film_maker_lite_tp_theme_css .='.main-navigation a{';
    $film_maker_lite_tp_theme_css .='font-weight: 300;';
$film_maker_lite_tp_theme_css .='}';
}else if($film_maker_lite_menu_font_weight == '400'){
$film_maker_lite_tp_theme_css .='.main-navigation a{';
    $film_maker_lite_tp_theme_css .='font-weight: 400;';
$film_maker_lite_tp_theme_css .='}';
}else if($film_maker_lite_menu_font_weight == '500'){
$film_maker_lite_tp_theme_css .='.main-navigation a{';
    $film_maker_lite_tp_theme_css .='font-weight: 500;';
$film_maker_lite_tp_theme_css .='}';
}else if($film_maker_lite_menu_font_weight == '600'){
$film_maker_lite_tp_theme_css .='.main-navigation a{';
    $film_maker_lite_tp_theme_css .='font-weight: 600;';
$film_maker_lite_tp_theme_css .='}';
}else if($film_maker_lite_menu_font_weight == '700'){
$film_maker_lite_tp_theme_css .='.main-navigation a{';
    $film_maker_lite_tp_theme_css .='font-weight: 700;';
$film_maker_lite_tp_theme_css .='}';
}else if($film_maker_lite_menu_font_weight == '800'){
$film_maker_lite_tp_theme_css .='.main-navigation a{';
    $film_maker_lite_tp_theme_css .='font-weight: 800;';
$film_maker_lite_tp_theme_css .='}';
}else if($film_maker_lite_menu_font_weight == '900'){
$film_maker_lite_tp_theme_css .='.main-navigation a{';
    $film_maker_lite_tp_theme_css .='font-weight: 900;';
$film_maker_lite_tp_theme_css .='}';
}