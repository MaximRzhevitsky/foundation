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
class Donation_widget extends \Elementor\Widget_Base {

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
		return 'Donation';
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
		return esc_html__( 'donation', 'foundation-plugin' );
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
				'label' => esc_html__( 'Content', 'foundation-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'donation_title',
			[
				'label' => esc_html__( 'donation title', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type your title here', 'foundation-plugin' ),
			]
		);

		$this->add_control(
			'donation_background',
			[
				'label' => esc_html__( 'Donation Image', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'donation_url',
			[
				'label' => esc_html__( 'donation url', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type url here', 'foundation-plugin' ),
			]
		);

		$this->add_control(
			'donation_button',
			[
				'label' => esc_html__( 'donation button text', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type text here', 'foundation-plugin' ),
			]
		);


		$this->add_control(
			'donation_color',
			[
				'label' => esc_html__( 'donation color', 'foundation-plugin' ),
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

		?>
        <div class="site-section bg-image overlay" style="background-image: url(
        <?php if($settings['donation_background']['url']){ echo esc_url($settings['donation_background']['url']);} ?>);" id="donate-section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-5 text-center">
                        <h2 class="text-white mb-4"><?php if($settings['donation_title']) { echo esc_attr($settings['donation_title']);} ?></h2>
                        <p><a href="<?php if($settings['donation_url']){ echo esc_url($settings['donation_url']);} ?>" class="btn btn-primary px-4 py-3 btn-block">
                                <?php if($settings['donation_button']) {echo esc_attr($settings['donation_button']); }?></a></p>
                    </div>
                </div>
            </div>
        </div>

<?php }
}

