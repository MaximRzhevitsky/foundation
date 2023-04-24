<?php
global  $max_foundation;
?>
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">
                        <?php if($max_foundation['left title']) {?>
                        <h2 class="footer-heading mb-4"><?php echo esc_attr($max_foundation['left title']); }?> </h2>

	                    <?php if($max_foundation['left text']) {?>
                        <p><?php echo $max_foundation['left text']; }?></p>
                    </div>

                    <div class="col-md-4 ml-auto">
	                    <?php if($max_foundation['center title']) {?>
                        <h2 class="footer-heading mb-4"><?php echo esc_attr($max_foundation['center title']); }?> </h2>

	                    <?php
	                    remove_filter('nav_menu_link_attributes','max_foundation_add_link_atts');

	                    wp_nav_menu(
		                    array(
			                    'theme_location' => 'footer_menu',
			                    'menu_id'        => 'footer_menu',
			                    'menu_class' => 'list-unstyled',
			                    'container'=>'ul'
		                    ) );
	                    ?>
                    </div>

                </div>
            </div>
            <div class="col-md-4 ml-auto">

                    <div class="mb-5">
	                    <?php if($max_foundation['right title']) {?>
                        <h2 class="footer-heading mb-4"><?php echo esc_attr($max_foundation['right title']); }?> </h2>

	                    <?php if($max_foundation['right text']) {?>
                        <p><?php echo $max_foundation['right text']; }?></p>
                    </div>

                <div class="mb-5">
	                <?php if($max_foundation['subscribe title']) {?>
                    <h2 class="footer-heading mb-4"><?php echo esc_attr($max_foundation['subscribe title']); }?> </h2>

                    <?php echo do_shortcode(esc_attr($max_foundation['widget for mail'])); ?>
                </div>

                <div class="mb-5">
	                <?php if($max_foundation['follow title']) {?>
                    <h2 class="footer-heading mb-4"><?php echo $max_foundation['follow title']; }?> </h2>

                    <a href="#about-section" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </div>
        </div>

    <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
            <div class="border-top pt-5">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>

    </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>

</body>
</html>
