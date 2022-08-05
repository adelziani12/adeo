<?php
$ip_styles        = [];
$is_white_bg = false;

if ( ideapark_mod( $n = 'footer_background_color' ) != ideapark_mod_default( $n ) ) {
	$ip_styles[] = 'background-color:' . esc_attr( ideapark_mod( $n ) );
	$is_white_bg = ( preg_match( '~^#f{3,6}$~i', ideapark_mod( $n ) ) );
}

if ( ideapark_mod( $n = 'footer_text_color' ) != ideapark_mod_default( $n ) ) {
	$ip_styles[] = 'color:' . esc_attr( ideapark_mod( $n ) );
}
?>
<footer id="footer" class="footer--<?php echo esc_attr( ideapark_mod( 'footer_layout' )); ?>">
	<div class="wrap" <?php echo ideapark_wrap( implode( ';', $ip_styles ), 'style="', '"' ) ?>>
		<div class="container">
			<?php if ( ideapark_mod( 'footer_layout' ) !== 'minimal' ) { ?>
			<?php get_sidebar( 'footer' ); ?>
			<?php } ?>
			<div class="row bottom <?php if ($is_white_bg) { ?>white-footer-bg<?php } ?>">
				<div class="col-xs-6 col-xs-push-6">
					<?php get_template_part( 'inc/soc' ); ?>
				</div>
				<div class="col-xs-6 col-xs-pull-6 copyright"><?php echo esc_html( ideapark_mod( 'footer_copyright' ) ); ?></div>
			</div>
		</div>
	</div>
</footer>
</div><!-- #wrap -->
<div id="ip-quickview"></div>
<?php if ( ideapark_mod( 'to_top_button' ) ) { ?>
	<div class="to-top-button" <?php if ( ideapark_mod('to_top_button_color') ) { ?>style="background-color: <?php echo esc_attr( ideapark_mod('to_top_button_color') ); ?>"<?php } ?>><svg class="to-top-button__svg"><use xlink:href="<?php echo esc_url( ideapark_svg_url() ); ?>#svg-top" /></svg></div>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
