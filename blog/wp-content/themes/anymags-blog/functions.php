<?php
function anymags_blog_enqueue_scripts()
{

    wp_enqueue_script('anymags-blog-main', get_stylesheet_directory_uri() . '/assets/js/anymags-main.js', array(
        'jquery'
    ) , true);
    wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/assets/js/slick.js', array(
        'jquery'
    ) , true);

    wp_enqueue_style('anymags-parent-style', get_template_directory_uri() . '/style.css');

    wp_enqueue_style('anymags-blog-style', get_stylesheet_uri());
    wp_enqueue_style('anymags-blog-slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css');

    wp_enqueue_style('anymags-blog-font', 'https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300&family=Poppins:wght@100;300;400;500;600&display=swap');

    wp_enqueue_style('font-awesome-css-child', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css');
}
add_action('wp_enqueue_scripts', 'anymags_blog_enqueue_scripts');

require get_stylesheet_directory() . '/include/customizer.php';