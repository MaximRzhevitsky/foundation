<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Horizontal box Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Horizontal_box_widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'horizontal_box';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'horizontal_box', 'foundation-plugin' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slider-push';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'foundation' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'oembed', 'url', 'link' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'horizontal_box_section',
			[
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'horizontal_box_title',
			[
				'label' => esc_html__( 'Horizontal box title', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type your title here', 'plugin-name' ),
			]
		);


		$this->add_control(
			'horizontal_box_text',
			[
				'label' => esc_html__( 'Horizontal box text', 'plugin-foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'placeholder' => esc_html__( 'Type your description here', 'plugin-name' ),
			]
		);


		$this->add_control(
			'horizontal_box_background',
			[
				'label' => esc_html__( 'Horizontal box background', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .intro-engage' => 'background-color: {{VALUE}}',
				],
			]
		);


		$this->end_controls_section();

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$allowed_html=array(
			'a' => array(
				'href' => array(),
				'title' => array()
			),
			'br' => array(),
			'em' => array(),
			'strong' => array(),
            'p'=>array()
		);

		?>
        <div class="d-block d-md-flex intro-engage">
        <div class="intro-engage" style="background-color: <?php echo $settings['horizontal_box_background']; ?>">

	<?php if($settings['horizontal_box_title']){ ?> <h2> <?php echo wp_kses($settings['horizontal_box_title'], $allowed_html);?> </h2> <?php } ?>
	<?php if($settings['horizontal_box_text']){ ?> <p> <?php echo wp_kses($settings['horizontal_box_text'], $allowed_html); ?>  </p>  <?php } ?>

		</div>
        </div>

<?php
		}

}

