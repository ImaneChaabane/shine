<?php
/**
 * Banner Section
 *
 * @package Blossom_Travel
 */
function blossom_travel_customize_register_frontpage_banner( $wp_customize ) {
	
    $wp_customize->get_section( 'header_image' )->title                    = __( 'Banner Settings', 'blossom-travel' );
    $wp_customize->get_section( 'header_image' )->priority                 = 37;
    $wp_customize->get_control( 'header_image' )->active_callback          = 'blossom_travel_banner_ac';
    $wp_customize->get_control( 'header_video' )->active_callback          = 'blossom_travel_banner_ac';
    $wp_customize->get_control( 'external_header_video' )->active_callback = 'blossom_travel_banner_ac';
    $wp_customize->get_section( 'header_image' )->description              = '';                                               
    $wp_customize->get_setting( 'header_image' )->transport                = 'refresh';
    $wp_customize->get_setting( 'header_video' )->transport                = 'refresh';
    $wp_customize->get_setting( 'external_header_video' )->transport       = 'refresh';
    
    /** Banner Options */
    $wp_customize->add_setting(
		'ed_banner_section',
		array(
			'default'			=> 'static_banner',
			'sanitize_callback' => 'blossom_travel_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Travel_Select_Control(
    		$wp_customize,
    		'ed_banner_section',
    		array(
                'label'	      => __( 'Banner Options', 'blossom-travel' ),
                'description' => __( 'Choose banner as static image/video.', 'blossom-travel' ),
    			'section'     => 'header_image',
    			'choices'     => array(
                    'no_banner'        => __( 'Disable Banner Section', 'blossom-travel' ),
                    'static_banner'    => __( 'Static/Video CTA Banner', 'blossom-travel' ),
                ),
                'priority' => 5	
     		)            
		)
	);
    
    /** Title */
    $wp_customize->add_setting(
        'banner_title',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_title',
        array(
            'label'           => __( 'Title', 'blossom-travel' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback' => 'blossom_travel_banner_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'banner_title', array(
        'selector' => '.banner .banner-caption h3.entry-title',
        'render_callback' => 'blossom_travel_get_banner_title',
    ) );    
    
    /** Banner Label */
    $wp_customize->add_setting(
        'banner_label',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_label',
        array(
            'label'           => __( 'Banner Label', 'blossom-travel' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback' => 'blossom_travel_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_label', array(
        'selector' => '.banner .banner-caption .button-wrap a.btn-readmore',
        'render_callback' => 'blossom_travel_get_banner_label',
    ) ); 
    
    /** Banner Link */
    $wp_customize->add_setting(
        'banner_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'banner_link',
        array(
            'label'           => __( 'Banner Link', 'blossom-travel' ),
            'section'         => 'header_image',
            'type'            => 'url',
            'active_callback' => 'blossom_travel_banner_ac'
        )
    );
    
    /** Slider Settings Ends */  
      
}
add_action( 'customize_register', 'blossom_travel_customize_register_frontpage_banner' );