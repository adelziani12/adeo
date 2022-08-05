<a href="<?php echo get_permalink(); ?>">
<article id="bottom-post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() && ( $attachment_id = get_post_thumbnail_id( $post->ID ) ) && ( $image_meta = ideapark_image_meta( $attachment_id, 'woocommerce_thumbnail' ) ) ) { ?>
		<?php echo ideapark_img( $image_meta, 'post-img' ); ?>
	<?php } ?>

	<div class="post-content">
		<?php if ( ! ideapark_mod( 'post_hide_date' ) ) { ?>
			<div class="post-meta">
				<span class="post-date">
					<?php the_time( get_option( 'date_format' ) ); ?>
				</span>
			</div>
		<?php } ?>
		<header class="post-header">
			<h3><?php the_title(); ?></h3>
		</header>
		<span class="more"><?php esc_html_e( 'Read More', 'kidz' ) ?></span>
	</div>
</article>
</a>