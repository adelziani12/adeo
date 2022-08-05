<?php get_header(); ?>

<div class="ip-page-container">
	<header class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1><?php esc_html_e( 'Page not found', 'kidz' ); ?></h1>
				</div>
			</div>
		</div>
	</header>

	<div class="container post-container">
		<div class="row">
			<div class="col-md-12">
				<div class="error-page">
					<h2><?php esc_html_e( '404', 'kidz' ); ?></h2>
					<svg>
						<use xlink:href="<?php echo esc_url( ideapark_svg_url() ); ?>#svg-close-light"/>
					</svg>
					<p><?php esc_html_e( 'The page you are looking for has not been found, try using search', 'kidz' ); ?></p>
					<div class="searchform-wrap">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
