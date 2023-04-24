<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class Flat_icon_control extends \Elementor\Base_Data_Control {

	/**
	 * Get icon control type.
	 *
	 * Retrieve the control type, in this case `icon`.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Control type.
	 */
	public function get_type() {
		return 'flat_icon';
	}

	/**
	 * Get icons.
	 *
	 * Retrieve all the available icons.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return array Available icons.
	 */
	public static function get_icons() {
		return [
			'flaticon-piggy-bank' => 'piggy-bank',
			'flaticon-blood' => 'blood',
			'flaticon-food' => 'food',
			'flaticon-dollar' => 'dollar',
			'flaticon-unity' => 'unity',
			'flaticon-donation' => 'donation',
		];
	}

	/**
	 * Get icons control default settings.
	 *
	 * Retrieve the default settings of the icons control. Used to return the default
	 * settings while initializing the icons control.
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */
	protected function get_default_settings() {
		return [
			'options' => self::get_icons(),
			'include' => '',
			'exclude' => '',
		];
	}

	/**
	 * Render icons control output in the editor.
	 *
	 * Used to generate the control HTML in the editor using Underscore JS
	 * template. The variables for the class are available using `data` JS
	 * object.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function content_template() {
		?>
		<div class="elementor-control-field">
			<label for="<?php $this->print_control_uid(); ?>" class="elementor-control-title">{{{ data.label }}}</label>
			<div class="elementor-control-input-wrapper">
				<select id="<?php $this->print_control_uid(); ?>" class="elementor-control-icon" data-setting="{{ data.name }}" data-placeholder="<?php echo esc_html__( 'Flat Icon', 'elementor' ); ?>">
					<option value="flaticon-piggy-bank"><?php echo esc_html__( 'Default Icon', 'elementor' ); ?></option>
					<# _.each( data.options, function( option_title, option_value ) { #>
					<option value="{{ option_value }}">{{{ option_title }}}</option>
					<# } ); #>
				</select>
			</div>
		</div>
		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{ data.description }}</div>
		<# } #>
		<?php
	}
}
