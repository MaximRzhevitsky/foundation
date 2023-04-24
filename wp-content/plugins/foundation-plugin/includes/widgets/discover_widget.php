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
class Discover_widget extends \Elementor\Widget_Base {

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
		return 'discover';
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
		return esc_html__( 'Discover', 'foundation-plugin' );
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
			'discover_description',
			[
				'label' => esc_html__( 'Discover description', 'foundation-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'discover_title',
			[
				'label' => esc_html__( 'discover title', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type your title here', 'foundation-plugin' ),
			]
		);

		$this->add_control(
			'discover_text',
			[
				'label' => esc_html__( 'Discover text', 'plugin-foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'placeholder' => esc_html__( 'Type your description here', 'foundation-plugin' ),
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'discover_block',
			[
				'label' => esc_html__( 'Discover block', 'foundation-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'discover_block_title',
			[
				'label' => esc_html__( 'discover block title', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type your title here', 'foundation-plugin' ),
			]
		);

		$repeater->add_control(
			'discover_block_text',
			[
				'label' => esc_html__( 'Discover block text', 'plugin-foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'placeholder' => esc_html__( 'Type your text here', 'foundation-plugin' ),
			]
		);

		$repeater->add_control(
			'discover_block_image',
			[
				'label' => esc_html__( 'Discover block Image', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
			]
		);

		$repeater->add_control(
			'discover_block_counter_one',
			[
				'label' => esc_html__( 'discover block counter one', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type your number here', 'foundation-plugin' ),
			]
		);

		$repeater->add_control(
			'discover_block_counter_one_description',
			[
				'label' => esc_html__( 'Discover block counter one description', 'plugin-foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type your title here', 'foundation-plugin' ),
			]
		);

		$repeater->add_control(
			'discover_block_counter_two',
			[
				'label' => esc_html__( 'discover block counter two', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type your number here', 'foundation-plugin' ),
			]
		);

		$repeater->add_control(
			'discover_block_counter_two_description',
			[
				'label' => esc_html__( 'Discover block counter two description', 'plugin-foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type your title here', 'foundation-plugin' ),
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
						'discover_block_title' => '',
                        'discover_block_text'=>'',
                        'discover_block_image'=>'',
                        'discover_block_counter_one'=>'',
                        'discover_block_counter_one_description'=>'',
                        'discover_block_counter_two'=>'',
                        'discover_block_counter_two_description'=>''
					],
				],
				'title_field' => esc_html__( 'discover block item', 'foundation_widget' ),
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
			'p'=>array( 'class'=>array() )
		); ?>

        <div class="site-section bg-light counter">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="col-md-7 text-center">
                        <div class="block-heading-1">
                            <h2 class="text-black text-uppercase"><?php echo esc_attr($settings['discover_title']); ?></h2>
                            <p><?php echo wp_kses($settings['discover_block_text'],$allowed_html ); ?></p>
                        </div>
                    </div>
                </div>

                <?php if($settings['list']) {
                    $i=0;
                    foreach($settings['list'] as $item) {  $i++; ?>

                <div class="row mb-5">
                    <div class="col-lg-6 mb-5 <?php echo ($i%2 ? '':'order-lg-2'); ?>">
                        <img src="<?php echo esc_url($item['discover_block_image']['url']) ?>" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-lg-5 align-self-center  <?php echo ($i%2 ? 'ml-auto':'mr-auto order-lg-1') ?>">
                        <h3 class="text-black text-uppercase mb-4"><?php echo $item['discover_block_title']; ?></h3>
                        <p class="mb-5"><?php echo $item['discover_block_text']; ?></p>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="block-counter-1 block-counter-1-sm">
                                    <span class="number"><span data-number="<?php echo $item['discover_block_counter_one']; ?>">0</span></span>
                                    <span class="caption text-black"><?php echo $item['discover_block_counter_one_description']; ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="block-counter-1 block-counter-1-sm">
                                    <span class="number"><span data-number="<?php echo $item['discover_block_counter_two']; ?>">0</span></span>
                                    <span class="caption text-black"><?php echo $item['discover_block_counter_two_description']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } } ?>

            </div>
        </div>

	<?php	}
}


