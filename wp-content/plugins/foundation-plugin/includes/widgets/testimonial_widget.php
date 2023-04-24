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
class Testimonial_widget extends \Elementor\Widget_Base {

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
		return 'testimonial';
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
		return esc_html__( 'testimonial', 'foundation-plugin' );
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
			'testimonial',
			[
				'label' => esc_html__( 'Content', 'foundation-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'testimonial_title',
			[
				'label' => esc_html__( 'testimonial title', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type your title here', 'foundation-plugin' ),
			]
		);

		$this->add_control(
			'testimonial_background_color',
			[
				'label' => esc_html__( 'Our mission mask background', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .site-section block-13 overlay bg-image aos-init aos-animate' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'testimonial_background_image',
			[
				'label' => esc_html__( 'Background Image', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
			]
		);

		$this->add_control(
			'testimonial_count',
			[
				'label' => esc_html__( 'testimonial count', 'foundation-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Type count', 'foundation-plugin' ),
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
        <!-- for display posts in admin-panel --inside slider-->
        <script>
            jQuery(document).ready(function($)
            {
                var siteCarousel = function () {
                    if ($('.nonloop-block-13').length > 0) {
                        $('.nonloop-block-13').owlCarousel({
                            center: false,
                            items: 1,
                            loop: true,
                            stagePadding: 0,
                            margin: 0,
                            autoplay: true,
                            nav: true,
                            navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
                            responsive: {
                                600: {
                                    margin: 0,
                                    nav: true,
                                    items: 2
                                },
                                1000: {
                                    margin: 0,
                                    stagePadding: 0,
                                    nav: true,
                                    items: 2
                                },
                                1200: {
                                    margin: 0,
                                    stagePadding: 0,
                                    nav: true,
                                    items: 3
                                }
                            }
                        });
                    }
                };
                siteCarousel();
            });
        </script>


		<div class="site-section block-13 overlay bg-image" id="testimonials-section" data-aos="fade" style="background-image: url(
     <?php if($settings['testimonial_background_image']['url']){ echo esc_url($settings['testimonial_background_image']['url']);} ?>);" id="donate-section">
			<div class="container">
				<div class="text-center mb-5">
					<h2 class="text-white text-uppercase section-title"><?php echo esc_attr($settings['testimonial_title']); ?></h2>
				</div>
				<div class="owl-carousel nonloop-block-13">

					<?php
					$count=$settings['testimonial_count'];

					$args = array(
						'posts_per_page'=> $count,
						'post_type'=> 'testimonial'
					);

					$testimonial_query = new WP_Query($args);


					if($testimonial_query->have_posts()) :
						while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>



            <div>
                <div class="block-testimony-1 text-center">

                    <blockquote class="mb-4">
                        <p><?php the_content(); ?></p>
                    </blockquote>

                    <figure>
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="Image" class="img-fluid rounded-circle mx-auto">
                    </figure>
                    <h3 class="font-size-20 text-white"><?php the_title(); ?></h3>
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



