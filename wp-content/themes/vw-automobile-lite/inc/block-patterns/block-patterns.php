<?php
/**
 * VW Automobile Lite: Block Patterns
 *
 * @package VW Automobile Lite
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'vw-automobile-lite',
		array( 'label' => __( 'VW Automobile Lite', 'vw-automobile-lite' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'vw-automobile-lite/banner-section',
		array(
			'title'      => __( 'Banner Section', 'vw-automobile-lite' ),
			'categories' => array( 'vw-automobile-lite' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":9384,\"dimRatio\":30,\"align\":\"full\",\"className\":\"main-banner-section\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim-30 has-background-dim main-banner-section\" style=\"background-image:url(" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png)\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"className\":\"m-0\"} -->\n<div class=\"wp-block-columns alignwide m-0\"><!-- wp:column {\"width\":\"25%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:25%\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"50%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:50%\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"style\":{\"typography\":{\"fontSize\":35}}} -->\n<h1 class=\"has-text-align-center\" style=\"font-size:35px\">Lorem ipsum dolor sit amet, Consectetur adipising</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center\",\"style\":{\"typography\":{\"fontSize\":12}}} -->\n<p class=\"has-text-align-center text-center\" style=\"font-size:12px\">&nbsp;Lorem Ipsum has been the industrys standard.&nbsp; &nbsp;Lorem Ipsum has been the industrys standard.&nbsp; &nbsp;Lorem Ipsum has been the industrys standard.&nbsp;&nbsp;Lorem Ipsum has been the industrys standard.&nbsp;&nbsp;Lorem Ipsum has been the industrys standard.&nbsp;Lorem Ipsum</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"style\":{\"color\":{\"background\":\"#ff5400\"}},\"textColor\":\"white\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-white-color has-text-color has-background\" style=\"background-color:#ff5400\">DISCOVER MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"25%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:25%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'vw-automobile-lite/choose-us-section',
		array(
			'title'      => __( 'Choose Us Section', 'vw-automobile-lite' ),
			'categories' => array( 'vw-automobile-lite' ),
			'content'    => "<!-- wp:cover {\"overlayColor\":\"white\",\"align\":\"wide\",\"className\":\"choose-us-section m-0\"} -->\n<div class=\"wp-block-cover alignwide has-white-background-color has-background-dim choose-us-section m-0\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"className\":\"mb-5\",\"style\":{\"color\":{\"text\":\"#222222\"},\"typography\":{\"fontSize\":28}}} -->\n<h2 class=\"has-text-align-center mb-5 has-text-color\" style=\"color:#222222;font-size:28px\">LOREM IPSUM DOLOR SIT AMET</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns {\"align\":\"wide\",\"className\":\"m-0 px-md-5\"} -->\n<div class=\"wp-block-columns alignwide m-0 px-md-5\"><!-- wp:column {\"className\":\"mb-4\"} -->\n<div class=\"wp-block-column mb-4\"><!-- wp:image {\"align\":\"center\",\"id\":9398,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/chooseus-image1.png\" alt=\"\" class=\"wp-image-9398\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"className\":\"mb-2\",\"fontSize\":\"normal\",\"style\":{\"color\":{\"text\":\"#222222\"}}} -->\n<h3 class=\"has-text-align-center mb-2 has-text-color has-normal-font-size\" style=\"color:#222222\">LOREM IPSUM DOLOR SIT AMET</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center\",\"style\":{\"color\":{\"text\":\"#6b6b6b\"},\"typography\":{\"fontSize\":12}}} -->\n<p class=\"has-text-align-center text-center has-text-color\" style=\"color:#6b6b6b;font-size:12px\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"choose-content mb-4\"} -->\n<div class=\"wp-block-column choose-content mb-4\"><!-- wp:image {\"align\":\"center\",\"id\":9404,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/chooseus-image2.png\" alt=\"\" class=\"wp-image-9404\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"className\":\"mb-2\",\"fontSize\":\"normal\",\"style\":{\"color\":{\"text\":\"#222222\"}}} -->\n<h3 class=\"has-text-align-center mb-2 has-text-color has-normal-font-size\" style=\"color:#222222\">LOREM IPSUM DOLOR SIT </h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center\",\"style\":{\"color\":{\"text\":\"#6b6b6b\"},\"typography\":{\"fontSize\":12}}} -->\n<p class=\"has-text-align-center text-center has-text-color\" style=\"color:#6b6b6b;font-size:12px\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"mb-4\"} -->\n<div class=\"wp-block-column mb-4\"><!-- wp:image {\"align\":\"center\",\"id\":9401,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/chooseus-image3.png\" alt=\"\" class=\"wp-image-9401\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"className\":\"mb-2\",\"fontSize\":\"normal\",\"style\":{\"color\":{\"text\":\"#222222\"}}} -->\n<h3 class=\"has-text-align-center mb-2 has-text-color has-normal-font-size\" style=\"color:#222222\">LOREM IPSUM DOLOR</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center\",\"style\":{\"color\":{\"text\":\"#6b6b6b\"},\"typography\":{\"fontSize\":12}}} -->\n<p class=\"has-text-align-center text-center has-text-color\" style=\"color:#6b6b6b;font-size:12px\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);
}