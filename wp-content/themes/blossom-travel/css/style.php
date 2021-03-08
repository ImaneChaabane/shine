<?php
/**
 * Blossom Travel Dynamic Styles
 * 
 * @package Blossom_Travel
*/

function blossom_travel_dynamic_css(){
    
    $primary_font    = get_theme_mod( 'primary_font', 'Montserrat' );
    $primary_fonts   = blossom_travel_get_fonts( $primary_font, 'regular' );
    $secondary_font  = get_theme_mod( 'secondary_font', 'Cormorant Garamond' );
    $secondary_fonts = blossom_travel_get_fonts( $secondary_font, 'regular' );
    
    $primary_color    = get_theme_mod( 'primary_color', '#e4bfb6' );
    $secondary_color  = get_theme_mod( 'secondary_color', '#d18f7f' );
    
    $rgb = blossom_travel_hex2rgb( blossom_travel_sanitize_hex_color( $primary_color ) );
    $rgb2 = blossom_travel_hex2rgb( blossom_travel_sanitize_hex_color( $secondary_color ) );
     
    $custom_css = '';
    $custom_css .= '
     
    .content-newsletter .blossomthemes-email-newsletter-wrapper.bg-img:after,
    .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper:after{
        ' . 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.8);' . '
    }
    
    /*Typography*/

    body,
    button,
    input,
    select,
    optgroup,
    textarea{
        font-family : ' . esc_html( $primary_fonts['font'] ) . ';        
    }

	.about-section .btn-readmore, 
	.single .content-area .single-travel-essential .section-title, 
	#secondary .widget_blossomtheme_companion_cta_widget .text-holder p, 
	.site-footer .widget_blossomtheme_companion_cta_widget .text-holder p {
		font-family : ' . esc_html( $primary_fonts['font'] ) . ';
	}

	
	section[class*="-section"] .widget .widget-title, 
	.section-title, 
	.banner .banner-caption .entry-title, 
	.banner .item .entry-header .title, 
	.trending-section .widget ul li .entry-header .entry-title, 
	section.about-section .widget .widget-title, 
	.trending-stories-section article .entry-title, 
	.newsletter-section .blossomthemes-email-newsletter-wrapper h3, 
	.widget_bttk_popular_post ul li .entry-header .entry-title, 
	.widget_bttk_pro_recent_post ul li .entry-header .entry-title, 
	.widget_bttk_author_bio .title-holder, 
	.widget-area .widget_blossomthemes_email_newsletter_widget .text-holder h3, 
	.site-footer .widget_blossomthemes_email_newsletter_widget .text-holder h3, 
	body[class*="post-lay-"] .site-main .large-post .entry-title, 
	body[class*="post-lay-"] .site-main article:not(.large-post) .entry-title, 
	.additional-post .section-grid article .entry-title, 
	.single .site-content .page-header .page-title {
		font-family : ' . esc_html( $secondary_fonts['font'] ) . ';
	}
    
    /*Color Scheme*/

    button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover, 
	.widget_archive ul li::before, 
	.widget_categories ul li::before, 
	.widget_pages ul li::before, 
	.widget_meta ul li::before, 
	.widget_recent_comments ul li::before, 
	.widget_recent_entries ul li::before, 
	.widget_nav_menu ul li::before, 
	.comment-form p.form-submit input[type="submit"], 
	.pagination .page-numbers.current, 
	.posts-navigation .nav-links a:hover, 
	#load-posts a.loading, 
	#load-posts a:hover, 
	#load-posts a.disabled, 
	.sticky-t-bar:not(.active) .close, 
	.sticky-bar-content, 
	.main-navigation ul li a:after, 
	.main-navigation ul ul li:hover > a, 
	.main-navigation ul ul li a:hover, 
	.main-navigation ul ul li.current-menu-item > a, 
	.main-navigation ul ul li.current_page_item > a, 
	.main-navigation ul ul li.current-menu-ancestor > a, 
	.main-navigation ul ul li.current_page_ancestor > a, 
	.btn-readmore, 
	.banner-caption .blossomthemes-email-newsletter-wrapper form input[type="submit"]:hover, 
	.slider-two .owl-carousel .owl-nav [class*="owl-"], 
	.slider-five .owl-carousel .owl-nav [class*="owl-"], 
	.trending-section .owl-carousel .owl-nav [class*="owl-"], 
	.widget_bttk_image_text_widget ul li:hover .btn-readmore, 
	.post-thumbnail .social-list li a, 
	.popular-post-section .owl-carousel .owl-nav [class*="owl-"], 
	.trending-post-section .owl-carousel .owl-nav [class*="owl-"], 
	.popular-cat-section .owl-carousel .owl-nav [class*="owl-"], 
	.widget_blossomtheme_companion_cta_widget .btn-cta, 
	.widget_calendar table caption, 
	.tagcloud a, 
	.widget_bttk_author_bio .readmore, 
	.widget_bttk_author_bio .author-socicons li a:hover, 
	.page-template-contact .site-main form input[type="submit"], 
	.single .site-main article .social-list li a, 
	.single-lay-five .site-content .page-header .social-list li a, 
	.single-lay-six .site-content .page-header .social-list li a, 
	.widget_bttk_social_links ul li a:hover, 
	.widget_bttk_posts_category_slider_widget .owl-theme .owl-nav [class*="owl-"]:hover, 
	.widget_bttk_description_widget .social-profile li a, 
	.footer-social .social-list li a:hover svg, 
	.site-footer .widget_bttk_posts_category_slider_widget .owl-carousel .owl-dots .owl-dot.active, 
	.site-footer .widget_bttk_posts_category_slider_widget .owl-carousel .owl-dots .owl-dot:hover, 
	.site-footer .widget_bttk_social_links ul li a:hover, 
	.bttk-itw-holder .owl-stage li, 
	.author-section .author-img, 
	.trending-section .owl-carousel .owl-nav [class*="owl-"].disabled, 
	.trending-section .owl-carousel .owl-nav [class*="owl-"].disabled:hover, 
	.main-navigation ul .sub-menu li:hover > a, 
	.main-navigation ul .sub-menu li a:hover, 
	.main-navigation ul .sub-menu li.current-menu-item > a, 
	.main-navigation ul .sub-menu li.current_page_item > a, 
	.main-navigation ul .sub-menu li.current-menu-ancestor > a, 
	.main-navigation ul .sub-menu li.current_page_ancestor > a {
		background: ' . blossom_travel_sanitize_hex_color( $primary_color ) . ';
	}

	.banner-caption .blossomthemes-email-newsletter-wrapper form label input[type="checkbox"]:checked + .check-mark, 
	.feature-category-section .widget_bttk_custom_categories ul li, 
	.widget_search .search-form .search-submit, 
	.error404 .site-main .search-form .search-submit {
		background-color: ' . blossom_travel_sanitize_hex_color( $primary_color ) . ';
	}

	.pagination .page-numbers:hover, 
	.pagination .page-numbers.current, 
	.posts-navigation .nav-links a:hover, 
	#load-posts a.loading, 
	#load-posts a:hover, 
	#load-posts a.disabled, 
	.banner-caption .blossomthemes-email-newsletter-wrapper form label input[type="checkbox"]:checked + .check-mark, 
	.post-thumbnail .social-list li a, 
	.widget_blossomtheme_companion_cta_widget .btn-cta, 
	.widget_bttk_author_bio .author-socicons li a:hover, 
	.single .site-main article .social-list li a, 
	.single-lay-five .site-content .page-header .social-list li a, 
	.single-lay-six .site-content .page-header .social-list li a, 
	.site-footer .widget_bttk_posts_category_slider_widget .owl-carousel .owl-dots .owl-dot.active, 
	.site-footer .widget_bttk_posts_category_slider_widget .owl-carousel .owl-dots .owl-dot:hover {
		border-color: ' . blossom_travel_sanitize_hex_color( $primary_color ) . ';
	}

	a, a:hover, 
	#secondary .widget ul li a:hover, 
	.site-footer .widget ul li a:hover, 
	.comment-respond .comment-reply-title a:hover, 
	.social-list li a:hover, 
	.header-five .header-t .header-social .social-list li a:hover, 
	.banner .entry-header .entry-title a:hover, 
	.banner .banner-caption .entry-title a:hover, 
	.banner .item .entry-header .title a:hover, 
	.slider-one .entry-header .entry-meta > span a:hover, 
	.slider-two .item .entry-header .entry-title a:hover, 
	.slider-two .item .entry-header span.category a:hover, 
	.slider-three .item .entry-header .entry-title a:hover, 
	.slider-three .item .entry-meta > span a:hover, 
	.slider-four .item .entry-header .entry-title a:hover, 
	.slider-four .item .entry-meta > span a:hover, 
	.slider-five .item-wrap .entry-header .entry-title a:hover, 
	.slider-five .item-wrap .entry-meta > span a:hover, 
	.trending-section li .entry-header span.cat-links a:hover, 
	.trending-section .widget ul li .entry-title a:hover, 
	article .entry-title a:hover, 
	.entry-meta > span a:hover, 
	.entry-footer > span a:hover, 
	.trending-stories-section article:not(.large-post) span.category a, 
	span.category a:hover, 
	article.large-post span.category a:hover, 
	article.large-post .entry-title a:hover, 
	.popular-post-section .widget ul.style-one li .entry-title a:hover, 
	.trending-post-section.style-three article .entry-title a:hover, 
	.popular-cat-section.style-three article .entry-title a:hover, 
	.popular-post-section .widget .style-one .entry-header .cat-links a:hover, 
	.trending-post-section.style-three article .category a:hover, 
	.popular-cat-section.style-three article .category a:hover, 
	#secondary .widget_bttk_popular_post .entry-meta > span a:hover, 
	#secondary .widget_bttk_pro_recent_post .entry-meta > span a:hover, 
	.post-lay-one .site-main article:not(.large-post) span.category a:hover, 
	.post-lay-one .site-main .large-post .entry-footer > span a:hover, 
	.post-lay-one .site-main article:not(.large-post) .btn-readmore:hover, 
	.post-lay-two .site-main article span.category a:hover, 
	.post-lay-two .site-main article .entry-title a:hover, 
	.post-lay-three .site-main article span.category a:hover, 
	.post-lay-five .site-main article .category a:hover, 
	.post-lay-five .site-main article .entry-title a:hover, 
	.single .page-header span.category a:hover, 
	.single .page-header .entry-meta > span a:hover, 
	.single .site-main .article-meta .byline a:hover, 
	.single-lay-four .page-header .meta-info-wrap .byline a:hover, 
	.single-lay-five .page-header .meta-info-wrap .byline a:hover, 
	.single-lay-six .page-header .meta-info-wrap .byline a:hover, 
	.single-lay-four .page-header .meta-info-wrap > span a:hover, 
	.single-lay-five .page-header .meta-info-wrap > span a:hover, 
	.single-lay-six .page-header .meta-info-wrap > span a:hover, 
	.widget_bttk_icon_text_widget .rtc-itw-inner-holder .icon-holder, 
	.widget_blossomthemes_stat_counter_widget .blossomthemes-sc-holder .icon-holder, 
	.footer-social .social-list li a:hover:after, 
	.popular-post-section .widget_bttk_popular_post ul:not(.style-one) li .entry-title a:hover, 
	.header-one .header-social .social-list li a:hover, 
	.shop-section .item h3 a:hover,
	.site-footer .widget_bttk_popular_post .style-three li .entry-header .cat-links a:hover, 
	.site-footer .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a:hover, 
	.site-footer .widget_bttk_popular_post .style-three li .entry-meta span > a:hover, 
	.site-footer .widget_bttk_pro_recent_post .style-three li .entry-meta span > a:hover, 
	.site-footer .widget_bttk_popular_post .style-three li .entry-header .entry-title a:hover, 
	.site-footer .widget_bttk_pro_recent_post .style-three li .entry-header .entry-title a:hover {
		color: ' . blossom_travel_sanitize_hex_color( $primary_color ) . ';
	}

	.header-search .search-toggle:hover svg path {
		fill: ' . blossom_travel_sanitize_hex_color( $primary_color ) . ';
	}
    
    blockquote {
		background-image: url(' . ' \'data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 74 74"><path fill="' . blossom_travel_hash_to_percent23( blossom_travel_sanitize_hex_color( $primary_color ) ) . '" d="M68.871,47.073A12.886,12.886,0,0,0,56.71,36.191c1.494-5.547,5.121-7.752,9.53-9.032a.515.515,0,0,0,.356-.569l-.711-4.409s-.071-.356-.64-.284C50.024,23.6,39.712,35.2,41.632,49.277,43.41,59.021,51.02,62.79,58.061,61.794a12.968,12.968,0,0,0,10.81-14.722ZM20.3,36.191c1.422-5.547,5.192-7.752,9.53-9.032a.515.515,0,0,0,.356-.569l-.64-4.409s-.071-.356-.64-.284C13.682,23.532,3.441,35.124,5.219,49.206c1.849,9.815,9.53,13.584,16.5,12.588A12.865,12.865,0,0,0,32.458,47.073,12.693,12.693,0,0,0,20.3,36.191Z"></path></svg>\'' . ' );
	}

	.search .page-header .search-form .search-submit:hover, 
	.search .page-header .search-form .search-submit:active, 
	.search .page-header .search-form .search-submit:focus {
		background-image: url(' . ' \'data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="' . blossom_travel_hash_to_percent23( blossom_travel_sanitize_hex_color( $primary_color ) ) . '" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>\'' . ' );
	}

	.widget_bttk_author_bio .title-holder::before {
		background-image: url(' . ' \'data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86.268 7.604"><path fill="' . blossom_travel_hash_to_percent23( blossom_travel_sanitize_hex_color( $primary_color ) ) . '" d="M55.162,0h0a9.129,9.129,0,0,1,6.8,3.073A7,7,0,0,0,67.17,5.44a7,7,0,0,0,5.208-2.367A9.129,9.129,0,0,1,79.182,0h0a9.133,9.133,0,0,1,6.8,3.073,1.082,1.082,0,1,1-1.6,1.455,6.98,6.98,0,0,0-5.2-2.368h0a7.007,7.007,0,0,0-5.208,2.368A9.139,9.139,0,0,1,67.169,7.6a9.14,9.14,0,0,1-6.805-3.075,6.989,6.989,0,0,0-5.2-2.368h-.005a7,7,0,0,0-5.21,2.368A9.142,9.142,0,0,1,43.144,7.6a9.14,9.14,0,0,1-6.805-3.075,7.069,7.069,0,0,0-10.42,0A9.149,9.149,0,0,1,19.109,7.6h0A9.145,9.145,0,0,1,12.3,4.528,6.984,6.984,0,0,0,7.092,2.16h0A7,7,0,0,0,1.882,4.528a1.081,1.081,0,1,1-1.6-1.455A9.137,9.137,0,0,1,7.09,0h0A9.145,9.145,0,0,1,13.9,3.073a6.985,6.985,0,0,0,5.2,2.367h0a7.012,7.012,0,0,0,5.213-2.367,9.275,9.275,0,0,1,13.612,0,7.01,7.01,0,0,0,5.21,2.367,7,7,0,0,0,5.21-2.367A9.146,9.146,0,0,1,55.162,0"></path></svg>\'' . ' );
	}

	.comment-body .reply .comment-reply-link:hover:before {
		background-image: url(' . ' \'data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 15"><path fill="' . blossom_travel_hash_to_percent23( blossom_travel_sanitize_hex_color( $primary_color ) ) . '" d="M934,147.2a11.941,11.941,0,0,1,7.5,3.7,16.063,16.063,0,0,1,3.5,7.3c-2.4-3.4-6.1-5.1-11-5.1v4.1l-7-7,7-7Z" transform="translate(-927 -143.2)"/></svg>\'' . ' );
	}

	.instagram-section .profile-link::after {
		background-image: url(' . ' \'data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="' . blossom_travel_hash_to_percent23( blossom_travel_sanitize_hex_color( $primary_color ) ) . '" d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"></path></svg>\'' . ' );
	}

	.widget-area .widget_blossomthemes_email_newsletter_widget .text-holder h3::after, 
	.site-footer .widget_blossomthemes_email_newsletter_widget .text-holder h3::after {
		background-image: url(' . ' \'data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86.268 7.604"><path fill="' . blossom_travel_hash_to_percent23( blossom_travel_sanitize_hex_color( $primary_color ) ) . '" d="M55.162,0h0a9.129,9.129,0,0,1,6.8,3.073A7,7,0,0,0,67.17,5.44a7,7,0,0,0,5.208-2.367A9.129,9.129,0,0,1,79.182,0h0a9.133,9.133,0,0,1,6.8,3.073,1.082,1.082,0,1,1-1.6,1.455,6.98,6.98,0,0,0-5.2-2.368h0a7.007,7.007,0,0,0-5.208,2.368A9.139,9.139,0,0,1,67.169,7.6a9.14,9.14,0,0,1-6.805-3.075,6.989,6.989,0,0,0-5.2-2.368h-.005a7,7,0,0,0-5.21,2.368A9.142,9.142,0,0,1,43.144,7.6a9.14,9.14,0,0,1-6.805-3.075,7.069,7.069,0,0,0-10.42,0A9.149,9.149,0,0,1,19.109,7.6h0A9.145,9.145,0,0,1,12.3,4.528,6.984,6.984,0,0,0,7.092,2.16h0A7,7,0,0,0,1.882,4.528a1.081,1.081,0,1,1-1.6-1.455A9.137,9.137,0,0,1,7.09,0h0A9.145,9.145,0,0,1,13.9,3.073a6.985,6.985,0,0,0,5.2,2.367h0a7.012,7.012,0,0,0,5.213-2.367,9.275,9.275,0,0,1,13.612,0,7.01,7.01,0,0,0,5.21,2.367,7,7,0,0,0,5.21-2.367A9.146,9.146,0,0,1,55.162,0"></path></svg>\'' . ' );
	}


	/*Secondary color*/
	.comment-form p.form-submit input[type="submit"]:hover, 
	.sticky-t-bar .btn-readmore, 
	.sticky-t-bar .btn-readmore:hover, 
	.header-five .header-t, 
	.btn-readmore:hover, 
	.slider-two .owl-carousel .owl-nav [class*="owl-"]:hover, 
	.slider-two .owl-carousel .owl-nav [class*="owl-"].disabled, 
	.slider-five .owl-carousel .owl-nav [class*="owl-"]:hover, 
	.slider-five .owl-carousel .owl-nav [class*="owl-"].disabled, 
	.trending-section .owl-carousel .owl-nav [class*="owl-"]:hover,  
	.popular-post-section .owl-stage-outer .owl-item, 
	.trending-post-section.style-three .owl-stage-outer .owl-item, 
	.popular-cat-section.style-three .owl-stage-outer .owl-item, 
	.popular-post-section .widget ul.style-one li, 
	.trending-post-section.style-three article, 
	.popular-cat-section.style-three article, 
	.widget_blossomtheme_companion_cta_widget .btn-cta:hover, 
	.tagcloud a:hover, 
	.widget_bttk_author_bio .readmore:hover, 
	.widget_bttk_contact_social_links ul.social-networks li a:hover, 
	.author-section .social-list li a:hover, 
	body.single:not(.single-lay-one) .site-header.header-one, 
	.widget_bttk_description_widget .social-profile li a:hover {
		background: ' . blossom_travel_sanitize_hex_color( $secondary_color ) . ';
	}

	.comment-respond .comment-form p.comment-form-cookies-consent input[type="checkbox"]:checked + label::before, 
	.widget_search .search-form .search-submit:hover, 
	.widget_search .search-form .search-submit:active, 
	.widget_search .search-form .search-submit:focus, 
	.error404 .site-main .search-form .search-submit:hover, 
	.error404 .site-main .search-form .search-submit:active, 
	.error404 .site-main .search-form .search-submit:focus {
		background-color: ' . blossom_travel_sanitize_hex_color( $secondary_color ) . ';
	}

	.comment-respond .comment-form p.comment-form-cookies-consent input[type="checkbox"]:checked + label::before, 
	.widget_blossomtheme_companion_cta_widget .btn-cta:hover, 
	.widget_bttk_contact_social_links ul.social-networks li a, 
	.author-section .social-list li a:hover {
		border-color: ' . blossom_travel_sanitize_hex_color( $secondary_color ) . ';
	}

	.breadcrumb-wrapper .current, 
	.breadcrumb-wrapper a:hover, 
	.page-header .breadcrumb-wrapper a:hover, 
	.comment-author a:hover, 
	.comment-metadata a:hover, 
	.comment-body .reply .comment-reply-link:hover, 
	.comment-respond .comment-reply-title a, 
	.post-navigation .nav-links a:hover .post-title, 
	.slider-two .item .entry-header span.category a, 
	.trending-section li .entry-header span.cat-links a, 
	.shop-section .item .price, 
	span.category a, .instagram-section .profile-link:hover, 
	.widget_bttk_contact_social_links ul.contact-list li svg, 
	.widget_bttk_contact_social_links ul li a:hover, 
	.widget_bttk_contact_social_links ul.social-networks li a, 
	.post-lay-one .site-main article:not(.large-post) span.category a, 
	.post-lay-one .site-main article:not(.large-post) .btn-readmore > svg, 
	.post-lay-three .site-main article span.category a, 
	.post-lay-three .site-main article .entry-footer .button-wrap .btn-readmore:hover, 
	.post-lay-four .site-main article .entry-footer .button-wrap .btn-readmore:hover, 
	.post-lay-three .site-main article .entry-footer .button-wrap .btn-readmore > svg, 
	.post-lay-four .site-main article .entry-footer .button-wrap .btn-readmore > svg, 
	.error-num, .additional-post article .entry-footer .btn-readmore:hover, 
	.additional-post article .entry-footer .btn-readmore svg, 
	.single .site-main .entry-footer > span.cat-tags a:hover, 
	.single-lay-four .page-header span.category a, 
	.single-lay-five .page-header span.category a, 
	.single-lay-six .page-header span.category a {
		color: ' . blossom_travel_sanitize_hex_color( $secondary_color ) . ';
	}

	.main-navigation ul .sub-menu li a {
		' . 'border-bottom-color: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.15);' . '
	}

	.header-four .header-t, 
	section.featured-section, 
	section.feature-category-section, 
	section.explore-destination-section {
		' . 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.1);' . '
	}

	.widget-area .widget_blossomthemes_email_newsletter_widget input[type="submit"], 
	.site-footer .widget_blossomthemes_email_newsletter_widget input[type="submit"], 
	#secondary .widget_bttk_custom_categories ul li .post-count, 
	.site-footer .widget_bttk_custom_categories ul li .post-count {
		' . 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.75);' . '
	}

	#secondary .widget_bttk_custom_categories ul li a:hover .post-count, 
	#secondary .widget_bttk_custom_categories ul li a:hover:focus .post-count, 
	.site-footer .widget_bttk_custom_categories ul li a:hover .post-count, 
	.site-footer .widget_bttk_custom_categories ul li a:hover:focus .post-count {
	    ' . 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.85);' . '
	}

	.widget-area .widget_blossomthemes_email_newsletter_widget input[type="submit"]:hover, 
	.widget-area .widget_blossomthemes_email_newsletter_widget input[type="submit"]:active, 
	.widget-area .widget_blossomthemes_email_newsletter_widget input[type="submit"]:focus, 
	.site-footer .widget_blossomthemes_email_newsletter_widget input[type="submit"]:hover, 
	.site-footer .widget_blossomthemes_email_newsletter_widget input[type="submit"]:active, 
	.site-footer .widget_blossomthemes_email_newsletter_widget input[type="submit"]:focus {
		' . 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.9);' . '
	}

	.top-bar {
		' . 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.25);' . ';
	}

	@media screen and (max-width: 1024px) {
		.responsive-nav .search-form .search-submit {
			background-color: ' . blossom_travel_sanitize_hex_color( $primary_color ) . ';
		}

		button.toggle-btn:hover .toggle-bar {
			background: ' . blossom_travel_sanitize_hex_color( $secondary_color ) . ';
		}

		.responsive-nav .search-form .search-submit:hover, 
		.responsive-nav .search-form .search-submit:active, 
		.responsive-nav .search-form .search-submit:focus {
			background-color: ' . blossom_travel_sanitize_hex_color( $secondary_color ) . ';
		}

		.main-navigation ul li:hover > a, 
		.main-navigation ul li a:hover, 
		.main-navigation ul li.current-menu-item > a, 
		.main-navigation ul li.current_page_item > a, 
		.main-navigation ul li.current-menu-ancestor > a, 
		.main-navigation ul li.current_page_ancestor > a {
			color: ' . blossom_travel_sanitize_hex_color( $secondary_color ) . ';
		}
	}

	@media screen and (max-width: 767px) {
		.banner-caption {
			' . 'background: rgba(' . $rgb2[0] . ', ' . $rgb2[1] . ', ' . $rgb2[2] . ', 0.2);' . '
		}
		.slider-five .owl-carousel .owl-dots .owl-dot {
			background: ' . blossom_travel_sanitize_hex_color( $primary_color ) . ';
		}

		.slider-five .owl-carousel .owl-dots .owl-dot, 
		.slider-five .owl-carousel .owl-dots .owl-dot.active {
			border-color: ' . blossom_travel_sanitize_hex_color( $primary_color ) . ';
		}

		section[class*="-section"] .widget .widget-title::after, 
		.section-title::after {
			background-image: url(' . ' \'data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86.268 7.604"><path fill="' . blossom_travel_hash_to_percent23( blossom_travel_sanitize_hex_color( $primary_color ) ) . '" d="M55.162,0h0a9.129,9.129,0,0,1,6.8,3.073A7,7,0,0,0,67.17,5.44a7,7,0,0,0,5.208-2.367A9.129,9.129,0,0,1,79.182,0h0a9.133,9.133,0,0,1,6.8,3.073,1.082,1.082,0,1,1-1.6,1.455,6.98,6.98,0,0,0-5.2-2.368h0a7.007,7.007,0,0,0-5.208,2.368A9.139,9.139,0,0,1,67.169,7.6a9.14,9.14,0,0,1-6.805-3.075,6.989,6.989,0,0,0-5.2-2.368h-.005a7,7,0,0,0-5.21,2.368A9.142,9.142,0,0,1,43.144,7.6a9.14,9.14,0,0,1-6.805-3.075,7.069,7.069,0,0,0-10.42,0A9.149,9.149,0,0,1,19.109,7.6h0A9.145,9.145,0,0,1,12.3,4.528,6.984,6.984,0,0,0,7.092,2.16h0A7,7,0,0,0,1.882,4.528a1.081,1.081,0,1,1-1.6-1.455A9.137,9.137,0,0,1,7.09,0h0A9.145,9.145,0,0,1,13.9,3.073a6.985,6.985,0,0,0,5.2,2.367h0a7.012,7.012,0,0,0,5.213-2.367,9.275,9.275,0,0,1,13.612,0,7.01,7.01,0,0,0,5.21,2.367,7,7,0,0,0,5.21-2.367A9.146,9.146,0,0,1,55.162,0"></path></svg>\'' . ' );
		}

		.newsletter-section .blossomthemes-email-newsletter-wrapper h3::after {
			background-image: url(' . ' \'data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86.268 7.604"><path fill="' . blossom_travel_hash_to_percent23( blossom_travel_sanitize_hex_color( $primary_color ) ) . '" d="M55.162,0h0a9.129,9.129,0,0,1,6.8,3.073A7,7,0,0,0,67.17,5.44a7,7,0,0,0,5.208-2.367A9.129,9.129,0,0,1,79.182,0h0a9.133,9.133,0,0,1,6.8,3.073,1.082,1.082,0,1,1-1.6,1.455,6.98,6.98,0,0,0-5.2-2.368h0a7.007,7.007,0,0,0-5.208,2.368A9.139,9.139,0,0,1,67.169,7.6a9.14,9.14,0,0,1-6.805-3.075,6.989,6.989,0,0,0-5.2-2.368h-.005a7,7,0,0,0-5.21,2.368A9.142,9.142,0,0,1,43.144,7.6a9.14,9.14,0,0,1-6.805-3.075,7.069,7.069,0,0,0-10.42,0A9.149,9.149,0,0,1,19.109,7.6h0A9.145,9.145,0,0,1,12.3,4.528,6.984,6.984,0,0,0,7.092,2.16h0A7,7,0,0,0,1.882,4.528a1.081,1.081,0,1,1-1.6-1.455A9.137,9.137,0,0,1,7.09,0h0A9.145,9.145,0,0,1,13.9,3.073a6.985,6.985,0,0,0,5.2,2.367h0a7.012,7.012,0,0,0,5.213-2.367,9.275,9.275,0,0,1,13.612,0,7.01,7.01,0,0,0,5.21,2.367,7,7,0,0,0,5.21-2.367A9.146,9.146,0,0,1,55.162,0"></path></svg>\'' . ' );
		}
	}';
    
    if( blossom_travel_is_woocommerce_activated() ) {
        $custom_css .='
        .woocommerce ul.products li.product .price ins,
		.woocommerce div.product p.price ins,
		.woocommerce div.product span.price ins, 
		.woocommerce nav.woocommerce-pagination ul li a:hover,
 		.woocommerce nav.woocommerce-pagination ul li a:focus, 
 		.woocommerce div.product .entry-summary .woocommerce-product-rating .woocommerce-review-link:hover,
 		.woocommerce div.product .entry-summary .woocommerce-product-rating .woocommerce-review-link:focus, 
 		.woocommerce div.product .entry-summary .product_meta .posted_in a:hover,
		.woocommerce div.product .entry-summary .product_meta .posted_in a:focus,
		.woocommerce div.product .entry-summary .product_meta .tagged_as a:hover,
		.woocommerce div.product .entry-summary .product_meta .tagged_as a:focus, 
		.woocommerce-cart #primary .page .entry-content table.shop_table td.product-name a:hover,
 		.woocommerce-cart #primary .page .entry-content table.shop_table td.product-name a:focus, 
 		.widget.woocommerce ul li a:hover, .woocommerce.widget_price_filter .price_slider_amount .button:hover,
 		.woocommerce.widget_price_filter .price_slider_amount .button:focus, 
 		.woocommerce.widget_product_categories ul li.cat-parent .cat-toggle:hover, 
 		.woocommerce ul.product_list_widget li .product-title:hover,
 		.woocommerce ul.product_list_widget li .product-title:focus, 
 		.woocommerce ul.product_list_widget li ins,
 		.woocommerce ul.product_list_widget li ins .amount, 
 		.woocommerce ul.products li.product .price ins, .woocommerce div.product p.price ins, .woocommerce div.product span.price ins,
 		.woocommerce div.product .entry-summary .product_meta .posted_in a:hover, .woocommerce div.product .entry-summary .product_meta .posted_in a:focus, .woocommerce div.product .entry-summary .product_meta .tagged_as a:hover, .woocommerce div.product .entry-summary .product_meta .tagged_as a:focus, 
 		.woocommerce div.product .entry-summary .woocommerce-product-rating .woocommerce-review-link:hover, .woocommerce div.product .entry-summary .woocommerce-product-rating .woocommerce-review-link:focus, 
 		.woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus {
			color: ' . blossom_travel_sanitize_hex_color( $primary_color ) . ';
		}

		.woocommerce ul.products li.product .added_to_cart:hover,
 		.woocommerce ul.products li.product .added_to_cart:focus, 
 		.woocommerce ul.products li.product .add_to_cart_button:hover,
		.woocommerce ul.products li.product .add_to_cart_button:focus,
		.woocommerce ul.products li.product .product_type_external:hover,
		.woocommerce ul.products li.product .product_type_external:focus,
		.woocommerce ul.products li.product .ajax_add_to_cart:hover,
		.woocommerce ul.products li.product .ajax_add_to_cart:focus, 
		.woocommerce ul.products li.product .button.loading,
 		.woocommerce-page ul.products li.product .button.loading, 
 		.woocommerce nav.woocommerce-pagination ul li span.current, 
 		.woocommerce div.product .entry-summary .variations_form .single_variation_wrap .button:hover,
 		.woocommerce div.product .entry-summary .variations_form .single_variation_wrap .button:focus, 
 		.woocommerce div.product form.cart .single_add_to_cart_button:hover,
		.woocommerce div.product form.cart .single_add_to_cart_button:focus,
		.woocommerce div.product .cart .single_add_to_cart_button.alt:hover,
		.woocommerce div.product .cart .single_add_to_cart_button.alt:focus, 
		.woocommerce-cart #primary .page .entry-content table.shop_table td.actions .coupon input[type="submit"]:hover,
 		.woocommerce-cart #primary .page .entry-content table.shop_table td.actions .coupon input[type="submit"]:focus, 
 		.woocommerce-cart #primary .page .entry-content .cart_totals .checkout-button:hover,
 		.woocommerce-cart #primary .page .entry-content .cart_totals .checkout-button:focus, 
 		.woocommerce-checkout .woocommerce .woocommerce-info, 
 		.woocommerce-checkout .woocommerce form.woocommerce-form-login input.button:hover,
		.woocommerce-checkout .woocommerce form.woocommerce-form-login input.button:focus,
		.woocommerce-checkout .woocommerce form.checkout_coupon input.button:hover,
		.woocommerce-checkout .woocommerce form.checkout_coupon input.button:focus,
		.woocommerce form.lost_reset_password input.button:hover,
		.woocommerce form.lost_reset_password input.button:focus,
		.woocommerce .return-to-shop .button:hover,
		.woocommerce .return-to-shop .button:focus,
		.woocommerce #payment #place_order:hover,
		.woocommerce-page #payment #place_order:focus, 
		.woocommerce #respond input#submit:hover, 
		.woocommerce #respond input#submit:focus, 
		.woocommerce a.button:hover, 
		.woocommerce a.button:focus, 
		.woocommerce button.button:hover, 
		.woocommerce button.button:focus, 
		.woocommerce input.button:hover, 
		.woocommerce input.button:focus, 
		.woocommerce #secondary .widget_shopping_cart .buttons .button:hover,
 		.woocommerce #secondary .widget_shopping_cart .buttons .button:focus, 
 		.woocommerce #secondary .widget_price_filter .ui-slider .ui-slider-range, 
 		.woocommerce #secondary .widget_price_filter .price_slider_amount .button,  
 		.woocommerce .woocommerce-message .button:hover,
 		.woocommerce .woocommerce-message .button:focus, 
 		.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover, 
 		.woocommerce ul.products li.product .add_to_cart_button:focus, .woocommerce ul.products li.product .add_to_cart_button:hover, .woocommerce ul.products li.product .ajax_add_to_cart:focus, .woocommerce ul.products li.product .ajax_add_to_cart:hover, .woocommerce ul.products li.product .product_type_external:focus, .woocommerce ul.products li.product .product_type_external:hover, .woocommerce ul.products li.product .product_type_grouped:focus, .woocommerce ul.products li.product .product_type_grouped:hover {
	 		background: ' . blossom_travel_sanitize_hex_color( $primary_color ) . ';
	 	}

	 	.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item.chosen a::before, 
 		.widget.widget_layered_nav_filters ul li.chosen a:before, 
 		.woocommerce-product-search button[type="submit"]:hover {
	 		background-color: ' . blossom_travel_sanitize_hex_color( $primary_color ) . ';
	 	}

	 	.woocommerce nav.woocommerce-pagination ul li a:hover,
 		.woocommerce nav.woocommerce-pagination ul li a:focus, 
 		.woocommerce nav.woocommerce-pagination ul li span.current, 
 		.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item a:hover:before, 
 		.woocommerce.widget_layered_nav_filters ul li a:hover:before, 
 		.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item.chosen a::before, 
 		.woocommerce.widget_layered_nav_filters ul li.chosen a:before, 
 		.woocommerce.widget_price_filter .ui-slider .ui-slider-handle, 
 		.woocommerce.widget_price_filter .price_slider_amount .button {
	 		border-color: ' . blossom_travel_sanitize_hex_color( $primary_color ) . ';
	 	}

	 	.woocommerce div.product .product_title, 
	 	.woocommerce div.product .woocommerce-tabs .panel h2 {
		 	font-family : ' . esc_html( $primary_fonts['font'] ) .';
		 }

		.woocommerce.widget_shopping_cart ul li a, 
		.woocommerce ul.product_list_widget li .product-title, 
		.woocommerce-order-details .woocommerce-order-details__title, 
		.woocommerce-order-received .woocommerce-column__title, 
		.woocommerce-customer-details .woocommerce-column__title {
		 	font-family : ' . esc_html( $primary_fonts['font'] ) . ';
		}';
    }
           
    wp_add_inline_style( 'blossom-travel', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'blossom_travel_dynamic_css', 99 );

/**
 * Function for sanitizing Hex color 
 */
function blossom_travel_sanitize_hex_color( $color ){
	if ( '' === $color )
		return '';

    // 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;
}

/**
 * convert hex to rgb
 * @link http://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
*/
function blossom_travel_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

/**
 * Convert '#' to '%23'
*/
function blossom_travel_hash_to_percent23( $color_code ){
    $color_code = str_replace( "#", "%23", $color_code );
    return $color_code;
}