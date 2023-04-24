<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Our_mission_widget extends \Elementor\Widget_Base {

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
		return 'our_mission';
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
		return esc_html__( 'Our_mission', 'foundation-plugin' );
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
			'our_mission_section',
			[
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'our_mission_title',
			[
				'label' => esc_html__( 'our mission title', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type your title here', 'plugin-name' ),
			]
		);

		$this->add_control(
			'our_mission_text',
			[
				'label' => esc_html__( 'Horizontal box text', 'plugin-foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'placeholder' => esc_html__( 'Type your description here', 'plugin-name' ),
			]
		);


		$this->add_control(
			'our_mission_background_color',
			[
				'label' => esc_html__( 'Our mission mask background', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bg-image.overlay:after' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'background_image',
			[
				'label' => esc_html__( 'Background Image', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
			]
		);
		$this->end_controls_section();


//open section for video
		$this->start_controls_section(
			'our_mission_video',
			[
				'label' => esc_html__( 'Video', 'foundation-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'video_preview',
			[
				'label' => esc_html__( 'Video preview', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
			]
		);

		$this->add_control(
			'video_link',
			[
				'label' => esc_html__( 'our mission video link', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'https://vimeo.com/45830194',
				'placeholder' => esc_html__( 'https://vimeo.com/45830194', 'foundation-plugin' ),
			]
		);
		$this->end_controls_section();


//open section for counter data
		$this->start_controls_section(
			'our_mission_counter',
			[
				'label' => esc_html__( 'Counter', 'foundation-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
			'our_mission_numbers',
			[
				'label' => esc_html__( 'our mission numbers', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type your numbers here', 'foundation-plugin' ),
			]
		);

		$repeater->add_control(
			'counter_text',
			[
				'label' => esc_html__( 'counter text', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type text here', 'foundation-plugin' ),
			]
		);

		$repeater->add_control(
			'numbers_color',
			[
				'label' => esc_html__( 'Numbers color', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .block-counter-1 .number' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'our_mission_numbers' => '',
						'counter_text'=>'',
                        'numbers_color'=>''
					],
				],
				'title_field' => esc_html__( 'our_mission_counter', 'foundation-plugin' ),
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
			'p'=>array(
			        'class'=>array()
            )
		);
		?>

		<div class="site-section bg-image overlay counter" style="background-image: url('<?php echo esc_url($settings['background_image']['url']) ?>');">
      <div class="container">
        <div class="row mb-5">

            <?php if($settings['video_preview'] and $settings['video_link']){ ?>
          <div class="col-lg-6 mb-4">
            <figure class="block-img-video-1" data-aos="fade">
              <a href="<?php echo esc_url($settings['video_link']); ?>>" class="popup-vimeo">
                <span class="icon"><span class="icon-play"></span></span>
                  <img src="<?php echo esc_url($settings['video_preview']['url']); ?>" alt="Image" class="img-fluid">
              </a>
            </figure>
          </div>
            <?php } ?>

          <div class="col-lg-5 ml-auto align-self-lg-center">
            <h2 class="text-black mb-4 text-uppercase section-title"><?php echo esc_attr($settings['our_mission_title']); ?></h2>
              <?php echo wp_kses($settings['our_mission_text'], $allowed_html); ?>
          </div>
        </div>
        <div class="row">

            <?php if ($settings['list']) {
                    foreach($settings['list'] as $item) { ?>
                        <div class="col-md-6 mb-4 col-lg-0 col-lg-3">
                            <div class="block-counter-1">
                                <span class="number" <?php if($item['numbers_color']){ echo 'style="color:'.$item['numbers_color'].'"';} ?>><span data-number="<?php echo esc_attr($item['our_mission_numbers']); ?>">0</span></span>
                                <span class="caption text-black"><?php echo esc_attr($item['counter_text']); ?></span>
                            </div>
                        </div>
                <?php } }?>

        </div>
      </div>
    </div>



<?php	}
 }

