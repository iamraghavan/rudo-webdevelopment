<?php

/**
 * The template for displaying Blog Archives Featured Posts Customizer Settings
 *
 * @package Roven-Blog
 */
// Blog Archives Featured Posts section.
new \Kirki\Section( 'rovenblog_archive_featured', array(
    'title'    => esc_html__( 'Blog Archives Featured Posts', 'roven-blog' ),
    'priority' => 42,
) );