<?php
/**
 * General Settings
 *
 * @package Blossom_Travel
 */

function blossom_travel_customize_register_general( $wp_customize ){
    
    /** General Settings */
    $wp_customize->add_panel( 
        'general_settings',
         array(
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'General Settings', 'blossom-travel' ),
            'description' => __( 'Customize Header, Social, Sharing, SEO, Post/Page, Newsletter, Performance and Miscellaneous settings.', 'blossom-travel' ),
        ) 
    );

    /** Header Settings */
    $wp_customize->add_section(
        'header_settings',
        array(
            'title'    => __( 'Header Settings', 'blossom-travel' ),
            'priority' => 20,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Header Search */
    $wp_customize->add_setting( 
        'ed_header_search', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Toggle_Control( 
            $wp_customize,
            'ed_header_search',
            array(
                'section'     => 'header_settings',
                'label'       => __( 'Enable Header Search', 'blossom-travel' ),
                'description' => __( 'Enable to show Search button in header.', 'blossom-travel' ),
            )
        )
    );

    $wp_customize->add_setting( 'header_background_image',
        array(
            'default'           => esc_url( get_template_directory_uri() . '/images/header-bg.jpg' ),
            'sanitize_callback' => 'blossom_travel_sanitize_image',
        )
    );
    
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( $wp_customize, 'header_background_image',
            array(
                'label'         => esc_html__( 'Background Image', 'blossom-travel' ),
                'description'   => esc_html__( 'Choose background Image of your choice. Recommended size for this image is 1903px by 445px. This effect on blog, archive & search pages.', 'blossom-travel' ),
                'section'       => 'header_settings',
                'type'          => 'image',
            )
        )
    );
    /** Header Settings Ends */    
    
    /** Social Media Settings */
    $wp_customize->add_section(
        'social_media_settings',
        array(
            'title'    => __( 'Social Media Settings', 'blossom-travel' ),
            'priority' => 30,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_social_links', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Toggle_Control( 
            $wp_customize,
            'ed_social_links',
            array(
                'section'     => 'social_media_settings',
                'label'       => __( 'Enable Social Links', 'blossom-travel' ),
                'description' => __( 'Enable to show social links at header.', 'blossom-travel' ),
            )
        )
    );
    
    $wp_customize->add_setting( 
        new Blossom_Travel_Repeater_Setting( 
            $wp_customize, 
            'social_links', 
            array(
                'default' => '',
                'sanitize_callback' => array( 'Blossom_Travel_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Control_Repeater(
            $wp_customize,
            'social_links',
            array(
                'section' => 'social_media_settings',               
                'label'   => __( 'Social Links', 'blossom-travel' ),
                'fields'  => array(
                    'font' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'blossom-travel' ),
                        'description' => __( 'Example: fab fa-facebook-f', 'blossom-travel' ),
                    ),
                    'link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Link', 'blossom-travel' ),
                        'description' => __( 'Example: https://facebook.com', 'blossom-travel' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'links', 'blossom-travel' ),
                    'field' => 'link'
                ),
                'choices'   => array(
                    'limit' => 10
                ) 
                                        
            )
        )
    );
    /** Social Media Settings Ends */
    
    /** SEO Settings */
    $wp_customize->add_section(
        'seo_settings',
        array(
            'title'    => __( 'SEO Settings', 'blossom-travel' ),
            'priority' => 40,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_post_update_date', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Toggle_Control( 
            $wp_customize,
            'ed_post_update_date',
            array(
                'section'     => 'seo_settings',
                'label'       => __( 'Enable Last Update Post Date', 'blossom-travel' ),
                'description' => __( 'Enable to show last updated post date on listing as well as in single post.', 'blossom-travel' ),
            )
        )
    );

    /** Enable Breadcrumb */
    $wp_customize->add_setting( 
        'ed_breadcrumb', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Toggle_Control( 
            $wp_customize,
            'ed_breadcrumb',
            array(
                'section'     => 'seo_settings',
                'label'       => __( 'Enable Breadcrumb', 'blossom-travel' ),
                'description' => __( 'Enable to show breadcrumb in pages.', 'blossom-travel' ),
            )
        )
    );
    
    /** Breadcrumb Home Text */
    $wp_customize->add_setting(
        'home_text',
        array(
            'default'           => __( 'Home', 'blossom-travel' ),
            'sanitize_callback' => 'sanitize_text_field' 
        )
    );
    
    $wp_customize->add_control(
        'home_text',
        array(
            'type'    => 'text',
            'section' => 'seo_settings',
            'label'   => __( 'Breadcrumb Home Text', 'blossom-travel' ),
        )
    );  

    /** SEO Settings Ends */

    /** Posts(Blog) & Pages Settings */
    $wp_customize->add_section(
        'post_page_settings',
        array(
            'title'    => __( 'Posts(Blog) & Pages Settings', 'blossom-travel' ),
            'priority' => 50,
            'panel'    => 'general_settings',
        )
    );
    
    /** Prefix Archive Page */
    $wp_customize->add_setting( 
        'ed_prefix_archive', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Toggle_Control( 
            $wp_customize,
            'ed_prefix_archive',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Hide Prefix in Archive Page', 'blossom-travel' ),
                'description' => __( 'Enable to hide prefix in archive page.', 'blossom-travel' ),
            )
        )
    );
    
    /** Blog Excerpt */
    $wp_customize->add_setting( 
        'ed_excerpt', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Toggle_Control( 
            $wp_customize,
            'ed_excerpt',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Enable Blog Excerpt', 'blossom-travel' ),
                'description' => __( 'Enable to show excerpt or disable to show full post content.', 'blossom-travel' ),
            )
        )
    );
    
    /** Excerpt Length */
    $wp_customize->add_setting( 
        'excerpt_length', 
        array(
            'default'           => 55,
            'sanitize_callback' => 'blossom_travel_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Slider_Control( 
            $wp_customize,
            'excerpt_length',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Excerpt Length', 'blossom-travel' ),
                'description' => __( 'Automatically generated excerpt length (in words).', 'blossom-travel' ),
                'choices'     => array(
                    'min'   => 10,
                    'max'   => 100,
                    'step'  => 5,
                )                 
            )
        )
    );
    
    /** Read More Text */
    $wp_customize->add_setting(
        'read_more_text',
        array(
            'default'           => __( 'Read', 'blossom-travel' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'read_more_text',
        array(
            'type'    => 'text',
            'section' => 'post_page_settings',
            'label'   => __( 'Read More Text', 'blossom-travel' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'read_more_text', array(
        'selector' => '.entry-footer .btn-readmore',
        'render_callback' => 'blossom_travel_get_read_more',
    ) );
    
    /** Note */
    $wp_customize->add_setting(
        'post_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Note_Control( 
            $wp_customize,
            'post_note_text',
            array(
                'section'     => 'post_page_settings',
                'description' => sprintf( __( '%s These options affect your individual posts.', 'blossom-travel' ), '<hr/>' ),
            )
        )
    );

    /** Hide Author Section */
    $wp_customize->add_setting( 
        'ed_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Toggle_Control( 
            $wp_customize,
            'ed_author',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Hide Author Section', 'blossom-travel' ),
                'description' => __( 'Enable to hide author section.', 'blossom-travel' ),
            )
        )
    );
    
    /** Author Section title */
    $wp_customize->add_setting(
        'author_title',
        array(
            'default'           => __( 'About Author', 'blossom-travel' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'author_title',
        array(
            'type'    => 'text',
            'section' => 'post_page_settings',
            'label'   => __( 'Author Section Title', 'blossom-travel' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'author_title', array(
        'selector' => '.author-section h3.author-name',
        'render_callback' => 'blossom_travel_get_author_title',
    ) );
    
    /** Show Related Posts */
    $wp_customize->add_setting( 
        'ed_related', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Toggle_Control( 
            $wp_customize,
            'ed_related',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Show Related Posts', 'blossom-travel' ),
                'description' => __( 'Enable to show related posts in single page.', 'blossom-travel' ),
            )
        )
    );
    
    /** Related Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => __( 'You might also enjoy:', 'blossom-travel' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'            => 'text',
            'section'         => 'post_page_settings',
            'label'           => __( 'Related Posts Section Title', 'blossom-travel' ),
            'active_callback' => 'blossom_travel_post_page_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector' => '.additional-post .post-title',
        'render_callback' => 'blossom_travel_get_related_title',
    ) );
    
    /** Comments */
    $wp_customize->add_setting(
        'ed_comments',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_travel_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Toggle_Control( 
            $wp_customize,
            'ed_comments',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Show Comments', 'blossom-travel' ),
                'description' => __( 'Enable to hide Comments.', 'blossom-travel' ),
            )
        )
    );
    
    /** Hide Category */
    $wp_customize->add_setting( 
        'ed_category', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Toggle_Control( 
            $wp_customize,
            'ed_category',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Hide Category', 'blossom-travel' ),
                'description' => __( 'Enable to hide category.', 'blossom-travel' ),
            )
        )
    );
    
    /** Hide Post Author */
    $wp_customize->add_setting( 
        'ed_post_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Toggle_Control( 
            $wp_customize,
            'ed_post_author',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Hide Post Author', 'blossom-travel' ),
                'description' => __( 'Enable to hide post author.', 'blossom-travel' ),
            )
        )
    );
    
    /** Hide Posted Date */
    $wp_customize->add_setting( 
        'ed_post_date', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Toggle_Control( 
            $wp_customize,
            'ed_post_date',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Hide Posted Date', 'blossom-travel' ),
                'description' => __( 'Enable to hide posted date.', 'blossom-travel' ),
            )
        )
    );
    
    /** Show Featured Image */
    $wp_customize->add_setting( 
        'ed_featured_image', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Toggle_Control( 
            $wp_customize,
            'ed_featured_image',
            array(
                'section'         => 'post_page_settings',
                'label'           => __( 'Show Featured Image', 'blossom-travel' ),
                'description'     => __( 'Enable to show featured image in post detail (single post).', 'blossom-travel' ),
                'active_callback' => 'blossom_travel_post_page_ac'
            )
        )
    );
    /** Posts(Blog) & Pages Settings Ends */

    /** Miscellaneous Settings */
    $wp_customize->add_section(
        'misc_settings',
        array(
            'title'    => __( 'Misc Settings', 'blossom-travel' ),
            'priority' => 85,
            'panel'    => 'general_settings',
        )
    );

    /** Shop Page Description */
    $wp_customize->add_setting( 
        'ed_shop_archive_description', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Toggle_Control( 
            $wp_customize,
            'ed_shop_archive_description',
            array(
                'section'         => 'misc_settings',
                'label'           => __( 'Shop Page Description', 'blossom-travel' ),
                'description'     => __( 'Enable to show Shop Page Description.', 'blossom-travel' ),
                'active_callback' => 'blossom_travel_is_woocommerce_activated'
            )
        )
    );

    /** Related Portfolio */
    $wp_customize->add_setting(
        'related_portfolio_title',
        array(
            'default'           => __( 'Related Projects', 'blossom-travel' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'related_portfolio_title',
        array(
            'label'       => __( 'Related Portfolio Title', 'blossom-travel' ),
            'section'     => 'misc_settings',
            'type'        => 'text',
            'active_callback' => 'blossom_travel_is_bttk_activated'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_portfolio_title', array(
        'selector' => '.related-portfolio .related-portfolio-title',
        'render_callback' => 'blossom_travel_get_related_portfolio_title',
    ) );
}
add_action( 'customize_register', 'blossom_travel_customize_register_general' );