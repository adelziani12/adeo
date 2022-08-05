<?php
/*
* If the current post is protected by a password and the visitor has not yet
* entered the password we will return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}
?>

<?php if ( comments_open() ||  have_comments()) { ?>
	<div id="comments" class="post-comments">

		<?php if ( have_comments() ) : ?>

			<h2 class="comments-title">
				<?php
				printf( esc_html( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'kidz' ) ),
					number_format_i18n( get_comments_number() ), get_the_title() );
				?>
			</h2>

			<ol class="comments-list">
				<?php
				wp_list_comments( [
					'avatar_size' => 60,
					'max_depth'   => 5,
					'callback'    => 'ideapark_html5_comment',
					'type'        => 'all',
					'style'       => 'ol',
					'short_ping'  => true,
					'format'      => 'html5',
				] );
				?>
			</ol><!-- .comments-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav id="comments-nav-below" class="comments-navigation" role="navigation">
					<div class="nav-previous"><?php previous_comments_link( '<span class="meta-nav"><svg><use xlink:href="' . esc_url( ideapark_svg_url() ) . '#svg-angle-left" /></svg></span>' . esc_html__( 'Older Comments', 'kidz' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'kidz' ) . '<span class="meta-nav"><svg><use xlink:href="' . esc_url( ideapark_svg_url() ) . '#svg-angle-right" /></svg></span>' ); ?></div>
				</nav><!-- #comments-nav-below -->
			<?php endif; // Check for comment navigation. ?>

		<?php endif; // have_comments() ?>

		<?php comment_form(); ?>

	</div><!-- #comments -->
<?php } ?>
