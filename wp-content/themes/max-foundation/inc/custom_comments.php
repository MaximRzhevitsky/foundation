<?php
if( ! function_exists( 'custom_comments' ) ):
	function custom_comments($comment, $args, $depth) {
		?>
		<?php if ($comment->comment_approved == '0') : ?>
            <em><?php esc_html_e('Your comment is awaiting moderation.','max-foundation') ?></em>
            <br />
		<?php endif; ?>
            <li class="comment">
                    <div class="vcard bio">
	                    <?php echo get_avatar($comment,50,$default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g' ); ?>
                    </div>
                    <div class="comment-body">
                        <h3><?php echo get_comment_author() ?></h3>
                        <div class="meta">
                 <?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s at %2$s' , 'max-foundation'), get_comment_date(),  get_comment_time()) ?>
                        </div>
                        <?php comment_text() ?>
                        <p><span><a href="#"><i class="fa fa-reply"></i>
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                                </a></span></p>
                    </div>
            </li>
	            <?php } endif;  ?>