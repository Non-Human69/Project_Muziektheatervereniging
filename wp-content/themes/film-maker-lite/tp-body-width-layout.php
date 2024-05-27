<?php

	$film_maker_lite_tp_theme_css = "";

//body-layout
$film_maker_lite_theme_lay = get_theme_mod( 'film_maker_lite_tp_body_layout_settings','Full');
if($film_maker_lite_theme_lay == 'Container'){
$film_maker_lite_tp_theme_css .='body{';
	$film_maker_lite_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$film_maker_lite_tp_theme_css .='}';
$film_maker_lite_tp_theme_css .='.page-template-front-page .menubar{';
	$film_maker_lite_tp_theme_css .='position: static;';
$film_maker_lite_tp_theme_css .='}';
$film_maker_lite_tp_theme_css .='@media screen and (max-width:575px){';
		$film_maker_lite_tp_theme_css .='body{';
			$film_maker_lite_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left: 0px';
		$film_maker_lite_tp_theme_css .='} }';
$film_maker_lite_tp_theme_css .='.scrolled{';
	$film_maker_lite_tp_theme_css .='width: auto; left:0; right:0;';
$film_maker_lite_tp_theme_css .='}';
}else if($film_maker_lite_theme_lay == 'Container Fluid'){
$film_maker_lite_tp_theme_css .='body{';
	$film_maker_lite_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$film_maker_lite_tp_theme_css .='}';
$film_maker_lite_tp_theme_css .='.page-template-front-page .menubar{';
	$film_maker_lite_tp_theme_css .='width: 99%';
$film_maker_lite_tp_theme_css .='}';
$film_maker_lite_tp_theme_css .='@media screen and (max-width:575px){';
		$film_maker_lite_tp_theme_css .='body{';
			$film_maker_lite_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
		$film_maker_lite_tp_theme_css .='} }';
$film_maker_lite_tp_theme_css .='.scrolled{';
	$film_maker_lite_tp_theme_css .='width: auto; left:0; right:0;';
$film_maker_lite_tp_theme_css .='}';
}else if($film_maker_lite_theme_lay == 'Full'){
$film_maker_lite_tp_theme_css .='body{';
	$film_maker_lite_tp_theme_css .='max-width: 100%;';
$film_maker_lite_tp_theme_css .='}';
}

//scrol-top
$film_maker_lite_scroll_position = get_theme_mod( 'film_maker_lite_scroll_top_position','Right');
if($film_maker_lite_scroll_position == 'Right'){
$film_maker_lite_tp_theme_css .='#return-to-top{';
    $film_maker_lite_tp_theme_css .='right: 20px;';
$film_maker_lite_tp_theme_css .='}';
}else if($film_maker_lite_scroll_position == 'Left'){
$film_maker_lite_tp_theme_css .='#return-to-top{';
    $film_maker_lite_tp_theme_css .='left: 20px;';
$film_maker_lite_tp_theme_css .='}';
}else if($film_maker_lite_scroll_position == 'Center'){
$film_maker_lite_tp_theme_css .='#return-to-top{';
    $film_maker_lite_tp_theme_css .='right: 50%;left: 50%;';
$film_maker_lite_tp_theme_css .='}';
}

//Social icon Font size
$film_maker_lite_social_icon_fontsize = get_theme_mod('film_maker_lite_social_icon_fontsize');
	$film_maker_lite_tp_theme_css .='.media-links a i{';
$film_maker_lite_tp_theme_css .='font-size: '.esc_attr($film_maker_lite_social_icon_fontsize).'px;';
$film_maker_lite_tp_theme_css .='}';

// site title font size option
$film_maker_lite_site_title_font_size = get_theme_mod('film_maker_lite_site_title_font_size', 25);{
$film_maker_lite_tp_theme_css .='.logo h1 , .logo p a{';
	$film_maker_lite_tp_theme_css .='font-size: '.esc_attr($film_maker_lite_site_title_font_size).'px;';
$film_maker_lite_tp_theme_css .='}';
}

//site tagline font size option
$film_maker_lite_site_tagline_font_size = get_theme_mod('film_maker_lite_site_tagline_font_size', 15);{
$film_maker_lite_tp_theme_css .='.logo p{';
	$film_maker_lite_tp_theme_css .='font-size: '.esc_attr($film_maker_lite_site_tagline_font_size).'px;';
$film_maker_lite_tp_theme_css .='}';
}

