<?php
global $wp_query, $s, $page;
$found_posts = $wp_query->found_posts;
?>
<?php get_header(); ?>

<div class="ip-blog-container">
	<header class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<h1 class="page-title">
						<?php esc_html_e( 'Search Results', 'kidz' ); ?>
					</h1>
					<div class="search-results">
						<?php if ( $found_posts ): ?>
							<?php echo sprintf( _n( '%s result found for <strong>%s</strong>', '%s results found for <strong>%s</strong>', $found_posts, 'kidz' ), number_format_i18n( $found_posts ), esc_html( get_search_query() ) ); ?>
						<?php else: ?>
							<?php echo sprintf( __( 'No search results for <strong>%s</strong>', 'kidz' ), esc_html( get_search_query() ) ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div
		class="container search-container archive<?php if ( ideapark_mod( 'post_hide_sidebar' ) ) { ?> hide-sidebar<?php } ?>">
		<div class="row">
			<?php if ( ideapark_mod( 'post_hide_sidebar' ) ) { ?>
			<div class="col-md-12"><?php } else { ?>
				<div class="col-md-9">
					<?php } ?>
					<section role="main">
						<div class="search-container__form">
							<?php
							$old = ideapark_mod( 'search_products_only' );
							ideapark_mod_set_temp( 'search_products_only', false );
							get_search_form();
							ideapark_mod_set_temp( 'search_products_only', $old );
							?>
						</div>
						<ul class="results-list">
							<?php
							if ( have_posts() ) {
								while ( have_posts() ) {
									the_post(); ?>
									<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<a href="<?php echo get_permalink(); ?>">
											<div class="post-img">
												<?php the_post_thumbnail( 'thumbnail' ); ?>
											</div>
										</a>
										<div class="post-content">
											<a href="<?php echo get_permalink(); ?>">
												<h2><?php the_title(); ?></h2>
											</a>

											<?php if ( ideapark_woocommerce_on() && ( $product = wc_get_product( $post->ID ) ) ) { ?>
												<?php echo ideapark_wrap( $product->get_price_html(), '<span class="price">', '</span>' ); ?>
												<div class="actions">
													<?php woocommerce_template_loop_add_to_cart(); ?>
												</div>

											<?php } elseif ( get_post_type( $post->ID ) != 'page' && ! ideapark_mod( 'post_hide_date' ) ) { ?>
												<div class="meta-date">
													<div class="post-meta post-date">
														<?php echo date( get_option( 'date_format' ), strtotime( $post->post_date ) ); ?>
													</div>
												</div>
											<?php } ?>
										</div>
									</li>
								<?php } ?>
							<?php } else { ?>
								<li class="no-results"><?php esc_html_e( 'Sorry, no posts were found. Try searching for something else.', 'kidz' ); ?></li>
							<?php } ?>
						</ul>
						<?php ideapark_corenavi(); ?>
					</section>
				</div>
				<?php if ( ! ideapark_mod( 'post_hide_sidebar' ) ) { ?>
					<div class="col-md-3">
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
   