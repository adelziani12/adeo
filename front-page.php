<?php
get_header();?>
<?php if ( ideapark_woocommerce_on() ) { ?>
	<div class="woocommerce-notices-wrapper">
		<?php wc_print_notices(); ?>
	</div>
<?php } ?>
<?php if ( get_option( 'show_on_front' ) == 'page' ) {

	if ( ideapark_mod( 'front_page_builder_enabled' ) ) {
		global $ideapark_customize;
		$sections = ideapark_parse_checklist( ideapark_mod( 'home_sections' ) );
		foreach ( $sections as $section => $is_enable ) {
			if ( ! $is_enable ) {
				continue;
			}
			foreach ( $ideapark_customize as $_section ) {
				if ( ! empty( $_section['section_id'] ) && $_section['section_id'] == $section && ! empty( $_section['refresh_id'] ) ) {
					ideapark_get_template_part( 'inc/' . $_section['refresh_id'], [ 'section_id' => $section ] );
					break;
				}
			}
		}
	} else {
		get_template_part( 'page' );
	}

} else {
	get_template_part( 'index' );
}

get_footer();
