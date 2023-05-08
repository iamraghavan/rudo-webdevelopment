<?php
/**
 * WooCommerce MiniCart Count
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'fitness_blog_refresh_mini_cart_count' );
function fitness_blog_refresh_mini_cart_count( $fragments ) {
	ob_start();
	?>
	<div id="minicarcount">
		<?php echo WC()->cart->get_cart_contents_count(); ?>
	</div>
	<?php
		$fragments['#minicarcount'] = ob_get_clean();
	return $fragments;
}
/**
 * Wrapper Markup
 */
add_action( 'woocommerce_before_main_content', 'fitness_blog_woo_before_main_content', 10 );
function fitness_blog_woo_before_main_content() {
	?>
	<section class="shop-page-main-block">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
	<?php
}
add_action( 'woocommerce_after_main_content', 'fitness_blog_woo_after_main_content', 10 );
function fitness_blog_woo_after_main_content() {
	?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
// Remove Woocommerce Default Sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
// Remove WooCommerce Default Breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_filter( 'woocommerce_show_page_title', 'fitness_blog_woocommerce_default_title_false' );
function fitness_blog_woocommerce_default_title_false( $default ) {
	return false;
}