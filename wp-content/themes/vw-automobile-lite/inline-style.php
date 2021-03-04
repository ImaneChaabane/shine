<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_automobile_lite_first_color = get_theme_mod('vw_automobile_lite_first_color');

	$vw_automobile_lite_custom_css = '';

	if($vw_automobile_lite_first_color != false){
		$vw_automobile_lite_custom_css .='#comments a.comment-reply-link:hover,.sidebar ul li::before,.yearwrap,.date-monthwrap,.logowrapper, .search-box i, .slider .more-btn a, .footer-2, .scrollup i, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce span.onsale, .hvr-sweep-to-right:before, .sidebar .custom-social-icons i, .footer .custom-social-icons i:hover, .sidebar .tagcloud a:hover, .footer .tagcloud a:hover, .entry-audio audio, .pagination span, .pagination a, a.button, .sidebar .custom-contact-us input[type="submit"], .footer a.custom_read_more:hover, #comments a.comment-reply-link, .widget .woocommerce-product-search button[type="submit"], .footer input[type="submit"], .toggle-nav button, .nav-previous a:hover, .nav-next a:hover, .woocommerce nav.woocommerce-pagination ul li a{';
			$vw_automobile_lite_custom_css .='background-color: '.esc_attr($vw_automobile_lite_first_color).';';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$vw_automobile_lite_custom_css .='.search-submit, #comments input[type="submit"].submit{';
			$vw_automobile_lite_custom_css .='background-color: '.esc_attr($vw_automobile_lite_first_color).'!important;';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$vw_automobile_lite_custom_css .='a, span.email i, span.timings i, span.call i, .sidebar .widget h3, .post-main-box h2, .blogbutton-small, h2.single-post-title, .sidebar .custom-social-icons i:hover, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .footer a.custom_read_more, .sidebar a.custom_read_more, h1.single-post-title{';
			$vw_automobile_lite_custom_css .='color: '.esc_attr($vw_automobile_lite_first_color).';';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$vw_automobile_lite_custom_css .='.slider .more-btn a, .blogbutton-small, .footer a.custom_read_more, .sidebar a.custom_read_more, .footer input[type="submit"]{';
			$vw_automobile_lite_custom_css .='border-color: '.esc_attr($vw_automobile_lite_first_color).';';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$vw_automobile_lite_custom_css .='.search-submit, .blogbutton-small{';
			$vw_automobile_lite_custom_css .='border-color: '.esc_attr($vw_automobile_lite_first_color).'!important;';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$vw_automobile_lite_custom_css .='.main-navigation ul ul{';
			$vw_automobile_lite_custom_css .='border-top-color: '.esc_attr($vw_automobile_lite_first_color).';';
		$vw_automobile_lite_custom_css .='}';
	}
	if($vw_automobile_lite_first_color != false){
		$vw_automobile_lite_custom_css .='.footer h3, .main-navigation ul ul{';
			$vw_automobile_lite_custom_css .='border-bottom-color: '.esc_attr($vw_automobile_lite_first_color).';';
		$vw_automobile_lite_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_width_option','Full Width');
    if($vw_automobile_lite_theme_lay == 'Boxed'){
		$vw_automobile_lite_custom_css .='body{';
			$vw_automobile_lite_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.logowrapper{';
			$vw_automobile_lite_custom_css .='background: rgba(0, 0, 0, 0) linear-gradient(-70deg, transparent 13%, #ff5400 0%) repeat scroll 0 0; position: relative; left: -1em; transform: none;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='#header .logo{';
			$vw_automobile_lite_custom_css .='padding: 8% 0; text-align: center; transform: skew(-20deg);';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.menubox{';
			$vw_automobile_lite_custom_css .='background: rgba(0, 0, 0, 0) linear-gradient(115deg, transparent 6%, #212121 0%) repeat scroll 0 0';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_theme_lay == 'Wide Width'){
		$vw_automobile_lite_custom_css .='body{';
			$vw_automobile_lite_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.logowrapper{';
			$vw_automobile_lite_custom_css .='background: rgba(0, 0, 0, 0) linear-gradient(-68deg, transparent 13%, #ff5400 0%) repeat scroll 0 0; position: relative; left: -1em; transform: none;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='#header .logo{';
			$vw_automobile_lite_custom_css .='padding: 8% 0; text-align: center; transform: skew(-10deg);';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.menubox{';
			$vw_automobile_lite_custom_css .='background: rgba(0, 0, 0, 0) linear-gradient(115deg, transparent 6%, #212121 0%) repeat scroll 0 0';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_theme_lay == 'Full Width'){
		$vw_automobile_lite_custom_css .='body{';
			$vw_automobile_lite_custom_css .='max-width: 100%;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_slider_opacity_color','0.5');
	if($vw_automobile_lite_theme_lay == '0'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.1'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.1';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.2'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.2';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.3'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.3';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.4'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.4';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.5'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.5';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.6'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.6';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.7'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.7';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.8'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.8';
		$vw_automobile_lite_custom_css .='}';
		}else if($vw_automobile_lite_theme_lay == '0.9'){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='opacity:0.9';
		$vw_automobile_lite_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_slider_content_option','Center');
    if($vw_automobile_lite_theme_lay == 'Left'){
		$vw_automobile_lite_custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h1{';
			$vw_automobile_lite_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_theme_lay == 'Center'){
		$vw_automobile_lite_custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h1{';
			$vw_automobile_lite_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_theme_lay == 'Right'){
		$vw_automobile_lite_custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h1{';
			$vw_automobile_lite_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_automobile_lite_slider_height = get_theme_mod('vw_automobile_lite_slider_height');
	if($vw_automobile_lite_slider_height != false){
		$vw_automobile_lite_custom_css .='.slider img{';
			$vw_automobile_lite_custom_css .='height: '.esc_attr($vw_automobile_lite_slider_height).';';
		$vw_automobile_lite_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_automobile_lite_theme_lay = get_theme_mod( 'vw_automobile_lite_blog_layout_option','Default');
    if($vw_automobile_lite_theme_lay == 'Default'){
		$vw_automobile_lite_custom_css .='.post-main-box{';
			$vw_automobile_lite_custom_css .='';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.post-main-box h2{';
			$vw_automobile_lite_custom_css .='padding:0;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.new-text p{';
			$vw_automobile_lite_custom_css .='margin-top:10px;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.blogbutton-small{';
			$vw_automobile_lite_custom_css .='margin: 0; display: inline-block;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_theme_lay == 'Center'){
		$vw_automobile_lite_custom_css .='.post-main-box, .post-main-box h2, .new-text p, .metabox, .content-bttn{';
			$vw_automobile_lite_custom_css .='text-align:center;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.new-text p{';
			$vw_automobile_lite_custom_css .='margin-top:0;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.metabox{';
			$vw_automobile_lite_custom_css .='background: #eeeeee; padding: 10px; margin-bottom: 15px;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.blogbutton-small{';
			$vw_automobile_lite_custom_css .='margin: 0; display: inline-block;';
		$vw_automobile_lite_custom_css .='}';
	}else if($vw_automobile_lite_theme_lay == 'Left'){
		$vw_automobile_lite_custom_css .='.post-main-box, .post-main-box h2, .new-text p, .content-bttn{';
			$vw_automobile_lite_custom_css .='text-align:Left;';
		$vw_automobile_lite_custom_css .='}';
		$vw_automobile_lite_custom_css .='.metabox{';
			$vw_automobile_lite_custom_css .='background: #eeeeee; padding: 10px; margin-bottom: 15px;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_automobile_lite_stickyheader = get_theme_mod( 'vw_automobile_lite_resp_slider_hide_show',false);
    if($vw_automobile_lite_stickyheader == true){
    	$vw_automobile_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_automobile_lite_custom_css .='.slider{';
			$vw_automobile_lite_custom_css .='display:block;';
		$vw_automobile_lite_custom_css .='} }';
	}else if($vw_automobile_lite_stickyheader == false){
		$vw_automobile_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_automobile_lite_custom_css .='.slider{';
			$vw_automobile_lite_custom_css .='display:none;';
		$vw_automobile_lite_custom_css .='} }';
	}

	$vw_automobile_lite_metabox = get_theme_mod( 'vw_automobile_lite_metabox_hide_show',true);
    if($vw_automobile_lite_metabox == true){
    	$vw_automobile_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_automobile_lite_custom_css .='.metabox, .datebox{';
			$vw_automobile_lite_custom_css .='display:block;';
		$vw_automobile_lite_custom_css .='} }';
	}else if($vw_automobile_lite_metabox == false){
		$vw_automobile_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_automobile_lite_custom_css .='.metabox, .datebox{';
			$vw_automobile_lite_custom_css .='display:none;';
		$vw_automobile_lite_custom_css .='} }';
	}

	$vw_automobile_lite_sidebar = get_theme_mod( 'vw_automobile_lite_sidebar_hide_show',true);
    if($vw_automobile_lite_sidebar == true){
    	$vw_automobile_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_automobile_lite_custom_css .='.sidebar{';
			$vw_automobile_lite_custom_css .='display:block;';
		$vw_automobile_lite_custom_css .='} }';
	}else if($vw_automobile_lite_sidebar == false){
		$vw_automobile_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_automobile_lite_custom_css .='.sidebar{';
			$vw_automobile_lite_custom_css .='display:none;';
		$vw_automobile_lite_custom_css .='} }';
	}

	$vw_automobile_lite_resp_scroll_top = get_theme_mod( 'vw_automobile_lite_resp_scroll_top_hide_show',true);
    if($vw_automobile_lite_resp_scroll_top == true){
    	$vw_automobile_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='display:block;';
		$vw_automobile_lite_custom_css .='} }';
	}else if($vw_automobile_lite_resp_scroll_top == false){
		$vw_automobile_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='display:none !important;';
		$vw_automobile_lite_custom_css .='} }';
	}

	/*---------------- Button Settings ------------------*/

	$vw_automobile_lite_button_padding_top_bottom = get_theme_mod('vw_automobile_lite_button_padding_top_bottom');
	$vw_automobile_lite_button_padding_left_right = get_theme_mod('vw_automobile_lite_button_padding_left_right');
	if($vw_automobile_lite_button_padding_top_bottom != false || $vw_automobile_lite_button_padding_left_right != false){
		$vw_automobile_lite_custom_css .='.blogbutton-small, .slider .more-btn a{';
			$vw_automobile_lite_custom_css .='padding-top: '.esc_attr($vw_automobile_lite_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_automobile_lite_button_padding_top_bottom).';padding-left: '.esc_attr($vw_automobile_lite_button_padding_left_right).';padding-right: '.esc_attr($vw_automobile_lite_button_padding_left_right).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_button_border_radius = get_theme_mod('vw_automobile_lite_button_border_radius');
	if($vw_automobile_lite_button_border_radius != false){
		$vw_automobile_lite_custom_css .='.blogbutton-small, .slider .more-btn a, .hvr-sweep-to-right:before, .hvr-sweep-to-right:hover{';
			$vw_automobile_lite_custom_css .='border-radius: '.esc_attr($vw_automobile_lite_button_border_radius).'px;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_automobile_lite_single_blog_post_navigation_show_hide = get_theme_mod('vw_automobile_lite_single_blog_post_navigation_show_hide',true);
	if($vw_automobile_lite_single_blog_post_navigation_show_hide != true){
		$vw_automobile_lite_custom_css .='.post-navigation{';
			$vw_automobile_lite_custom_css .='display: none;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_automobile_lite_copyright_alingment = get_theme_mod('vw_automobile_lite_copyright_alingment');
	if($vw_automobile_lite_copyright_alingment != false){
		$vw_automobile_lite_custom_css .='.footer-2 p{';
			$vw_automobile_lite_custom_css .='text-align: '.esc_attr($vw_automobile_lite_copyright_alingment).';';
		$vw_automobile_lite_custom_css .='}';
	}
	$vw_automobile_lite_copyright_padding_top_bottom = get_theme_mod('vw_automobile_lite_copyright_padding_top_bottom');
	if($vw_automobile_lite_copyright_padding_top_bottom != false){
		$vw_automobile_lite_custom_css .='.footer-2{';
			$vw_automobile_lite_custom_css .='padding-top: '.esc_attr($vw_automobile_lite_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_automobile_lite_copyright_padding_top_bottom).';';
		$vw_automobile_lite_custom_css .='}';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_automobile_lite_topbar_padding_top_bottom = get_theme_mod('vw_automobile_lite_topbar_padding_top_bottom');
	if($vw_automobile_lite_topbar_padding_top_bottom != false){
		$vw_automobile_lite_custom_css .='.con_details{';
			$vw_automobile_lite_custom_css .='padding-top: '.esc_attr($vw_automobile_lite_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_automobile_lite_topbar_padding_top_bottom).';';
		$vw_automobile_lite_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_automobile_lite_search_padding_top_bottom = get_theme_mod('vw_automobile_lite_search_padding_top_bottom');
	$vw_automobile_lite_search_padding_left_right = get_theme_mod('vw_automobile_lite_search_padding_left_right');
	$vw_automobile_lite_search_font_size = get_theme_mod('vw_automobile_lite_search_font_size');
	$vw_automobile_lite_search_border_radius = get_theme_mod('vw_automobile_lite_search_border_radius');
	if($vw_automobile_lite_search_padding_top_bottom != false || $vw_automobile_lite_search_padding_left_right != false || $vw_automobile_lite_search_font_size != false || $vw_automobile_lite_search_border_radius != false){
		$vw_automobile_lite_custom_css .='.search-box i{';
			$vw_automobile_lite_custom_css .='padding-top: '.esc_attr($vw_automobile_lite_search_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_automobile_lite_search_padding_top_bottom).';padding-left: '.esc_attr($vw_automobile_lite_search_padding_left_right).';padding-right: '.esc_attr($vw_automobile_lite_search_padding_left_right).';font-size: '.esc_attr($vw_automobile_lite_search_font_size).';border-radius: '.esc_attr($vw_automobile_lite_search_border_radius).'px;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_automobile_lite_scroll_to_top_font_size = get_theme_mod('vw_automobile_lite_scroll_to_top_font_size');
	if($vw_automobile_lite_scroll_to_top_font_size != false){
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='font-size: '.esc_attr($vw_automobile_lite_scroll_to_top_font_size).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_scroll_to_top_padding = get_theme_mod('vw_automobile_lite_scroll_to_top_padding');
	$vw_automobile_lite_scroll_to_top_padding = get_theme_mod('vw_automobile_lite_scroll_to_top_padding');
	if($vw_automobile_lite_scroll_to_top_padding != false){
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='padding-top: '.esc_attr($vw_automobile_lite_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_automobile_lite_scroll_to_top_padding).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_scroll_to_top_width = get_theme_mod('vw_automobile_lite_scroll_to_top_width');
	if($vw_automobile_lite_scroll_to_top_width != false){
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='width: '.esc_attr($vw_automobile_lite_scroll_to_top_width).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_scroll_to_top_height = get_theme_mod('vw_automobile_lite_scroll_to_top_height');
	if($vw_automobile_lite_scroll_to_top_height != false){
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='height: '.esc_attr($vw_automobile_lite_scroll_to_top_height).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_scroll_to_top_border_radius = get_theme_mod('vw_automobile_lite_scroll_to_top_border_radius');
	if($vw_automobile_lite_scroll_to_top_border_radius != false){
		$vw_automobile_lite_custom_css .='.scrollup i{';
			$vw_automobile_lite_custom_css .='border-radius: '.esc_attr($vw_automobile_lite_scroll_to_top_border_radius).'px;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_automobile_lite_social_icon_font_size = get_theme_mod('vw_automobile_lite_social_icon_font_size');
	if($vw_automobile_lite_social_icon_font_size != false){
		$vw_automobile_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_automobile_lite_custom_css .='font-size: '.esc_attr($vw_automobile_lite_social_icon_font_size).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_social_icon_padding = get_theme_mod('vw_automobile_lite_social_icon_padding');
	if($vw_automobile_lite_social_icon_padding != false){
		$vw_automobile_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_automobile_lite_custom_css .='padding: '.esc_attr($vw_automobile_lite_social_icon_padding).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_social_icon_width = get_theme_mod('vw_automobile_lite_social_icon_width');
	if($vw_automobile_lite_social_icon_width != false){
		$vw_automobile_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_automobile_lite_custom_css .='width: '.esc_attr($vw_automobile_lite_social_icon_width).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_social_icon_height = get_theme_mod('vw_automobile_lite_social_icon_height');
	if($vw_automobile_lite_social_icon_height != false){
		$vw_automobile_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_automobile_lite_custom_css .='height: '.esc_attr($vw_automobile_lite_social_icon_height).';';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_social_icon_border_radius = get_theme_mod('vw_automobile_lite_social_icon_border_radius');
	if($vw_automobile_lite_social_icon_border_radius != false){
		$vw_automobile_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_automobile_lite_custom_css .='border-radius: '.esc_attr($vw_automobile_lite_social_icon_border_radius).'px;';
		$vw_automobile_lite_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_automobile_lite_related_product_show_hide = get_theme_mod('vw_automobile_lite_related_product_show_hide',true);
	if($vw_automobile_lite_related_product_show_hide != true){
		$vw_automobile_lite_custom_css .='.related.products{';
			$vw_automobile_lite_custom_css .='display: none;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_products_padding_top_bottom = get_theme_mod('vw_automobile_lite_products_padding_top_bottom');
	if($vw_automobile_lite_products_padding_top_bottom != false){
		$vw_automobile_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_automobile_lite_custom_css .='padding-top: '.esc_attr($vw_automobile_lite_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_automobile_lite_products_padding_top_bottom).'!important;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_products_padding_left_right = get_theme_mod('vw_automobile_lite_products_padding_left_right');
	if($vw_automobile_lite_products_padding_left_right != false){
		$vw_automobile_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_automobile_lite_custom_css .='padding-left: '.esc_attr($vw_automobile_lite_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_automobile_lite_products_padding_left_right).'!important;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_products_box_shadow = get_theme_mod('vw_automobile_lite_products_box_shadow');
	if($vw_automobile_lite_products_box_shadow != false){
		$vw_automobile_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_automobile_lite_custom_css .='box-shadow: '.esc_attr($vw_automobile_lite_products_box_shadow).'px '.esc_attr($vw_automobile_lite_products_box_shadow).'px '.esc_attr($vw_automobile_lite_products_box_shadow).'px #ddd;';
		$vw_automobile_lite_custom_css .='}';
	}

	$vw_automobile_lite_products_border_radius = get_theme_mod('vw_automobile_lite_products_border_radius');
	if($vw_automobile_lite_products_border_radius != false){
		$vw_automobile_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_automobile_lite_custom_css .='border-radius: '.esc_attr($vw_automobile_lite_products_border_radius).'px;';
		$vw_automobile_lite_custom_css .='}';
	}