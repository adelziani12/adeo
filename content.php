<?php global $post; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="<?php if ( ideapark_woocommerce_on() && ( is_cart() || is_checkout() || is_account_page() ) || class_exists( 'Ideapark_Wishlist' ) && ideapark_is_wishlist_page()) { ?>shop-content<?php } else { ?>entry-content<?php } ?>">
		<?php if ( class_exists( 'Ideapark_Wishlist' ) && ideapark_is_wishlist_page() ) { ?>
			<?php echo do_shortcode( '[ip_wishlist]' ); ?>
		<?php } else { ?>
			<?php if ( has_post_thumbnail() && !ideapark_mod( 'post_hide_featured_image' ) ) { ?>
				<?php the_post_thumbnail( 'medium', [ 'class' => 'alignleft post-thumbnail' ] ); ?>
			<?php } ?>
			<?php the_content( '<span class="more-button">' . esc_html( strip_tags( __( 'Continue Reading', 'kidz' ) ) ) . '</span>' ); ?>
		<?php } ?>
	</div>
	<div class="clear"></div>
	<?php wp_link_pages( [ 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kidz' ), 'after' => '</div>', 'pagelink' => '<span>%</span>' ] ); ?>
	<?php if ( ! is_page() && ( ! ideapark_mod( 'post_hide_share' ) || ! ideapark_mod( 'post_hide_tags' ) ) ) { ?>
		<div class="post-bottom <?php if ( !post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { ?> with-comments<?php } ?>">
			<div class="row">
				<?php if ( has_tag() && !ideapark_mod( 'post_hide_tags' ) ) { ?>
					<div class="post-tags col-sm-<?php if ( ideapark_mod( 'post_hide_share' ) ) { ?>12<?php } else { ?>6<?php } ?>">
						<span><?php echo esc_html__( 'Tags', 'kidz' ); ?></span><?php the_tags( "", "" ); ?>
					</div>
				<?php } ?>
				<?php if ( !ideapark_mod( 'post_hide_share' ) ) { ?>
					<div class="meta-share col-sm-<?php if ( has_tag() ) { ?>6<?php } else { ?>12<?php } ?>">
						<?php echo shortcode_exists('ip-post-share') ? do_shortcode( '[ip-post-share]' ) : ''; ?>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>

	<?php if ( is_single() && !ideapark_mod( 'post_hide_author' ) ) { ?>
		<?php get_template_part( 'inc/post-author' ); ?>
	<?php } ?>

	<?php if ( is_single() && !ideapark_mod( 'post_hide_postnav' ) ) { ?>
		<?php ideapark_post_nav(); ?>
	<?php } ?>

	<?php if ( is_single() && !ideapark_mod( 'post_hide_related' ) ) { ?>
		<?php get_template_part( 'inc/related-posts' ); ?>
	<?php } ?>

	<?php comments_template( '', true ); ?>

</article>

