<?php
global $post;
the_post();
get_header();
$id  = get_the_ID();
$img = wp_get_attachment_image_src( $id, 'original' );
?>

<header class="main-header">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</header>

<div class="container post-container">

	<div class="row">
		<div class="col-md-12">
			<section role="main" class="post-open">
				<div class="entry-content">
					<?php echo wp_get_attachment_image( $id, 'full' ); ?>

					<dl>
						<?php if ( $post->post_content ): ?>
							<dt><?php esc_html_e( 'Description', 'kidz' ); ?></dt>
							<dd><?php the_content(); ?></dd>
						<?php endif; ?>

						<?php if ( $post->post_excerpt ): ?>
							<dt><?php esc_html_e( 'Caption', 'kidz' ); ?></dt>
							<dd><?php the_excerpt(); ?></dd>
						<?php endif; ?>

						<?php if ( $post->_wp_attachment_image_alt ): ?>
							<dt><?php esc_html_e( 'Alt Text', 'kidz' ); ?></dt>
							<dd><?php echo esc_html( $post->_wp_attachment_image_alt ); ?></dd>
						<?php endif; ?>

						<dt><?php esc_html_e( 'Date Added', 'kidz' ); ?></dt>
						<dd><?php the_date( get_option( 'date_format' ) ); ?></dd>

						<dt><?php esc_html_e( 'Dimensions', 'kidz' ); ?></dt>
						<dd><?php echo "$img[1] x $img[2]"; ?></dd>

						<dt><?php esc_html_e( 'Size', 'kidz' ); ?></dt>
						<dd><?php echo size_format( filesize( get_attached_file( $post->ID ) ) ); ?></dd>
					</dl>
				</div>
			</section>
		</div>

	</div>

</div>

<?php get_footer(); ?>











