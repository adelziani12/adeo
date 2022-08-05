<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-img">
			<?php
			global $post_id;
			$post_thumbnail_id = get_post_thumbnail_id( $post_id );
			$image             = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
			?>
			<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
		</div>
	<?php endif; ?>

	<header class="post-header">
		<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="post-meta">
			<?php if ( get_post_type() != 'page' && !ideapark_mod( 'post_hide_date' ) ) { ?>
				<span class="post-date">
					<?php the_time( get_option( 'date_format' ) ); ?>
				</span>
			<?php } ?>
			<?php if ( get_post_type() != 'page' && !ideapark_mod( 'post_hide_category' ) ) { ?>
				<?php esc_html_e( 'In', 'kidz' ); ?>
				<ul class="post-categories">
					<li><?php ideapark_category( '</li><li>' ); ?></li>
				</ul>
			<?php } ?>
		</div>
	</header>

	<div class="post-except">
		<?php if (empty( $post->post_title )) { ?><a href="<?php echo get_permalink() ?>"><?php } ?>
			<?php the_excerpt() ?>
		<?php if (empty( $post->post_title )) { ?></a><?php } ?>
	</div>

</article>