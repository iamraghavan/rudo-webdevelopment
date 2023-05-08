<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fitness_blog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Area', 'fitness-blog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fitness-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
        	'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar One', 'fitness-blog' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'fitness-blog' ),
			'before_widget' => '<section id="%1$s" class="footer-sidebar widget footer-sidebar-1 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title footer-title">',
        	'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar Two', 'fitness-blog' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'fitness-blog' ),
			'before_widget' => '<section id="%1$s" class="footer-sidebar widget footer-sidebar-2 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title footer-title">',
        	'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar Three', 'fitness-blog' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'fitness-blog' ),
			'before_widget' => '<section id="%1$s" class="footer-sidebar widget footer-sidebar-3 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title footer-title">',
        	'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar Four', 'fitness-blog' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'fitness-blog' ),
			'before_widget' => '<section id="%1$s" class="footer-sidebar widget footer-sidebar-4 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title footer-title">',
        	'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fitness_blog_widgets_init' );
