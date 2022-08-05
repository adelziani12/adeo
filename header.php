<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
	<meta name="format-detection" content="telephone=no"/>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="ajax-search" class="<?php echo ideapark_mod( 'search_type' ); ?> hidden">
	<div class="container ajax-search-container">
		<div class="ajax-search-tip"><?php esc_html_e( 'What you are looking for?', 'kidz' ); ?></div>
		<?php
		add_filter( 'get_search_form', 'ideapark_search_form_ajax', 100 );
		get_search_form();
		$f = 'remove_filter';
		call_user_func( $f, 'get_search_form', 'ideapark_search_form_ajax', 100 );
		?>
	</div>
</div>
<?php if ( ideapark_mod( 'search_type' ) != 'search-type-3' ) { ?>
	<div id="ajax-search-result" class="<?php echo ideapark_mod( 'search_type' ); ?> loading">
		<div class="container ajax-search-result-container js-ajax-search-result"></div>
	</div>
<?php } ?>
<div class="search-shadow <?php echo ideapark_mod( 'search_type' ); ?> hidden">
	<span class="ip-shop-loop-loading"><i></i><i></i><i></i></span>
</div>
<?php if ( ideapark_mod( 'store_notice' ) == 'top' && function_exists( 'woocommerce_demo_store' ) ) {
	woocommerce_demo_store();
	ideapark_ra( 'wp_footer', 'woocommerce_demo_store' );
} ?>
<div id="wrap"
	 class="<?php echo ideapark_mod( 'search_type' ); ?> <?php if ( ideapark_mod( 'home_boxed' ) === 'boxed' ) { ?>wrap--boxed<?php } elseif ( ideapark_mod( 'home_boxed' ) === 'boxed-white' ) { ?>wrap--boxed wrap--boxed-white<?php } ?>">
	<header id="header">
		<?php get_template_part( 'inc/home-top-menu' ); ?>
		<div class="main-menu">
			<div class="container">
				<a class="mobile-menu" onclick="return false;">
					<svg>
						<use xlink:href="<?php echo esc_url( ideapark_svg_url() ); ?>#svg-bars"/>
					</svg>
				</a>
				<div class="container-2">
					<div class="header-buttons">
						<?php get_template_part( 'inc/header-wishlist' ); ?>
						<?php if ( ideapark_mod( 'icon_search' ) ) { ?>
							<a class="search" onclick="return false;">
								<svg>
									<use xlink:href="<?php echo esc_url( ideapark_svg_url() ); ?>#svg-search"/>
								</svg>
							</a>
						<?php } ?>
						<?php if ( ideapark_mod( 'icon_auth' ) && get_option( 'woocommerce_myaccount_page_id' ) ) { ?>
							<a class="icon-auth"
							   href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>"
							   rel="nofollow">
								<svg>
									<use xlink:href="<?php echo esc_url( ideapark_svg_url() ); ?>#svg-user"/>
								</svg>
							</a>
						<?php } ?>
						<?php if ( ideapark_woocommerce_on() && ideapark_mod( 'icon_cart' ) ) { ?>
							<a class="cart-info" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
								<svg>
									<use xlink:href="<?php echo esc_url( ideapark_svg_url() ); ?>#svg-cart"/>
								</svg><?php echo ideapark_cart_info(); ?>
							</a>
						<?php } ?>
					</div>
					<?php if ( ideapark_mod( 'header_type' ) != 'header-type-1' ) { ?>
						<?php get_template_part( 'inc/soc' ); ?>
					<?php } ?>
					<?php get_template_part( 'inc/header-logo' ); ?>
				</div>

				<div class="menu-shadow hidden"></div>

				<?php $buttons_count = ( ideapark_woocommerce_on() && ideapark_mod( 'wishlist_enabled' ) && ideapark_mod( 'wishlist_page' ) ? 1 : 0 ) +
				                       ( ideapark_mod( 'icon_search' ) ? 1 : 0 ) +
				                       ( ideapark_mod( 'icon_auth' ) && get_option( 'woocommerce_myaccount_page_id' ) ? 1 : 0 ) +
				                       ( ideapark_woocommerce_on() && ideapark_mod( 'icon_cart' ) ? 1 : 0 ); ?>
				<?php $is_mobile_auth = ( ideapark_woocommerce_on() && ( ideapark_mod( 'top_menu_auth' ) || ideapark_mod( 'icon_auth' ) ) ); ?>
				<div class="product-categories product-categories--<?php echo esc_attr( $buttons_count ); ?> <?php if (!$is_mobile_auth) { ?>product-categories--no-auth<?php } ?>">
					<?php get_template_part( 'inc/main-menu' ); ?>
					<?php ideapark_mod_set_temp( '_is_mobile_header', true ); ?>
					<a class="mobile-menu-close" onclick="return false;">
						<svg>
							<use xlink:href="<?php echo esc_url( ideapark_svg_url() ); ?>#svg-close"/>
						</svg>
					</a>
					<?php if ( $is_mobile_auth ) { ?>
						<div class="auth"><?php echo ideapark_get_account_link(); ?></div>
					<?php } ?>
					<a onclick="return false;" class="mobile-menu-back">
						<svg>
							<use xlink:href="<?php echo esc_url( ideapark_svg_url() ); ?>#svg-angle-left"/>
						</svg>
						<?php esc_html_e( 'Back', 'kidz' ); ?>
					</a>
					<?php get_template_part( 'inc/header-wishlist' ); ?>
					<?php if ( ideapark_mod( 'icon_search' ) ) { ?>
						<a class="mobile-search" onclick="false;">
							<svg>
								<use xlink:href="<?php echo esc_url( ideapark_svg_url() ); ?>#svg-search"/>
							</svg>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</header>