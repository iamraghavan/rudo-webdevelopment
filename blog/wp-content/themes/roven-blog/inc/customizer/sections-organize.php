<?php
/**
 * The template for displaying for organizing sections
 *
 * @package Roven-Blog
 */

/**
 * Reorganizes sections.
 *
 * @param object $wp_customize - cutomizer object.
 */
function rovenblog_organize_sections( $wp_customize ) {
	$wp_customize->remove_control( 'custom_logo' );

	if ( class_exists( 'Kirki' ) ) {
		// Section titles and separators.
		$wp_customize->add_section(
			new RovenBlog_Title_Section(
				$wp_customize,
				'rovenblog_site_styling',
				array(
					'title'    => __( 'Site Styling', 'roven-blog' ),
					'priority' => 10,
				)
			)
		);

		$wp_customize->add_section(
			new RovenBlog_Title_Section(
				$wp_customize,
				'rovenblog_navigation',
				array(
					'title'    => __( 'Navigation', 'roven-blog' ),
					'priority' => 20,
				)
			)
		);

		$wp_customize->add_section(
			new RovenBlog_Title_Section(
				$wp_customize,
				'rovenblog_pages',
				array(
					'title'    => __( 'Pages', 'roven-blog' ),
					'priority' => 30,
				)
			)
		);

		$wp_customize->add_section(
			new RovenBlog_Title_Section(
				$wp_customize,
				'rovenblog_blog',
				array(
					'title'    => __( 'Blog', 'roven-blog' ),
					'priority' => 40,
				)
			)
		);

		if ( class_exists( 'woocommerce' ) ) {

			$wp_customize->add_section(
				new RovenBlog_Title_Section(
					$wp_customize,
					'rovenblog_shop',
					array(
						'title'    => __( 'Shop', 'roven-blog' ),
						'priority' => 50,
					)
				)
			);

		}

		if ( $wp_customize->get_panel( 'woocommerce' ) ) {
			$wp_customize->get_panel( 'woocommerce' )->priority = 52;
		}

		$wp_customize->add_section(
			new RovenBlog_Title_Section(
				$wp_customize,
				'rovenblog_other',
				array(
					'title'    => __( 'Other', 'roven-blog' ),
					'priority' => 60,
				)
			)
		);

		$wp_customize->add_section(
			new RovenBlog_Title_Section(
				$wp_customize,
				'rovenblog_default',
				array(
					'title'    => __( 'WordPress Core', 'roven-blog' ),
					'priority' => 70,
				)
			)
		);

		/**
		 * Reorder customizer core sections and panels.
		 */
		// Site identity.
		if ( $wp_customize->get_section( 'title_tagline' ) ) {
			$wp_customize->get_section( 'title_tagline' )->priority = 71;
		}
		// Widgets.
		if ( $wp_customize->get_panel( 'widgets' ) ) {
			$wp_customize->get_panel( 'widgets' )->priority = 72;
		}
		// Menus.
		if ( $wp_customize->get_panel( 'nav_menus' ) ) {
			$wp_customize->get_panel( 'nav_menus' )->priority = 73;
		}
		// Homepage Settings.
		if ( $wp_customize->get_section( 'static_front_page' ) ) {
			$wp_customize->get_section( 'static_front_page' )->priority = 74;
		}
		// Additional CSS.
		if ( $wp_customize->get_section( 'custom_css' ) ) {
			$wp_customize->get_section( 'custom_css' )->priority = 75;
		}
	} else {
		// Recommend Kirki install and activation.
		$wp_customize->add_section(
			new RovenBlog_Button_Section(
				$wp_customize,
				'rovenblog_discover_pro',
				array(
					'mode'     => 1,
					'priority' => 1,
				)
			)
		);
	}

	// remove freemius sections from customizer.
	if ( $wp_customize->get_section( 'freemius_upsell' ) ) {
		$wp_customize->remove_section( 'freemius_upsell' );
	}
	if ( $wp_customize->get_section( 'fs_customizer_suppor' ) ) {
		$wp_customize->remove_section( 'fs_customizer_suppor' );
	}
}

add_action( 'customize_register', 'rovenblog_organize_sections', 99 );
