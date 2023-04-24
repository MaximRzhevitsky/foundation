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
class Icon_block_widget extends \Elementor\Widget_Base {

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
		return 'Icon_block';
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
		return esc_html__( 'icon_block', 'foundation-plugin' );
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
			'icon_block',
			[
				'label' => esc_html__( 'Content', 'foundation-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

//default box-icon
		$this->add_control(
			'flat_icon',
			[
				'label' => esc_html__( 'Flat icon', 'foundation-plugin' ),
				'type' => 'flat_icon'
			]
		);

		$this->add_control(
			'icon_block_title',
			[
				'label' => esc_html__( 'icon box title', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type your title here', 'foundation-plugin' ),
			]
		);

		$this->add_control(
			'icon_block_text',
			[
				'label' => esc_html__( 'icon box text', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type url here', 'foundation-plugin' ),
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

		?>
        <div class="text-center">
            <span class="d-block mb-3 display-3 text-secondary <?php echo esc_attr($settings['flat_icon']); ?>"></span>
            <h3 class="text-primary h4 mb-2"><?php echo esc_attr($settings['icon_block_title']); ?></h3>
            <p><?php echo esc_attr($settings['icon_block_text']); ?></p>
        </div>

	<?php }
}


