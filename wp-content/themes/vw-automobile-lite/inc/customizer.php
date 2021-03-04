<?php
/**
 * VW Automobile Lite Theme Customizer
 *
 * @package VW Automobile Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_automobile_lite_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_automobile_lite_custom_controls' );

function vw_automobile_lite_customize_register($wp_customize) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_automobile_lite_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_automobile_lite_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWAutomobileLiteParentPanel = new VW_Automobile_Lite_WP_Customize_Panel( $wp_customize, 'vw_automobile_lite_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title'    => esc_html__('VW Settings', 'vw-automobile-lite'),
		'priority' => 10,
	));

	$wp_customize->add_section('vw_automobile_lite_left_right', array(
		'title'    => esc_html__('General Settings', 'vw-automobile-lite'),
		'priority' => 30,
		'panel'    => 'vw_automobile_lite_panel_id',
	));

	$wp_customize->add_setting('vw_automobile_lite_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Automobile_Lite_Image_Radio_Control($wp_customize, 'vw_automobile_lite_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-automobile-lite'),
        'description' => __('Here you can change the width layout of Website.','vw-automobile-lite'),
        'section' => 'vw_automobile_lite_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_automobile_lite_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_automobile_lite_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-automobile-lite'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-automobile-lite'),
        'section' => 'vw_automobile_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-automobile-lite'),
            'Right Sidebar' => __('Right Sidebar','vw-automobile-lite'),
            'One Column' => __('One Column','vw-automobile-lite'),
            'Three Columns' => __('Three Columns','vw-automobile-lite'),
            'Four Columns' => __('Four Columns','vw-automobile-lite'),
            'Grid Layout' => __('Grid Layout','vw-automobile-lite')
        ),
	));

	$wp_customize->add_setting('vw_automobile_lite_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'
	));
	$wp_customize->add_control('vw_automobile_lite_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-automobile-lite'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-automobile-lite'),
        'section' => 'vw_automobile_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-automobile-lite'),
            'Right Sidebar' => __('Right Sidebar','vw-automobile-lite'),
            'One Column' => __('One Column','vw-automobile-lite')
        ),
	));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_automobile_lite_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-automobile-lite' ),
        'section' => 'vw_automobile_lite_left_right'
    )));

    $wp_customize->add_setting('vw_automobile_lite_loader_icon',array(
        'default' => 'Two Way',
        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'
	));
	$wp_customize->add_control('vw_automobile_lite_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-automobile-lite'),
        'section' => 'vw_automobile_lite_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-automobile-lite'),
            'Dots' => __('Dots','vw-automobile-lite'),
            'Rotate' => __('Rotate','vw-automobile-lite')
        ),
	));

	//Topbar section
	$wp_customize->add_section('vw_automobile_lite_topbar_icon', array(
		'title'       => __('Topbar Section', 'vw-automobile-lite'),
		'description' => __('Add Top Header Content here', 'vw-automobile-lite'),
		'priority'    => null,
		'panel'       => 'vw_automobile_lite_panel_id',
	));

    $wp_customize->add_setting('vw_automobile_lite_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_topbar_icon',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_automobile_lite_search_hide_show',
       array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_search_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Search','vw-automobile-lite' ),
      'section' => 'vw_automobile_lite_topbar_icon'
    )));

    $wp_customize->add_setting('vw_automobile_lite_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Automobile_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_automobile_lite_search_icon',array(
		'label'	=> __('Add Search Icon','vw-automobile-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_automobile_lite_topbar_icon',
		'setting'	=> 'vw_automobile_lite_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_automobile_lite_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Automobile_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_automobile_lite_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','vw-automobile-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_automobile_lite_topbar_icon',
		'setting'	=> 'vw_automobile_lite_search_close_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('vw_automobile_lite_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_search_font_size',array(
		'label'	=> __('Search Font Size','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_topbar_icon',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_topbar_icon',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_topbar_icon',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_automobile_lite_search_border_radius', array(
		'default'              => "",
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_automobile_lite_sanitize_number_range'
	));
	$wp_customize->add_control( 'vw_automobile_lite_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-automobile-lite' ),
		'section'     => 'vw_automobile_lite_topbar_icon',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_automobile_lite_contact',array( 
		'selector' => '#header .top-contact span.call', 
		'render_callback' => 'vw_automobile_lite_customize_partial_vw_automobile_lite_contact', 
	));

    $wp_customize->add_setting('vw_automobile_lite_phone_icon',array(
		'default'	=> 'fa fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Automobile_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_automobile_lite_phone_icon',array(
		'label'	=> __('Add Phone Number Icon','vw-automobile-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_automobile_lite_topbar_icon',
		'setting'	=> 'vw_automobile_lite_phone_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_automobile_lite_contact', array(
		'default'           => '',
		'sanitize_callback' => 'vw_automobile_lite_sanitize_phone_number',
	));

	$wp_customize->add_control('vw_automobile_lite_contact', array(
		'label'   => __('Add Phone Number', 'vw-automobile-lite'),
		'section' => 'vw_automobile_lite_topbar_icon',
		'setting' => 'vw_automobile_lite_contact',
		'type'    => 'text',
	));

	$wp_customize->add_setting('vw_automobile_lite_cont_email_icon',array(
		'default'	=> 'fas fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Automobile_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_automobile_lite_cont_email_icon',array(
		'label'	=> __('Add Email address Icon','vw-automobile-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_automobile_lite_topbar_icon',
		'setting'	=> 'vw_automobile_lite_cont_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_automobile_lite_email', array(
		'default'           => '',
		'sanitize_callback' => 'vw_automobile_lite_sanitize_email',
	));
	$wp_customize->add_control('vw_automobile_lite_email', array(
		'label'   => __('Add Email', 'vw-automobile-lite'),
		'section' => 'vw_automobile_lite_topbar_icon',
		'setting' => 'vw_automobile_lite_email',
		'type'    => 'text',
	));

	$wp_customize->add_setting('vw_automobile_lite_headertiming_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Automobile_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_automobile_lite_headertiming_icon',array(
		'label'	=> __('Add Timing Icon','vw-automobile-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_automobile_lite_topbar_icon',
		'setting'	=> 'vw_automobile_lite_headertiming_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_automobile_lite_headertimings', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_automobile_lite_headertimings', array(
		'label'   => __('Add Timing', 'vw-automobile-lite'),
		'section' => 'vw_automobile_lite_topbar_icon',
		'setting' => 'vw_automobile_lite_headertimings',
		'type'    => 'text',
	));

	//home page slider
    $wp_customize->add_section( 'vw_automobile_lite_slidersettings' , array(
      'title'      => __( 'Slider Settings', 'vw-automobile-lite' ),
      'priority'   => null,
      'panel' => 'vw_automobile_lite_panel_id'
    ));

    $wp_customize->add_setting( 'vw_automobile_lite_slider_hide_show', array(
      	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_slider_hide_show', array(
      'label' => esc_html__( 'Show / Hide Slider','vw-automobile-lite' ),
      'section' => 'vw_automobile_lite_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_automobile_lite_slider_hide_show',array(
		'selector'        => '.slider .inner_carousel h1',
		'render_callback' => 'vw_automobile_lite_customize_partial_vw_automobile_lite_slider_hide_show',
	));

    for ( $count = 1; $count <= 4; $count++ ) {
	    $wp_customize->add_setting( 'vw_automobile_lite_slider_page' . $count, array(
	      'default'           => '',
	      'sanitize_callback' => 'vw_automobile_lite_sanitize_dropdown_pages'
	    ));
	    $wp_customize->add_control( 'vw_automobile_lite_slider_page' . $count, array(
	      'label'    => __( 'Select Slide Image Page', 'vw-automobile-lite' ),
	      'description' => __('Slider image size (1500 x 765)','vw-automobile-lite'),
	      'section'  => 'vw_automobile_lite_slidersettings',
	      'type'     => 'dropdown-pages'
	    ));
    }

    $wp_customize->add_setting('vw_automobile_lite_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'DISCOVER MORE', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_slidersettings',
		'type'=> 'text'
	));

    //content layout
	$wp_customize->add_setting('vw_automobile_lite_slider_content_option',array(
        'default' => 'Center',
        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Automobile_Lite_Image_Radio_Control($wp_customize, 'vw_automobile_lite_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-automobile-lite'),
        'section' => 'vw_automobile_lite_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_automobile_lite_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_automobile_lite_sanitize_number_range'
	));
	$wp_customize->add_control( 'vw_automobile_lite_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-automobile-lite' ),
		'section'     => 'vw_automobile_lite_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_automobile_lite_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	));

	//Opacity
	$wp_customize->add_setting('vw_automobile_lite_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_automobile_lite_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-automobile-lite' ),
	'section'     => 'vw_automobile_lite_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_automobile_lite_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-automobile-lite'),
      '0.1' =>  esc_attr('0.1','vw-automobile-lite'),
      '0.2' =>  esc_attr('0.2','vw-automobile-lite'),
      '0.3' =>  esc_attr('0.3','vw-automobile-lite'),
      '0.4' =>  esc_attr('0.4','vw-automobile-lite'),
      '0.5' =>  esc_attr('0.5','vw-automobile-lite'),
      '0.6' =>  esc_attr('0.6','vw-automobile-lite'),
      '0.7' =>  esc_attr('0.7','vw-automobile-lite'),
      '0.8' =>  esc_attr('0.8','vw-automobile-lite'),
      '0.9' =>  esc_attr('0.9','vw-automobile-lite')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_automobile_lite_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_slider_height',array(
		'label'	=> __('Slider Height','vw-automobile-lite'),
		'description'	=> __('Specify the slider height (px).','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_automobile_lite_slider_speed', array(
		'default'  => 3000,
		'sanitize_callback'	=> 'vw_automobile_lite_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_automobile_lite_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-automobile-lite'),
		'section' => 'vw_automobile_lite_slidersettings',
		'type'  => 'number',
	) );

	//Our Services
	$wp_customize->add_section('vw_automobile_lite_choose_us', array(
		'title'       => __('Choose Us Section', 'vw-automobile-lite'),
		'description' => '',
		'priority'    => null,
		'panel'       => 'vw_automobile_lite_panel_id',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_automobile_lite_title', array( 
		'selector' => '.heading-line h2', 
		'render_callback' => 'vw_automobile_lite_customize_partial_vw_automobile_lite_title',
	));

	$wp_customize->add_setting('vw_automobile_lite_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_automobile_lite_title', array(
		'label'   => __('Title', 'vw-automobile-lite'),
		'section' => 'vw_automobile_lite_choose_us',
		'type'    => 'text',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cats[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_automobile_lite_choose_us_category', array(
		'default'           => 'select',
		'sanitize_callback' => 'vw_automobile_lite_sanitize_choices',
	));
	$wp_customize->add_control('vw_automobile_lite_choose_us_category', array(
		'type'    => 'select',
		'choices' => $cats,
		'label'   => __('Select Category to display Latest Post', 'vw-automobile-lite'),
		'section' => 'vw_automobile_lite_choose_us',
	));

	//Services excerpt
	$wp_customize->add_setting( 'vw_automobile_lite_services_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_automobile_lite_sanitize_number_range'
	));
	$wp_customize->add_control( 'vw_automobile_lite_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt length','vw-automobile-lite' ),
		'section'     => 'vw_automobile_lite_choose_us',
		'type'        => 'range',
		'settings'    => 'vw_automobile_lite_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	));

	//Blog Post
	$wp_customize->add_panel( $VWAutomobileLiteParentPanel );

	$BlogPostParentPanel = new VW_Automobile_Lite_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-automobile-lite' ),
		'panel' => 'vw_automobile_lite_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_automobile_lite_post_settings', array(
		'title' => __( 'Post Settings', 'vw-automobile-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_automobile_lite_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_automobile_lite_customize_partial_vw_automobile_lite_toggle_postdate', 
	));

	$wp_customize->add_setting('vw_automobile_lite_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Automobile_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_automobile_lite_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-automobile-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_automobile_lite_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_automobile_lite_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-automobile-lite' ),
        'section' => 'vw_automobile_lite_post_settings'
    )));

    $wp_customize->add_setting('vw_automobile_lite_toggle_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Automobile_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_automobile_lite_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vw-automobile-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_automobile_lite_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_automobile_lite_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_toggle_author',array(
		'label' => esc_html__( 'Author','vw-automobile-lite' ),
		'section' => 'vw_automobile_lite_post_settings'
    )));

    $wp_customize->add_setting('vw_automobile_lite_toggle_comments_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Automobile_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_automobile_lite_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-automobile-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_automobile_lite_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_automobile_lite_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-automobile-lite' ),
		'section' => 'vw_automobile_lite_post_settings'
    )));

    $wp_customize->add_setting( 'vw_automobile_lite_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_automobile_lite_sanitize_number_range'
	));
	$wp_customize->add_control( 'vw_automobile_lite_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-automobile-lite' ),
		'section'     => 'vw_automobile_lite_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_automobile_lite_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	));

	//Blog layout
    $wp_customize->add_setting('vw_automobile_lite_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Automobile_Lite_Image_Radio_Control($wp_customize, 'vw_automobile_lite_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-automobile-lite'),
        'section' => 'vw_automobile_lite_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_automobile_lite_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'
	));
	$wp_customize->add_control('vw_automobile_lite_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-automobile-lite'),
        'section' => 'vw_automobile_lite_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-automobile-lite'),
            'Excerpt' => __('Excerpt','vw-automobile-lite'),
            'No Content' => __('No Content','vw-automobile-lite')
        ),
	));

	$wp_customize->add_setting('vw_automobile_lite_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_automobile_lite_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-automobile-lite' ),
      'section' => 'vw_automobile_lite_post_settings'
    )));

	$wp_customize->add_setting( 'vw_automobile_lite_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_automobile_lite_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_automobile_lite_blog_pagination_type', array(
        'section' => 'vw_automobile_lite_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-automobile-lite' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-automobile-lite' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-automobile-lite' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_automobile_lite_button_settings', array(
		'title' => __( 'Button Settings', 'vw-automobile-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_automobile_lite_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_automobile_lite_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_automobile_lite_sanitize_number_range'
	));
	$wp_customize->add_control( 'vw_automobile_lite_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-automobile-lite' ),
		'section'     => 'vw_automobile_lite_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_automobile_lite_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_automobile_lite_customize_partial_vw_automobile_lite_button_text', 
	));

	$wp_customize->add_setting('vw_automobile_lite_button_text',array(
		'default'=> esc_html__('READ MORE','vw-automobile-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_button_text',array(
		'label'	=> __('Add Blog Button Text','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_automobile_lite_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-automobile-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_automobile_lite_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_automobile_lite_customize_partial_vw_automobile_lite_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_automobile_lite_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_related_post',array(
		'label' => esc_html__( 'Related Post','vw-automobile-lite' ),
		'section' => 'vw_automobile_lite_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_automobile_lite_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_automobile_lite_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_automobile_lite_sanitize_float'
	));
	$wp_customize->add_control('vw_automobile_lite_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_automobile_lite_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-automobile-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_automobile_lite_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-automobile-lite' ),
		'section' => 'vw_automobile_lite_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_automobile_lite_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-automobile-lite' ),
		'section' => 'vw_automobile_lite_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_automobile_lite_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_automobile_lite_404_page',array(
		'title'	=> __('404 Page Settings','vw-automobile-lite'),
		'panel' => 'vw_automobile_lite_panel_id',
	));	

	$wp_customize->add_setting('vw_automobile_lite_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_404_page_title',array(
		'label'	=> __('Add Title','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_404_page_content',array(
		'label'	=> __('Add Text','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Back to Home Page', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_404_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_automobile_lite_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-automobile-lite'),
		'panel' => 'vw_automobile_lite_panel_id',
	));	

	$wp_customize->add_setting('vw_automobile_lite_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_social_icon_width',array(
		'label'	=> __('Icon Width','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_social_icon_height',array(
		'label'	=> __('Icon Height','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_automobile_lite_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_automobile_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_automobile_lite_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-automobile-lite' ),
		'section'     => 'vw_automobile_lite_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_automobile_lite_responsive_media',array(
		'title'	=> __('Responsive Media','vw-automobile-lite'),
		'panel' => 'vw_automobile_lite_panel_id',
	));

    $wp_customize->add_setting( 'vw_automobile_lite_resp_slider_hide_show',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-automobile-lite' ),
      'section' => 'vw_automobile_lite_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_automobile_lite_metabox_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_metabox_hide_show',array(
      'label' => esc_html__( 'Show / Hide Metabox','vw-automobile-lite' ),
      'section' => 'vw_automobile_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_automobile_lite_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-automobile-lite' ),
      'section' => 'vw_automobile_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_automobile_lite_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-automobile-lite' ),
      'section' => 'vw_automobile_lite_responsive_media'
    )));

    $wp_customize->add_setting('vw_automobile_lite_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Automobile_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_automobile_lite_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-automobile-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_automobile_lite_responsive_media',
		'setting'	=> 'vw_automobile_lite_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_automobile_lite_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Automobile_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_automobile_lite_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-automobile-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_automobile_lite_responsive_media',
		'setting'	=> 'vw_automobile_lite_res_close_menu_icon',
		'type'		=> 'icon'
	)));
	
	//Footer
	$wp_customize->add_section('vw_automobile_lite_footer', array(
		'title'       => __('Footer Section', 'vw-automobile-lite'),
		'description' => '',
		'priority'    => null,
		'panel'       => 'vw_automobile_lite_panel_id',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_automobile_lite_footer_copy', array( 
		'selector' => '.footer-2 p', 
		'render_callback' => 'vw_automobile_lite_customize_partial_vw_automobile_lite_footer_copy', 
	));

	$wp_customize->add_setting('vw_automobile_lite_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_automobile_lite_footer_copy', array(
		'label'   => __('Copyright Text', 'vw-automobile-lite'),
		'section' => 'vw_automobile_lite_footer',
		'type'    => 'text',
	));

	$wp_customize->add_setting('vw_automobile_lite_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Automobile_Lite_Image_Radio_Control($wp_customize, 'vw_automobile_lite_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-automobile-lite'),
        'section' => 'vw_automobile_lite_footer',
        'settings' => 'vw_automobile_lite_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_automobile_lite_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_automobile_lite_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-automobile-lite' ),
      	'section' => 'vw_automobile_lite_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_automobile_lite_scroll_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_automobile_lite_customize_partial_vw_automobile_lite_scroll_top_icon', 
	));

    $wp_customize->add_setting('vw_automobile_lite_scroll_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Automobile_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_automobile_lite_scroll_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-automobile-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_automobile_lite_footer',
		'setting'	=> 'vw_automobile_lite_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_automobile_lite_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_automobile_lite_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_automobile_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_automobile_lite_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-automobile-lite' ),
		'section'     => 'vw_automobile_lite_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_automobile_lite_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Automobile_Lite_Image_Radio_Control($wp_customize, 'vw_automobile_lite_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-automobile-lite'),
        'section' => 'vw_automobile_lite_footer',
        'settings' => 'vw_automobile_lite_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vw_automobile_lite_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-automobile-lite'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_automobile_lite_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-automobile-lite' ),
		'section' => 'vw_automobile_lite_woocommerce_section'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_automobile_lite_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-automobile-lite' ),
		'section' => 'vw_automobile_lite_woocommerce_section'
    )));

    //Related Products
	$wp_customize->add_setting( 'vw_automobile_lite_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_related_product_show_hide',array(
        'label' => esc_html__( 'Related product','vw-automobile-lite' ),
        'section' => 'vw_automobile_lite_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('vw_automobile_lite_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_automobile_lite_sanitize_float'
	));
	$wp_customize->add_control('vw_automobile_lite_products_per_page',array(
		'label'	=> __('Products Per Page','vw-automobile-lite'),
		'description' => __('Display on shop page','vw-automobile-lite'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_automobile_lite_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_automobile_lite_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_automobile_lite_sanitize_choices'
	));
	$wp_customize->add_control('vw_automobile_lite_products_per_row',array(
		'label'	=> __('Products Per Row','vw-automobile-lite'),
		'description' => __('Display on shop page','vw-automobile-lite'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_automobile_lite_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_automobile_lite_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_automobile_lite_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-automobile-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-automobile-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-automobile-lite' ),
        ),
		'section'=> 'vw_automobile_lite_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_automobile_lite_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_automobile_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_automobile_lite_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-automobile-lite' ),
		'section'     => 'vw_automobile_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_automobile_lite_products_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_automobile_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_automobile_lite_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-automobile-lite' ),
		'section'     => 'vw_automobile_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Automobile_Lite_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Automobile_Lite_WP_Customize_Section' );
}

add_action('customize_register', 'vw_automobile_lite_customize_register');

load_template(trailingslashit(get_template_directory()).'/inc/logo-resizer.php');

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Automobile_Lite_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_automobile_lite_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Automobile_Lite_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_automobile_lite_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_automobile_lite_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_automobile_lite_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Automobile_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the controls.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager) {

		// Load custom sections.
		load_template(trailingslashit(get_template_directory()).'/inc/section-pro.php');

		// Register custom section types.
		$manager->register_section_type('VW_Automobile_Lite_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(new VW_Automobile_Lite_Customize_Section_Pro($manager,'vw_automobile_lite_upgrade_pro_link',array(
			'priority' => 1,
			'title'    => esc_html__('VW Automobile Pro', 'vw-automobile-lite'),
			'pro_text' => esc_html__('Upgrade Pro', 'vw-automobile-lite'),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/automobile-wordpress-theme/')
		)));

		// Register sections.
		$manager->add_section(new VW_Automobile_Lite_Customize_Section_Pro($manager,'vw_automobile_lite_get_started_link',array(
			'priority' => 1,
			'title'    => esc_html__('Documentation', 'vw-automobile-lite'),
			'pro_text' => esc_html__('Docs', 'vw-automobile-lite'),
			'pro_url'  => esc_url('themes.php?page=vw_automobile_lite_guide')
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script('vw-automobile-lite-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/js/customize-controls.js', array('customize-controls'));

		wp_enqueue_style('vw-automobile-lite-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
VW_Automobile_Lite_Customize::get_instance();