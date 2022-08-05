<div class="footer-sidebar">
	<div class="footer-sidebar__wrap">
		<?php if ( ideapark_mod( 'footer_layout' ) === 'default' ) { ?>
			<div class="widget footer-widget">
				<?php get_template_part( 'inc/footer-logo' ); ?>
				<?php if ( ideapark_mod( 'footer_contacts' ) ) { ?>
					<div class="contacts">
						<?php echo make_clickable( str_replace( ']]>', ']]&gt;', ideapark_mod( 'footer_contacts' ) ) ); ?>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
		<?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
			<?php dynamic_sidebar( 'footer-sidebar' ); ?>
		<?php } ?>
	</div>
</div>