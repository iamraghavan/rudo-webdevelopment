<?php
/**
 * Search form template
 *
 * @package Roven-Blog
 */

if ( ! isset( $args['header_search'] ) ) {
	$args['header_search'] = false;
}

if ( true === $args['header_search'] ) {
	// Alternative search form intended for header menus.
	?>
	<div id="rb-search">

		<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="rb-search-form" method="get" name="searchform" role="search">

			<label for="s" class="screen-reader-text"><?php esc_html_e( 'Search input', 'roven-blog' ); ?></label> 

			<button type="submit" name="submit" id="rb-search-submit"><i class="rovenblog-icon-search"></i></button>

			<input type="search" value="" name="s" id="s" data-swplive="true" placeholder="<?php esc_attr_e( 'Enter your search topic...', 'roven-blog' ); ?>">

			<button id="rb-search-close"><i class="rovenblog-icon-x"></i></button>

		</form>

		<div id="rb-searchwp-container"></div>

	</div>
	<?php
} else {
	// General search form.
	?>
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" role="search">

		<label>
			<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'roven-blog' ); ?></span>
			<input class="search-field" placeholder="<?php esc_attr_e( 'Search …', 'roven-blog' ); ?>" value="" name="s" type="search">
		</label>

		<input class="search-submit" value="Search" type="submit">

	</form>
	<?php
}
