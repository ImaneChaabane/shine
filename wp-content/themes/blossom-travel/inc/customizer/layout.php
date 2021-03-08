<?php
/**
 * Layout Settings
 *
 * @package Blossom_Travel
 */

function blossom_travel_customize_register_layout( $wp_customize ) {
    
    /** Layout Settings */
    $wp_customize->add_panel( 
        'layout_settings',
         array(
            'priority'    => 30,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Layout Settings', 'blossom-travel' ),
            'description' => __( 'Change different page layout from here.', 'blossom-travel' ),
        ) 
    );

    /** Header Layout Settings */
    $wp_customize->add_section(
        'header_layout_settings',
        array(
            'title'    => __( 'Header Layout', 'blossom-travel' ),
            'priority' => 10,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'header_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_travel_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Radio_Image_Control(
            $wp_customize,
            'header_layout',
            array(
                'section'     => 'header_layout_settings',
                'label'       => __( 'Header Layout', 'blossom-travel' ),
                'description' => __( 'Choose the layout of the header for your site.', 'blossom-travel' ),
                'choices'     => array(
                    'one'   => esc_url( get_template_directory_uri() . '/images/header/one.jpg' ),
                    'two'   => esc_url( get_template_directory_uri() . '/images/header/two.jpg' ),
                )
            )
        )
    );

    /** Home Page Layout Settings */
    $wp_customize->add_section(
        'general_layout_settings',
        array(
            'title'    => __( 'General Sidebar Layout', 'blossom-travel' ),
            'priority' => 55,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'page_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'blossom_travel_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Radio_Image_Control(
            $wp_customize,
            'page_sidebar_layout',
            array(
                'section'     => 'general_layout_settings',
                'label'       => __( 'Page Sidebar Layout', 'blossom-travel' ),
                'description' => __( 'This is the general sidebar layout for pages. You can override the sidebar layout for individual page in respective page.', 'blossom-travel' ),
                'choices'     => array(
                    'no-sidebar'    => esc_url( get_template_directory_uri() . '/images/1c.jpg' ),
                    'centered'      => esc_url( get_template_directory_uri() . '/images/1cc.jpg' ),
                    'left-sidebar'  => esc_url( get_template_directory_uri() . '/images/2cl.jpg' ),
                    'right-sidebar' => esc_url( get_template_directory_uri() . '/images/2cr.jpg' ),
                )
            )
        )
    );
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'post_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'blossom_travel_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Radio_Image_Control(
            $wp_customize,
            'post_sidebar_layout',
            array(
                'section'     => 'general_layout_settings',
                'label'       => __( 'Post Sidebar Layout', 'blossom-travel' ),
                'description' => __( 'This is the general sidebar layout for posts & custom post. You can override the sidebar layout for individual post in respective post.', 'blossom-travel' ),
                'choices'     => array(
                    'no-sidebar'    => esc_url( get_template_directory_uri() . '/images/1c.jpg' ),
                    'centered'      => esc_url( get_template_directory_uri() . '/images/1cc.jpg' ),
                    'left-sidebar'  => esc_url( get_template_directory_uri() . '/images/2cl.jpg' ),
                    'right-sidebar' => esc_url( get_template_directory_uri() . '/images/2cr.jpg' ),
                )
            )
        )
    );
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'layout_style', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'blossom_travel_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Travel_Radio_Image_Control(
            $wp_customize,
            'layout_style',
            array(
                'section'     => 'general_layout_settings',
                'label'       => __( 'Default Sidebar Layout', 'blossom-travel' ),
                'description' => __( 'This is the general sidebar layout for whole site.', 'blossom-travel' ),
                'choices'     => array(
                    'no-sidebar'    => esc_url( get_template_directory_uri() . '/images/1c.jpg' ),
                    'left-sidebar'  => esc_url( get_template_directory_uri() . '/images/2cl.jpg' ),
                    'right-sidebar' => esc_url( get_template_directory_uri() . '/images/2cr.jpg' ),
                )
            )
        )
    );
}
add_action( 'customize_register', 'blossom_travel_customize_register_layout' );