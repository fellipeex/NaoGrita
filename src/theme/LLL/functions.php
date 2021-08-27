<?php 

/**
 * LLL functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LLL
 */

/**
* Enqueue scripts and styles.
*/

require_once get_template_directory(  ) . '/inc/customizer.php';
function lll_scripts(){
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js', array( 'jquery' ), '4.4.1', true );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '4.4.1', 'all' );
 	// Theme's main stylesheet
 	wp_enqueue_style( 'lll-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ), 'all' );

	 	// Google Fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&display=swap|Seaweed-Script' );
	//wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap' );
	//wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;800&display=swap' );
		
	// Flexslider
 	wp_enqueue_style( 'flexslider-css', get_template_directory_uri() . '/inc/flexslider/flexslider.css', array(), '2.7.2', 'all' );
 	wp_enqueue_script( 'flexslider-min-js', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '2.7.2', true );
 	wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/inc/flexslider/flexslider.js', array( 'jquery' ), '2.7.2', true );
}
add_action( 'wp_enqueue_scripts', 'lll_scripts' );

function lll_config(){
	require_once get_template_directory(  ) . '/inc/class-wp-bootstrap-navwalker.php';
	register_nav_menus(
		array(
			'lll_main_menu' => 'LLL Main Menu',
			'menu_footer' => 'Menu Footer'
		)
	  );

	  add_theme_support( 'woocommerce', array(
		'thumbnail_image_width'		=> 255,
		'single_image_width'		=> 255,
		'product_grid'				=> array(
	            'default_rows'    => 10,
	            'min_rows'        => 5,
	            'max_rows'        => 10,
	            'default_columns' => 3,
	            'min_columns'     => 1,
	            'max_columns'     => 3,			
		)
	) );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
	add_theme_support( 'custom-logo' , array(
		'height'		=> 95,
		'width'			=> 80,
		'flex_height'	=> true,
		'flex_width'	=> true
	) );

	add_image_size( 'size-slider', 1080, 864, array( 'center', 'center' ) );

	if ( ! isset( $content_width ) ) {
		$content_width = 600;
	}
}

add_action('after_setup_theme', 'lll_config', 0); 
if( class_exists('Woocommerce')){
	require get_template_directory() . '/inc/wc-modifications.php';
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'lll_woocommerce_header_add_to_cart_fragment' );

function lll_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}