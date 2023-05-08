<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fitness Blog
 */

$show_footer_social_links = get_theme_mod('show_footer_social_links', false);
?>
</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<!-- Footer Sidebar -->
	<?php get_template_part('template-parts/footer/footer', 'sidebar'); ?>
	<!-- Footer Copyright Section -->
	<section class="site-copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-12 align-self-center">
					<div class="site-info text-center">
						<div class="site-copyright-text d-inline-block">
						<?php
						echo wp_kses_post( get_theme_mod('copyright_text', __( 'Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2023. All rights reserved.', 'fitness-blog' )));
						?>
						</div>
					</div><!-- .site-info -->
					<div class="theme-credit-link-wrapper text-center">
						<span class="themeby"><?php esc_html_e('Theme By: ', 'fitness-blog');?><a href="<?php echo esc_url(fitness_blog_author_uri());?>"><?php echo esc_html(fitness_blog_author());?></a></span>
					</div>
				</div>
			</div>
		</div>
	</section>
</footer><!-- #colophon -->
<div class="scrooltotop">
	<a href="#" class="fa fa-angle-up"></a>
</div>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
