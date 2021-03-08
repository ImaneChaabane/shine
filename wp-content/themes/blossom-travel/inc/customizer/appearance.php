<?php
/**
 * Appearance Settings
 *
 * @package Blossom_Travel
 */

function blossom_travel_customize_register_appearance( $wp_customize ) {
    
    $wp_customize->add_panel( 
        'appearance_settings', 
        array(
            'title'       => __( 'Appearance Settings', 'blossom-travel' ),
            'priority'    => 25,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Customize Typography, Background Image & Color.', 'blossom-travel' ),
        ) 
    );

    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color', 
        array(
            'default'           => '#e4bfb6',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color', 
            array(
                'label'       => __( 'Primary Color', 'blossom-travel' ),
                'description' => __( 'Primary color of the theme.', 'blossom-travel' ),
                'section'     => 'colors',
                'priority'    => 5,
            )
        )
    );

     /** Secondary Color*/
    $wp_customize->add_setting( 
        'secondary_color', 
        array(
            'default'           => '#d18f7f',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'secondary_color', 
            array(
                'label'       => __( 'Secondary Color', 'blossom-travel' ),
                'description' => __( 'Secondary color of the theme.', 'blossom-travel' ),
                'section'     => 'colors',
                'priority'    => 5,
            )
        )
    );

    /** Typography */
    $wp_customize->add_section(
        'typography_settings',
        array(
            'title'    => __( 'Typography', 'blossom-travel' ),
            'priority' => 20,
            'panel'    => 'appearance_settings',
        )
    ); 

    /** Primary Font */
    $wp_customize->add_setting(
        'primary_font',
        array(
            'default'           => 'Montserrat',
            'sanitize_callback' => 'blossom_travel_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Travel_Select_Control(
            $wp_customize,
            'primary_font',
            array(
                'label'       => __( 'Primary Font', 'blossom-travel' ),
                'description' => __( 'Primary font of the site.', 'blossom-travel' ),
                'section'     => 'typography_settings',
                'choices'     => blossom_travel_get_all_fonts(),    
            )
        )
    );
    
    /** Secondary Font */
    $wp_customize->add_setting(
        'secondary_font',
        array(
            'default'           => 'Cormorant Garamond',
            'sanitize_callback' => 'blossom_travel_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Travel_Select_Control(
            $wp_customize,
            'secondary_font',
            array(
                'label'       => __( 'Secondary Font', 'blossom-travel' ),
                'description' => __( 'Secondary font of the site.', 'blossom-travel' ),
                'section'     => 'typography_settings',
                'choices'     => blossom_travel_get_all_fonts(),    
            )
        )
    ); 
    
    /** Move Background Image section to appearance panel */
    $wp_customize->get_section( 'colors' )->panel                          = 'appearance_settings';
    $wp_customize->get_section( 'colors' )->priority                       = 10;
    $wp_customize->get_section( 'background_image' )->panel                = 'appearance_settings';
    $wp_customize->get_section( 'background_image' )->priority             = 15;
    
}
add_action( 'customize_register', 'blossom_travel_customize_register_appearance' );