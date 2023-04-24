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
class Leader_ships_widget extends \Elementor\Widget_Base {

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
		return 'Leader_ships';
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
		return esc_html__( 'leader_ships', 'foundation-plugin' );
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
			'leader_ships',
			[
				'label' => esc_html__( 'Content', 'foundation-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'leader_ship_title',
			[
				'label' => esc_html__( 'leader_ships title', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type your title here', 'foundation-plugin' ),
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);


		$this->add_control(
			'leader_ship_text',
			[
				'label' => esc_html__( 'leader_ship text', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type url here', 'foundation-plugin' ),
			]
		);


		$this->add_control(
			'leader_ship_count',
			[
				'label' => esc_html__( 'leader_ship count', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type url count', 'foundation-plugin' ),
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

		<div class="site-section" id="team-section">
			<div class="container">
				<div class="row mb-5 justify-content-center">
					<div class="col-md-7 text-center">
						<h2 class="text-black text-uppercase section-title"><?php echo esc_attr($settings['leader_ship_title']); ?></h2>
						<p><?php echo esc_attr($settings['leader_ship_text']); ?></p>
					</div>
				</div>
				<div class="row">

		<?php
		$count=$settings['leader_ship_count'];

		$args = array(
		        'posts_per_page'=> $count,
                'post_type'=> 'leader_ships'
             );

		$leader_ships_query = new WP_Query($args);

    if($leader_ships_query->have_posts()) :
		while ( $leader_ships_query->have_posts() ) : $leader_ships_query->the_post(); ?>

            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3"><?php the_title(); ?>></span>
                    <p class="px-3 mb-3"><?php the_content(); ?></p>
                    <div class="block-social-1">
        <?php if(get_field('twitter_link')){ ?>
        <a href="<?php the_field('facebook_link'); ?>" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-facebook"></span></a> <?php } ?>
    <?php if(get_field('twitter_link')) {?>
        <a href="<?php the_field('twitter_link'); ?>" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-twitter"></span></a> <?php } ?>
    <?php if(get_field('instagram_link')) {?>
        <a href="<?php the_field('instagram_link'); ?>" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-instagram"></span></a> <?php }?>
                    </div>
                </div>
            </div>

			<?php	endwhile;
			endif; wp_reset_query();
			?>

				</div>
			</div>
		</div>

	<?php }
}


