<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package max-foundation
 */
?>
<section class="no-results not-found">
    <div class="container">
        <div class="row">
            <div class="col-md-8 blog-content">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'max-shop' ); ?></h1>
	</header>
	<div class="page-content">
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'max-shop' ); ?></p>
         <div class="sidebar-box">
        <form role="search" method="get" class="search-form" action="<?php echo home_url("/"); ?>">
            <input type="text" name="s" placeholder="Type a keyword and hit enter"/>
            <button class="btn-search">Search</button>
        </form>
    </div>
	</div>
            </div>
	        <?php get_sidebar(); ?>
        </div>
    </div>
</section>
