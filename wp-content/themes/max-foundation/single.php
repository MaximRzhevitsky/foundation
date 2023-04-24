<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package max-foundation
 */

            get_header();
                while ( have_posts() ) :
                    the_post(); ?>
    <div class="site-section-cover bg-image overlay inner-page bg-light" style="background-image: url('images/hero_1_no-text.jpg')" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-10">
                <div class="box-shadow-content">
                    <div class="block-heading-1">
                        <span class="d-block mb-3 text-white" data-aos="fade-up"><?php the_date(); ?> <span class="mx-2">&bullet;</span> by <?php the_author(); ?></span>
                        <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 blog-content">
            <?php the_content(); ?>
	    <div class="pt-5">
        <?php $categorys=get_the_category($post->ID);//
        foreach($categorys as $cat){
	        echo '<p> Categories: <a href="' . get_category_link($cat->term_id) . '">' . $cat->name . '</a>
                Tags: <a href="#">no tags</a>, <a href="#">no tags</a>
                   </p>';
        } ?>
	</div>
              <?php  if ( comments_open() || get_comments_number() ) :
                comments_template();
                endif;
                endwhile; // End of the loop.  ?>
        </div>
	            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>