// related post
$film_maker_lite_related_post_mob = get_theme_mod('film_maker_lite_related_post_mob', true);
$film_maker_lite_related_post = get_theme_mod('film_maker_lite_remove_related_post', true);
$film_maker_lite_tp_theme_css .= '.related-post-block {';
if ($film_maker_lite_related_post == false) {
    $film_maker_lite_tp_theme_css .= 'display: none;';
}
$film_maker_lite_tp_theme_css .= '}';
$film_maker_lite_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($film_maker_lite_related_post == false || $film_maker_lite_related_post_mob == false) {
    $film_maker_lite_tp_theme_css .= '.related-post-block { display: none; }';
}
$film_maker_lite_tp_theme_css .= '}';

// slider btn
$film_maker_lite_slider_buttom_mob = get_theme_mod('film_maker_lite_slider_buttom_mob', true);
$film_maker_lite_slider_button = get_theme_mod('film_maker_lite_slider_button', true);
$film_maker_lite_tp_theme_css .= '#slider .more-btn {';
if ($film_maker_lite_slider_button == false) {
    $film_maker_lite_tp_theme_css .= 'display: none;';
}
$film_maker_lite_tp_theme_css .= '}';
$film_maker_lite_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($film_maker_lite_slider_button == false || $film_maker_lite_slider_buttom_mob == false) {
    $film_maker_lite_tp_theme_css .= '#slider .more-btn { display: none; }';
}
$film_maker_lite_tp_theme_css .= '}';

//return to header mobile				
$film_maker_lite_return_to_header_mob = get_theme_mod('film_maker_lite_return_to_header_mob', true);
$film_maker_lite_return_to_header = get_theme_mod('film_maker_lite_return_to_header', true);
$film_maker_lite_tp_theme_css .= '.return-to-header{';
if ($film_maker_lite_return_to_header == false) {
    $film_maker_lite_tp_theme_css .= 'display: none;';
}
$film_maker_lite_tp_theme_css .= '}';
$film_maker_lite_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($film_maker_lite_return_to_header == false || $film_maker_lite_return_to_header_mob == false) {
    $film_maker_lite_tp_theme_css .= '.return-to-header{ display: none; }';
}
$film_maker_lite_tp_theme_css .= '}';

//footer image
$film_maker_lite_footer_widget_image = get_theme_mod('film_maker_lite_footer_widget_image');
if($film_maker_lite_footer_widget_image != false){
$film_maker_lite_tp_theme_css .='#footer{';
	$film_maker_lite_tp_theme_css .='background: url('.esc_attr($film_maker_lite_footer_widget_image).');';
$film_maker_lite_tp_theme_css .='}';
}

// related product
$film_maker_lite_related_product = get_theme_mod('film_maker_lite_related_product',true);
if($film_maker_lite_related_product == false){
$film_maker_lite_tp_theme_css .='.related.products{';
	$film_maker_lite_tp_theme_css .='display: none;';
$film_maker_lite_tp_theme_css .='}';
}

//menu font size
$film_maker_lite_menu_font_size = get_theme_mod('film_maker_lite_menu_font_size', 12);{
$film_maker_lite_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after,.main-navigation li.menu-item-has-children:after{';
	$film_maker_lite_tp_theme_css .='font-size: '.esc_attr($film_maker_lite_menu_font_size).'px;';
$film_maker_lite_tp_theme_css .='}';
}

// menu text tranform
$film_maker_lite_menu_text_tranform = get_theme_mod( 'film_maker_lite_menu_text_tranform','Uppercase');
if($film_maker_lite_menu_text_tranform == 'Uppercase'){
$film_maker_lite_tp_theme_css .='.main-navigation a {';
	$film_maker_lite_tp_theme_css .='text-transform: uppercase;';
$film_maker_lite_tp_theme_css .='}';
}else if($film_maker_lite_menu_text_tranform == 'Lowercase'){
$film_maker_lite_tp_theme_css .='.main-navigation a {';
	$film_maker_lite_tp_theme_css .='text-transform: lowercase;';
$film_maker_lite_tp_theme_css .='}';
}
else if($film_maker_lite_menu_text_tranform == 'Caplitaize'){
$film_maker_lite_tp_theme_css .='.main-navigation a {';
	$film_maker_lite_tp_theme_css .='text-transform: capitalize;';
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

//sale position
$film_maker_lite_scroll_position = get_theme_mod( 'film_maker_lite_sale_tag_position','right');
if($film_maker_lite_scroll_position == 'right'){
$film_maker_lite_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $film_maker_lite_tp_theme_css .='right: 25px !important;';
$film_maker_lite_tp_theme_css .='}';
}else if($film_maker_lite_scroll_position == 'left'){
$film_maker_lite_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $film_maker_lite_tp_theme_css .='left: 25px !important; right: auto !important;';
$film_maker_lite_tp_theme_css .='}';
}

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