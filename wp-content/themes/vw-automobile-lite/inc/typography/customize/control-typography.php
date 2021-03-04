<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Automobile_Lite_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-automobile-lite' ),
				'family'      => esc_html__( 'Font Family', 'vw-automobile-lite' ),
				'size'        => esc_html__( 'Font Size',   'vw-automobile-lite' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-automobile-lite' ),
				'style'       => esc_html__( 'Font Style',  'vw-automobile-lite' ),
				'line_height' => esc_html__( 'Line Height', 'vw-automobile-lite' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-automobile-lite' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-automobile-lite-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-automobile-lite-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-automobile-lite' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-automobile-lite' ),
        'Acme' => __( 'Acme', 'vw-automobile-lite' ),
        'Anton' => __( 'Anton', 'vw-automobile-lite' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-automobile-lite' ),
        'Arimo' => __( 'Arimo', 'vw-automobile-lite' ),
        'Arsenal' => __( 'Arsenal', 'vw-automobile-lite' ),
        'Arvo' => __( 'Arvo', 'vw-automobile-lite' ),
        'Alegreya' => __( 'Alegreya', 'vw-automobile-lite' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-automobile-lite' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-automobile-lite' ),
        'Bangers' => __( 'Bangers', 'vw-automobile-lite' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-automobile-lite' ),
        'Bad Script' => __( 'Bad Script', 'vw-automobile-lite' ),
        'Bitter' => __( 'Bitter', 'vw-automobile-lite' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-automobile-lite' ),
        'BenchNine' => __( 'BenchNine', 'vw-automobile-lite' ),
        'Cabin' => __( 'Cabin', 'vw-automobile-lite' ),
        'Cardo' => __( 'Cardo', 'vw-automobile-lite' ),
        'Courgette' => __( 'Courgette', 'vw-automobile-lite' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-automobile-lite' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-automobile-lite' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-automobile-lite' ),
        'Cuprum' => __( 'Cuprum', 'vw-automobile-lite' ),
        'Cookie' => __( 'Cookie', 'vw-automobile-lite' ),
        'Chewy' => __( 'Chewy', 'vw-automobile-lite' ),
        'Days One' => __( 'Days One', 'vw-automobile-lite' ),
        'Dosis' => __( 'Dosis', 'vw-automobile-lite' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-automobile-lite' ),
        'Economica' => __( 'Economica', 'vw-automobile-lite' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-automobile-lite' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-automobile-lite' ),
        'Francois One' => __( 'Francois One', 'vw-automobile-lite' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-automobile-lite' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-automobile-lite' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-automobile-lite' ),
        'Handlee' => __( 'Handlee', 'vw-automobile-lite' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-automobile-lite' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-automobile-lite' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-automobile-lite' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-automobile-lite' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-automobile-lite' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-automobile-lite' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-automobile-lite' ),
        'Kanit' => __( 'Kanit', 'vw-automobile-lite' ),
        'Lobster' => __( 'Lobster', 'vw-automobile-lite' ),
        'Lato' => __( 'Lato', 'vw-automobile-lite' ),
        'Lora' => __( 'Lora', 'vw-automobile-lite' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-automobile-lite' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-automobile-lite' ),
        'Merriweather' => __( 'Merriweather', 'vw-automobile-lite' ),
        'Monda' => __( 'Monda', 'vw-automobile-lite' ),
        'Montserrat' => __( 'Montserrat', 'vw-automobile-lite' ),
        'Muli' => __( 'Muli', 'vw-automobile-lite' ),
        'Marck Script' => __( 'Marck Script', 'vw-automobile-lite' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-automobile-lite' ),
        'Open Sans' => __( 'Open Sans', 'vw-automobile-lite' ),
        'Overpass' => __( 'Overpass', 'vw-automobile-lite' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-automobile-lite' ),
        'Oxygen' => __( 'Oxygen', 'vw-automobile-lite' ),
        'Orbitron' => __( 'Orbitron', 'vw-automobile-lite' ),
        'Patua One' => __( 'Patua One', 'vw-automobile-lite' ),
        'Pacifico' => __( 'Pacifico', 'vw-automobile-lite' ),
        'Padauk' => __( 'Padauk', 'vw-automobile-lite' ),
        'Playball' => __( 'Playball', 'vw-automobile-lite' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-automobile-lite' ),
        'PT Sans' => __( 'PT Sans', 'vw-automobile-lite' ),
        'Philosopher' => __( 'Philosopher', 'vw-automobile-lite' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-automobile-lite' ),
        'Poiret One' => __( 'Poiret One', 'vw-automobile-lite' ),
        'Quicksand' => __( 'Quicksand', 'vw-automobile-lite' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-automobile-lite' ),
        'Raleway' => __( 'Raleway', 'vw-automobile-lite' ),
        'Rubik' => __( 'Rubik', 'vw-automobile-lite' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-automobile-lite' ),
        'Russo One' => __( 'Russo One', 'vw-automobile-lite' ),
        'Righteous' => __( 'Righteous', 'vw-automobile-lite' ),
        'Slabo' => __( 'Slabo', 'vw-automobile-lite' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-automobile-lite' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-automobile-lite'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-automobile-lite' ),
        'Sacramento' => __( 'Sacramento', 'vw-automobile-lite' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-automobile-lite' ),
        'Tangerine' => __( 'Tangerine', 'vw-automobile-lite' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-automobile-lite' ),
        'VT323' => __( 'VT323', 'vw-automobile-lite' ),
        'Varela Round' => __( 'Varela Round', 'vw-automobile-lite' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-automobile-lite' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-automobile-lite' ),
        'Volkhov' => __( 'Volkhov', 'vw-automobile-lite' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-automobile-lite' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-automobile-lite' ),
			'100' => esc_html__( 'Thin',       'vw-automobile-lite' ),
			'300' => esc_html__( 'Light',      'vw-automobile-lite' ),
			'400' => esc_html__( 'Normal',     'vw-automobile-lite' ),
			'500' => esc_html__( 'Medium',     'vw-automobile-lite' ),
			'700' => esc_html__( 'Bold',       'vw-automobile-lite' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-automobile-lite' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-automobile-lite' ),
			'italic'  => esc_html__( 'Italic', 'vw-automobile-lite' ),
			'oblique' => esc_html__( 'Oblique', 'vw-automobile-lite' )
		);
	}
}
