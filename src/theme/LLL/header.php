<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <header>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LLL
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page" class="site">
		<header>
			<section class="offer">
				<div class="promocao">
				<marquee behavior="scroll" direction="right"> Promoção de camisetas </marquee>
				</div> 
			</section>
			<section class="top-bar">
				<div class="container">
					<div class="row linha">
						<div class="brand col-12 col-md-2 col-lg-2 text-center text-md-left">
						<a href="<?php echo home_url( '/' ); ?>">
								<?php if( has_custom_logo() ): ?>
									<?php the_custom_logo(); ?>
								<?php else: ?>
									<p class="site-title"><?php bloginfo( 'title' ); ?></p>
								<?php endif; ?>
							</a>
						</div>
						<div class="second-column col-12 col-md-10 col-lg-10">
							<div class="row">
								<section class="search col-12 col-md-6 col-lg-7"> 
									<div class="pesquisa text-center text-md-left"><?php get_search_form();
									?></div>
								</section>
								<?php if(class_exists('Woocommerce')):?>
								<div class="account col-9 col-md-4 col-lg-3 ml-auto">
									<div class="navbar-expand">
										<ul class="navbar-nav float-left">
											<?php if( is_user_logged_in() ): ?>
											<li>
												<a class="nav-link" href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">My Account</a>
											</li>
											<li>
												<a class="nav-link" href="<?php echo esc_url( wp_logout_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ); ?>">Logout</a>
											</li>
											<?php else: ?>	
											<li>
												<a class="nav-link" href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">Login / Register</a>
											</li>												
											<?php endif; ?>										
										</ul>
									</div>
								</div>	
								<div class="ml-auto account">
									<div class="cart text-right"> 
										<a href="<?php echo wc_get_cart_url();?>"> <span class="cart-icon">	</span></a>
										<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
									</div>
								</div>
								<?php endif;?>
							</div>	<!-- row -->
							<nav class="main-menu navbar navbar-expand-md navbar-light" role="navigation">
							    <!-- Brand and toggle get grouped for better mobile display -->
							    <button class="mr-auto navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
							        <span class="navbar-toggler-icon"></span>
							    </button>
							        <?php
							        wp_nav_menu( array(
							            'theme_location'    => 'lll_main_menu',
							            'depth'             => 3,
							            'container'         => 'div',
							            'container_class'   => 'collapse navbar-collapse',
							            'container_id'      => 'bs-example-navbar-collapse-1',
							            'menu_class'        => 'nav navbar-nav',
							            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							            'walker'            => new WP_Bootstrap_Navwalker(),
							        ) );
							        ?>
							</nav>

						</div>
					</div>
				</div>
			</section>
		</header>