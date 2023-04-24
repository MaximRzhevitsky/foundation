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
class Our_blog_widget extends \Elementor\Widget_Base {

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
		return 'our_blog';
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
		return esc_html__( 'our_blog', 'foundation-plugin' );
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
			'our_blog',
			[
				'label' => esc_html__( 'Content', 'foundation-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'our_blog_title',
			[
				'label' => esc_html__( 'our_blog title', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type your title here', 'foundation-plugin' ),
			]
		);



		$this->add_control(
			'our_blog_text',
			[
				'label' => esc_html__( 'our_blog_text', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type text', 'foundation-plugin' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_data',
			[
				'label' => esc_html__( 'Content_data', 'foundation-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'count_blog',
			[
				'label' => esc_html__( 'count of blog', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 2,
				'placeholder' => esc_html__( 'Type count of blog', 'foundation-plugin' ),
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

		<div class="site-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-7 text-center mb-5 text-center">
						<h2 class="text-black text-uppercase section-title"><?php echo esc_attr($settings['our_blog_title']); ?></h2>
						<p><?php echo wp_kses(esc_attr($settings['our_blog_text']), $allowed_html); ?></p>
					</div>
				</div>
				<div class="row">

					<?php
					$count=$settings['count_blog'];

					$args = array(
						'posts_per_page'=> $count,
						'post_type'=> 'post'
					);
					$our_blog_query = new WP_Query($args);

					if($our_blog_query->have_posts()) :
					while ( $our_blog_query->have_posts() ) : $our_blog_query->the_post(); ?>

					<div class="col-lg-6">
						<div>
							<a href="<?php the_permalink(); ?>" class="mb-4 d-block"><img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="Image" class="img-fluid rounded"></a>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p class="text-muted mb-3 text-uppercase small"><span class="mr-2"><?php the_date(); ?></span> By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="by"><?php the_author(); ?></a></p>
							<?php the_excerpt(); ?>
							<p><a href="<?php the_permalink(); ?>"><?php esc_html_e('Get Started','foundation-plugin'); ?></a></p>
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




