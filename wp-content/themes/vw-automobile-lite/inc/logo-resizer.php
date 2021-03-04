<?php
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_automobile_lite_logo_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'logo_size', array(
		'default'              => 50,
		'theme_supports'       => 'custom-logo',
		'transport'            => 'postMessage',
		'sanitize_callback'    => 'vw_automobile_lite_sanitize_number_range'
	) );

	$wp_customize->add_control( 'logo_size', array(
		'label'       => esc_html__( 'Logo Size','vw-automobile-lite' ),
		'section'     => 'title_tagline',
		'priority'    => 9,
		'type'        => 'range',
		'settings'    => 'logo_size',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 100,
			'aria-valuemin'    => 0,
			'aria-valuemax'    => 100,
			'aria-valuenow'    => 50,
			'aria-orientation' => 'horizontal',
		),
	) );

	$wp_customize->add_setting( 'vw_automobile_lite_logo_title_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_logo_title_hide_show',array(
      'label' => esc_html__( 'Show / Hide Site Title','vw-automobile-lite' ),
      'priority'    => 10,
      'section' => 'title_tagline'
    )));

    $wp_customize->add_setting( 'vw_automobile_lite_tagline_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_automobile_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Automobile_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_automobile_lite_tagline_hide_show',array(
      'label' => esc_html__( 'Show / Hide Site Tagline','vw-automobile-lite' ),
      'priority'    => 11,
      'section' => 'title_tagline'
    )));
}
add_action( 'customize_register', 'vw_automobile_lite_logo_customize_register' );

/**
 * Add support for logo resizing by filtering `get_custom_logo`
 */
function vw_automobile_lite_customize_logo_resize( $html ) {
	$size = get_theme_mod( 'logo_size' );
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$min = 48;

	if ( is_numeric( $size ) && is_numeric( $custom_logo_id ) ) {

		$logo = wp_get_attachment_metadata( $custom_logo_id );
		if ( ! $logo ) return $html;

		$sizes = get_theme_support( 'custom-logo' );

		$max['height'] = isset( $sizes[0]['height'] ) ? $sizes[0]['height'] : $logo['height'];
		$max['width'] = isset( $sizes[0]['width'] ) ? $sizes[0]['width'] : $logo['width'];

		if ( $logo['width'] >= $logo['height'] ) {
			$output = vw_automobile_lite_min_max( $logo['height'], $logo['width'], $max['height'], $max['width'], $size, $min );
			$img = array(
				'height'	=> $output['short'],
				'width'		=> $output['long']
			);
		} else if ( $logo['width'] < $logo['height'] ) {
			$output = vw_automobile_lite_min_max( $logo['width'], $logo['height'], $max['width'], $max['height'], $size, $min );
			$img = array(
				'height'	=> $output['long'],
				'width'		=> $output['short']
			);
		}

		$css = '
<style>
.custom-logo {
	height: ' . $img['height'] . 'px;
	max-height: ' . $max['height'] . 'px;
	max-width: ' . $max['width'] . 'px;
	width: ' . $img['width'] . 'px;
}
</style>';

		$html = $css . $html;
	}

	return $html;
}
add_filter( 'get_custom_logo', 'vw_automobile_lite_customize_logo_resize' );

function vw_automobile_lite_min_max( $short, $long, $short_max, $long_max, $percent, $min ){
	$ratio = ( $long / $short );
	$max['long'] = ( $long_max >= $long ) ? $long : $long_max;
	$max['short'] = ( $short_max >= ( $max['long'] / $ratio ) ) ? floor( $max['long'] / $ratio ) : $short_max;

	$ppp = ( $max['short'] - $min ) / 100;

	$size['short'] = round( $min + ( $percent * $ppp ) );
	$size['long'] = round( $size['short'] / ( $short / $long ) );

	return $size;
}

function vw_automobile_lite_customize_preview_js() {
	wp_enqueue_script( 'vw-automobile-lite-customizer', esc_url(get_template_directory_uri()) . '/js/logo/customize-preview.js', array( 'jquery', 'customize-preview' ), '201709081119', true );
}
add_action( 'customize_preview_init', 'vw_automobile_lite_customize_preview_js' );

function vw_automobile_lite_customize_controls_js() {
	wp_enqueue_script( 'vw-automobile-lite-customizer-controls', esc_url(get_template_directory_uri()) . '/js/logo/customize-controls.js', array( 'jquery', 'customize-preview' ), '201709071000', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_automobile_lite_customize_controls_js' );

function vw_automobile_lite_customize_css() {
	wp_add_inline_style( 'customize-controls', '#customize-control-logo_size input[type=range] { width: 100%; }' );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_automobile_lite_customize_css' );

function vw_automobile_lite_remove_theme_mod() {
	if ( isset( $_GET['remove_logo_size'] ) && 'true' == $_GET['remove_logo_size'] ){
		set_theme_mod( 'logo_size', '' );
	}
}
add_action( 'wp_loaded', 'vw_automobile_lite_remove_theme_mod' );
