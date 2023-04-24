<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package max-foundation
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
    <div class="col-md-4 sidebar">
        <div class="sidebar-box">
                <!--                        --><?php //echo get_search_form(); ?>
                <form role="search" method="get" class="search-form" action="<?php echo home_url("/"); ?>">
                    <input type="text" name="s" placeholder="Type a keyword and hit enter"/>
                    <button class="btn-search">Search</button>
                </form>
            </div>
        <div class="sidebar-box">
            <div class="categories">
                <h3 class="text-black">Categories</h3>
                <?php   $categories = get_categories();
                foreach($categories as $category) {
                echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                } ?>
            </div>
        </div>
        <div class="sidebar-box">
            <?php $author_id = get_the_author_meta('ID'); ?>
            <?php $avatar = get_avatar_url( $author_id); ?>
                <img src="<?php echo $avatar; ?>" alt="" class="img-fluid mb-4 w-50 rounded-circle">
            <h3 class="text-black">Author:<?php the_author_meta( 'user_nicename' , $author_id ); ?></h3>
            <p><?php echo (get_the_author_meta('description')); ?></p>
            <p><a href="#" class="btn btn-primary btn-md">Read More</a></p>
        </div>
    </div>
