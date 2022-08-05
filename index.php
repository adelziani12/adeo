<?php get_header();
$with_sidebar = ! ideapark_mod( 'post_hide_sidebar' ) && is_active_sidebar( 'sidebar-1' );

if ( get_option( 'page_for_posts' ) && 'page' == get_option( 'show_on_front' ) && ( is_front_page() || is_home() ) ) {
	$page_title = get_the_title( get_option( 'page_for_posts' ) );
} elseif ( is_category() ) {
	$page_title = single_cat_title( '', false );
} elseif ( is_tag() ) {
	$page_title = single_tag_title( '', false );
} elseif ( is_author() ) {
	the_post();
	$page_title = get_the_author();
	rewind_posts();
} elseif ( is_day() ) {
	$page_title = get_the_date();
} elseif ( is_month() ) {
	$page_title = get_the_date( 'F Y' );
} elseif ( is_year() ) {
	$page_title = get_the_date( 'Y' );
} else {
	$page_title = esc_html__( 'Archives', 'kidz' );
} ?>

<?php if ( is_front_page() ) {
	ideapark_show_customizer_attention( 'front_page_builder' );
} ?>

<div class="ip-blog-container">
	<header class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<h1><?php echo esc_html( $page_title ); ?></h1>
				</div>
			</div>
		</div>
	</header>

	<div
		class="container blog-container archive<?php if ( $with_sidebar ) { ?> hide-sidebar<?php } ?>">
		<div class="row row-flex-desktop">
			<div
				class="<?php if ( $with_sidebar ) { ?>col-md-9<?php } else { ?>col-md-12<?php } ?>">
				<?php if ( $with_sidebar && ideapark_mod( 'sticky_sidebar' ) ) { ?>
				<div class="js-sticky-sidebar-nearby"><?php } ?>
					<section role="main">
						<?php if ( have_posts() ): ?>
							<div class="grid masonry">
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'content', 'list' ); ?>
								<?php endwhile; ?>
								<div class="post-sizer"></div>
							</div>
							<div class="clearfix"></div>
							<?php ideapark_corenavi();
						else : ?>
							<p class="nothing"><?php esc_html_e( 'Sorry, no posts were found.', 'kidz' ); ?></p>
						<?php endif; ?>
					</section>
					<?php if ( $with_sidebar && ideapark_mod( 'sticky_sidebar' ) ) { ?>
				</div><?php } ?>
			</div>
			<?php if ( $with_sidebar ) { ?>
				<div class="col-md-3">
					<?php if ( ideapark_mod( 'sticky_sidebar' ) ) { ?>
					<div class="js-sticky-sidebar"><?php } ?>
						<?php get_sidebar(); ?>
						<?php if ( ideapark_mod( 'sticky_sidebar' ) ) { ?>
					</div><?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
   