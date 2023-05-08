<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Roven-Blog
 */

if ( !function_exists( 'rovenblog_body_classes' ) ) {
    /**
     * Adds custom classes to the array of body classes.
     *
     * @param array $classes - contains the WordPress body.
     */
    function rovenblog_body_classes( $classes )
    {
        // Adds a class of hfeed to non-singular pages.
        if ( !is_singular() ) {
            $classes[] = 'hfeed';
        }
        if ( true === get_theme_mod( 'rovenblog_sticky_header_on_mobile', true ) ) {
            $classes[] = 'rb-sticky-header-mobile';
        }
        if ( true === get_theme_mod( 'rovenblog_sticky_header_on_desktop', true ) ) {
            $classes[] = 'rb-sticky-header-desktop';
        }
        $woocommerce_page = false;
        // Determine the current type of page and prepare the relevant sidebar classes.
        
        if ( is_home() && is_front_page() || is_front_page() ) {
            
            if ( true === get_theme_mod( 'rovenblog_home_show_sidebar', true ) ) {
                $classes[] = 'rb-has-sidebar';
                if ( true === get_theme_mod( 'rovenblog_enable_sticky_sidebar', true ) ) {
                    $classes[] = 'rb-sticky-sidebar';
                }
            }
        
        } elseif ( true === $woocommerce_page ) {
            $classes[] = 'rb-woocommerce-main';
        } elseif ( is_search() ) {
            
            if ( true === get_theme_mod( 'rovenblog_search_show_sidebar', true ) ) {
                $classes[] = 'rb-has-sidebar';
                if ( true === get_theme_mod( 'rovenblog_enable_sticky_sidebar', true ) ) {
                    $classes[] = 'rb-sticky-sidebar';
                }
            }
        
        } elseif ( is_author() ) {
            
            if ( true === get_theme_mod( 'rovenblog_author_show_sidebar', true ) ) {
                $classes[] = 'rb-has-sidebar';
                if ( true === get_theme_mod( 'rovenblog_enable_sticky_sidebar', true ) ) {
                    $classes[] = 'rb-sticky-sidebar';
                }
            }
        
        } elseif ( is_page() ) {
            $classes[] = 'rb-page-main';
        } elseif ( is_single() ) {
            
            if ( true === get_theme_mod( 'rovenblog_post_show_sidebar' ) ) {
                $classes[] = 'rb-has-sidebar';
                if ( true === get_theme_mod( 'rovenblog_enable_sticky_sidebar', true ) ) {
                    $classes[] = 'rb-sticky-sidebar';
                }
            }
        
        } elseif ( is_category() || is_tag() || is_date() ) {
            
            if ( true === get_theme_mod( 'rovenblog_archive_show_sidebar', true ) ) {
                $classes[] = 'rb-has-sidebar';
                if ( true === get_theme_mod( 'rovenblog_enable_sticky_sidebar', true ) ) {
                    $classes[] = 'rb-sticky-sidebar';
                }
            }
        
        }
        
        return $classes;
    }
    
    add_filter( 'body_class', 'rovenblog_body_classes' );
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function rovenblog_pingback_header()
{
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}

add_action( 'wp_head', 'rovenblog_pingback_header' );
/**
 * This function prepares the arguments for thumbnail image size, class, srcset and sizes.
 *
 * @param string $thumb_type - indicates the thumbnail main aspect ratio.
 * @param int    $lazy - indicates if the thumnail should have a lazy loading class.
 * @param int    $mode - indicates the thumnail is for cards with object-fit, which require diferent aspect ratio on smaller devices.
 * @param string $limit - indicates if the function is used by home header or featured posts.
 */
function rovenblog_thumb_size_args(
    $thumb_type,
    $lazy = 1,
    $mode = 1,
    $limit = '-max'
)
{
    // Prepare the post thumbnail class and ratio variables.
    $thumb_id = get_post_thumbnail_id();
    $thumb_size = 'rovenblog-' . $thumb_type . $limit;
    
    if ( 'masonry' === $thumb_type || 0 === $mode ) {
        
        if ( '-full' === $limit ) {
            $thumb_args = array(
                'srcset' => wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-full' ) . ' 1980w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-mid' ) . ' 1024w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-min' ) . ' 810w',
                'sizes'  => '(max-width: 767.98px) 810px, (max-width: 991px) 1024px, 1980px',
            );
        } elseif ( '-max' === $limit ) {
            $thumb_args = array(
                'srcset' => wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-max' ) . ' 1353w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-mid' ) . ' 1024w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-min' ) . ' 810w',
                'sizes'  => '(max-width: 767.98px) 810px, (max-width: 991px) 1024px, 1353px',
            );
        } elseif ( '-mid' === $limit ) {
            $thumb_args = array(
                'srcset' => wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-mid' ) . ' 1353w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-min' ) . ' 810w',
                'sizes'  => '(max-width: 767.98px) 810px, 1024px',
            );
        } else {
            $thumb_args = array(
                'srcset' => wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-min' ) . ' 810w',
                'sizes'  => '810px',
            );
        }
    
    } elseif ( 1 === $mode && ('hero' === $thumb_type || 'landscape' === $thumb_type) ) {
        
        if ( '-full' === $limit ) {
            $thumb_args = array(
                'srcset' => wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-full' ) . ' 1980w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-square-mid' ) . ' 1024w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-portrait-min' ) . ' 810w',
                'sizes'  => '(max-width: 767.98px) 810px, (max-width: 991px) 1024px, 1980px',
            );
        } elseif ( '-max' === $limit ) {
            $thumb_args = array(
                'srcset' => wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-max' ) . ' 1353w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-square-mid' ) . ' 1024w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-portrait-min' ) . ' 810w',
                'sizes'  => '(max-width: 767.98px) 810px, (max-width: 991px) 1024px, 1353px',
            );
        } elseif ( '-mid' === $limit ) {
            $thumb_args = array(
                'srcset' => wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-mid' ) . ' 932w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-square-mid' ) . ' 1024w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-portrait-min' ) . ' 810w',
                'sizes'  => '(max-width: 767.98px) 810px, (max-width: 992px) 1024px, 932px',
            );
        } else {
            $thumb_args = array(
                'srcset' => wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-min' ) . ' 932w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-square-min' ) . ' 1024w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-portrait-min' ) . ' 810w',
                'sizes'  => '(max-width: 767.98px) 810px, (max-width: 992px) 1024px, 932px',
            );
        }
    
    } else {
        
        if ( '-full' === $limit ) {
            $thumb_args = array(
                'srcset' => wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-full' ) . ' 1980w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-mid' ) . ' 1024w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-portrait-min' ) . ' 810w',
                'sizes'  => '(max-width: 767.98px) 810px, (max-width: 991px) 1024px, 1980px',
            );
        } elseif ( '-max' === $limit ) {
            $thumb_args = array(
                'srcset' => wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-max' ) . ' 1353w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-mid' ) . ' 1024w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-portrait-min' ) . ' 810w',
                'sizes'  => '(max-width: 767.98px) 810px, (max-width: 991px) 1024px, 1353px',
            );
        } elseif ( '-mid' === $limit ) {
            $thumb_args = array(
                'srcset' => wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-mid' ) . ' 1024w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-portrait-min' ) . ' 810w',
                'sizes'  => '(max-width: 767.98px) 810px, 1024px',
            );
        } else {
            $thumb_args = array(
                'srcset' => wp_get_attachment_image_url( $thumb_id, 'rovenblog-' . $thumb_type . '-min' ) . ' 1024w, ' . wp_get_attachment_image_url( $thumb_id, 'rovenblog-portrait-min' ) . ' 810w',
                'sizes'  => '(max-width: 767.98px) 810px, 1024px',
            );
        }
    
    }
    
    if ( 1 === $lazy ) {
        $thumb_args['class'] = 'lozad';
    }
    $thumb_data = array(
        'size' => $thumb_size,
        'args' => $thumb_args,
    );
    return $thumb_data;
}

/**
 * Function for modified pagination.
 */
function rovenblog_pagination()
{
    the_posts_pagination( array(
        'mid_size'           => 1,
        'prev_next'          => true,
        'prev_text'          => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Prev', 'roven-blog' ) . '</span>',
        'next_text'          => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Next', 'roven-blog' ) . '</span>',
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Current page:', 'roven-blog' ) . ' </span>',
    ) );
}

// Check if theme lazy loading is enabled.

if ( true === get_theme_mod( 'rovenblog_lazy_loading', true ) ) {
    // Disable WordPress default lazyload to avoid potential issues with the theme lazy load script.
    add_filter( 'wp_lazy_loading_enabled', '__return_false' );
    add_filter( 'wp_content_img_tag', 'rovenblog_content_image' );
    /**
     * Add the lozad class to images for the theme lazy loading script.
     *
     * @param string $filtered_image - full img tag with attributes.
     */
    function rovenblog_content_image( $filtered_image )
    {
        $filtered_image = str_replace( 'class="', 'class="lozad ', $filtered_image );
        return $filtered_image;
    }

}

/**
 * Wrap Gutenberg video, audio and gallery blocks.
 *
 * @param string $block_content - The block content about to be appended.
 * @param array  $block - The full block, including name and attributes.
 */
function rovenblog_wrap_block( $block_content, $block )
{
    if ( !isset( $block['blockName'] ) ) {
        $block['blockName'] = '';
    }
    if ( !isset( $block['attrs']['type'] ) ) {
        $block['attrs']['type'] = '';
    }
    if ( !isset( $block['attrs']['providerNameSlug'] ) ) {
        $block['attrs']['providerNameSlug'] = '';
    }
    
    if ( !has_blocks() ) {
        $block_content = str_replace( array( '<iframe', '</iframe>' ), array( '<div class="rb-media-wrapper rb-media-video"><iframe', '</iframe></div>' ), $block_content );
    } elseif ( 'core/gallery' === $block['blockName'] ) {
        // Media Gallery block.
        $block_content = '<div class="rb-gallery-wrapper rb-media-gallery">' . $block_content . '</div>';
    } elseif ( 'core/embed' === $block['blockName'] && 'video' === $block['attrs']['type'] || 'core/video' === $block['blockName'] ) {
        // Video embed block.
        $block_content = '<div class="rb-media-wrapper rb-media-video">' . $block_content . '</div>';
    } elseif ( 'core/embed' === $block['blockName'] && 'audio' === $block['attrs']['type'] || 'core/audio' === $block['blockName'] ) {
        // Audio embed block.
        $block_content = '<div class="rb-media-wrapper rb-media-audio">' . $block_content . '</div>';
    } elseif ( 'core/embed' === $block['blockName'] && ('soundcloud' === $block['attrs']['providerNameSlug'] || 'mixcloud' === $block['attrs']['providerNameSlug']) ) {
        // Video embed block.
        $block_content = '<div class="rb-media-wrapper rb-media-audio">' . $block_content . '</div>';
    } elseif ( 'core/embed' === $block['blockName'] ) {
        // Video embed block.
        $block_content = '<div class="rb-media-wrapper rb-media-video">' . $block_content . '</div>';
    }
    
    return $block_content;
}

add_filter(
    'render_block',
    'rovenblog_wrap_block',
    10,
    2
);
/**
 * Function used for increasing the post views count.
 *
 * @param int $post_id - the views count will be increased for the post with this id.
 */
function rovenblog_view_count( $post_id = 0 )
{
    
    if ( 0 !== $post_id ) {
        $count = get_post_meta( $post_id, 'post_views', true );
        
        if ( '' === $count ) {
            // There were no views so far for the specified post, add one default view.
            update_post_meta( $post_id, 'post_views', '1' );
        } else {
            // Increase the post view count by 1 and register the new view count.
            $count++;
            update_post_meta( $post_id, 'post_views', $count );
        }
    
    }

}

add_action( 'wp_ajax_rovenblog_count_start', 'rovenblog_count_call_check' );
add_action( 'wp_ajax_nopriv_rovenblog_count_start', 'rovenblog_count_call_check' );
/**
 * This function is used for checking the ajax call for post view counting.
 */
function rovenblog_count_call_check()
{
    if ( isset( $_POST['action'] ) && isset( $_POST['rb_nonce'] ) ) {
        // Check the ajax call provided data.
        
        if ( 'rovenblog_count_start' === $_POST['action'] && false !== wp_verify_nonce( sanitize_key( $_POST['rb_nonce'] ), 'rovenblog-viewcount-nonce' ) ) {
            // Check the provided post id.
            
            if ( !isset( $_POST['rb_post_id'] ) ) {
                $post_id = (int) $_POST['rb_post_id'];
            } else {
                exit;
            }
            
            rovenblog_view_count( $post_id );
        }
    
    }
    exit;
}

/**
 * This function is used for infinite scroll posts/products loop, via Jetpack infinite scroll render parameter.
 */
function rovenblog_posts_loop()
{
    
    if ( class_exists( 'WooCommerce' ) && (is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag()) ) {
        // Woocommerce products loop.
        woocommerce_product_loop_start();
        while ( have_posts() ) {
            the_post();
            wc_get_template_part( 'content', 'product' );
        }
        woocommerce_product_loop_end();
    } else {
        // Theme posts loop.
        
        if ( is_home() && is_front_page() || is_front_page() ) {
            // Main Home Posts Customizer arguments.
            $style_type = get_theme_mod( 'rovenblog_home_recent_posts_style', 'style8' );
            $nr_cols = intval( get_theme_mod( 'rovenblog_home_recent_posts_grid_cols', 1 ) );
            $grid_type = 'grid';
            $thumbnail_type = get_theme_mod( 'rovenblog_home_recent_posts_aspect', 'landscape' );
            $category_enable = get_theme_mod( 'rovenblog_home_recent_posts_category', true );
            $excerpt_enable = get_theme_mod( 'rovenblog_home_recent_posts_excerpt', true );
            $sidebar = get_theme_mod( 'rovenblog_home_show_sidebar', true );
            $grid_width = intval( get_theme_mod( 'rovenblog_max_width_content', 1230 ) );
            $rb_fullwidth = false;
            // Determine the most suitable image size for the selected image aspect based on the number of columns and grid width.
            
            if ( 1 === $nr_cols && (1600 < $grid_width || true === $rb_fullwidth) ) {
                $thumbnail_size = '-full';
            } elseif ( 1 === $nr_cols ) {
                
                if ( true === $sidebar && 1400 >= $grid_width ) {
                    $thumbnail_size = '-mid';
                } else {
                    $thumbnail_size = '-max';
                }
            
            } elseif ( 2 === $nr_cols ) {
                
                if ( true !== $sidebar && (1400 < $grid_width || true === $rb_fullwidth) ) {
                    $thumbnail_size = '-mid';
                } else {
                    $thumbnail_size = '-min';
                }
            
            } else {
                $thumbnail_size = '-min';
            }
            
            if ( 'masonry' === $grid_type ) {
                $thumbnail_type = 'masonry';
            }
            // Prepare post template arguments.
            
            if ( 'style1' === $style_type || 'style2' === $style_type ) {
                $args = array(
                    'category_enable' => $category_enable,
                    'thumbnail_type'  => $thumbnail_type,
                    'thumbnail_limit' => $thumbnail_size,
                    'excerpt_enable'  => $excerpt_enable,
                );
            } else {
                // Post style 3, 4, 5, 6 and 7 specific arguments.
                $icons_enable = false;
                $author_enable = get_theme_mod( 'rovenblog_home_recent_posts_author', true );
                $date_enable = get_theme_mod( 'rovenblog_home_recent_posts_date', true );
                $comments_enable = get_theme_mod( 'rovenblog_home_recent_posts_comments', true );
                $args = array(
                    'category_enable' => $category_enable,
                    'thumbnail_type'  => $thumbnail_type,
                    'thumbnail_limit' => $thumbnail_size,
                    'icons_enable'    => $icons_enable,
                    'author_enable'   => $author_enable,
                    'date_enable'     => $date_enable,
                    'comments_enable' => $comments_enable,
                    'excerpt_enable'  => $excerpt_enable,
                );
            }
        
        } elseif ( is_search() ) {
            // Search posts Customizer arguments.
            $style_type = get_theme_mod( 'rovenblog_search_style', 'style8' );
            $category_enable = get_theme_mod( 'rovenblog_search_category', true );
            $thumbnail_type = get_theme_mod( 'rovenblog_search_aspect', 'landscape' );
            $excerpt_enable = get_theme_mod( 'rovenblog_search_excerpt', true );
            $sidebar = get_theme_mod( 'rovenblog_search_show_sidebar', true );
            $grid_width = intval( get_theme_mod( 'rovenblog_max_width_content', 1230 ) );
            $nr_cols = intval( get_theme_mod( 'rovenblog_search_grid_columns', 1 ) );
            $rb_fullwidth = false;
            // Determine the most suitable image size for the selected image aspect based on the number of columns and grid width.
            
            if ( 1 === $nr_cols && (1600 < $grid_width || true === $rb_fullwidth) ) {
                $thumbnail_size = '-full';
            } elseif ( 1 === $nr_cols ) {
                
                if ( true === $sidebar && 1400 >= $grid_width ) {
                    $thumbnail_size = '-mid';
                } else {
                    $thumbnail_size = '-max';
                }
            
            } elseif ( 2 === $nr_cols ) {
                
                if ( true !== $sidebar && (1400 < $grid_width || true === $rb_fullwidth) ) {
                    $thumbnail_size = '-mid';
                } else {
                    $thumbnail_size = '-min';
                }
            
            } else {
                $thumbnail_size = '-min';
            }
            
            // Prepare post template arguments.
            
            if ( 'style1' === $style_type || 'style2' === $style_type ) {
                $args = array(
                    'category_enable' => $category_enable,
                    'thumbnail_type'  => $thumbnail_type,
                    'thumbnail_limit' => $thumbnail_size,
                    'excerpt_enable'  => $excerpt_enable,
                );
            } else {
                // Post style 3, 4, 5, 6 and 7 specific arguments.
                $icons_enable = false;
                $author_enable = get_theme_mod( 'rovenblog_search_author', true );
                $date_enable = get_theme_mod( 'rovenblog_search_date', true );
                $comments_enable = get_theme_mod( 'rovenblog_search_comments', true );
                $args = array(
                    'category_enable' => $category_enable,
                    'thumbnail_type'  => $thumbnail_type,
                    'thumbnail_limit' => $thumbnail_size,
                    'icons_enable'    => $icons_enable,
                    'author_enable'   => $author_enable,
                    'date_enable'     => $date_enable,
                    'comments_enable' => $comments_enable,
                    'excerpt_enable'  => $excerpt_enable,
                );
            }
        
        } elseif ( is_author() ) {
            // author posts Customizer arguments.
            $style_type = get_theme_mod( 'rovenblog_author_style', 'style8' );
            $category_enable = get_theme_mod( 'rovenblog_author_category', true );
            $thumbnail_type = get_theme_mod( 'rovenblog_author_aspect', 'landscape' );
            $excerpt_enable = get_theme_mod( 'rovenblog_author_excerpt', true );
            $nr_cols = intval( get_theme_mod( 'rovenblog_author_grid_columns', 1 ) );
            $sidebar = get_theme_mod( 'rovenblog_author_show_sidebar', true );
            $grid_width = intval( get_theme_mod( 'rovenblog_max_width_content', 1230 ) );
            $rb_fullwidth = false;
            // Determine the most suitable image size for the selected image aspect based on the number of columns and grid width.
            
            if ( 1 === $nr_cols && (1600 < $grid_width || true === $rb_fullwidth) ) {
                $thumbnail_size = '-full';
            } elseif ( 1 === $nr_cols ) {
                
                if ( true === $sidebar && 1400 >= $grid_width ) {
                    $thumbnail_size = '-mid';
                } else {
                    $thumbnail_size = '-max';
                }
            
            } elseif ( 2 === $nr_cols ) {
                
                if ( true !== $sidebar && (1400 < $grid_width || true === $rb_fullwidth) ) {
                    $thumbnail_size = '-mid';
                } else {
                    $thumbnail_size = '-min';
                }
            
            } else {
                $thumbnail_size = '-min';
            }
            
            // Prepare post template arguments.
            
            if ( 'style1' === $style_type || 'style2' === $style_type ) {
                $args = array(
                    'category_enable' => $category_enable,
                    'thumbnail_type'  => $thumbnail_type,
                    'thumbnail_limit' => $thumbnail_size,
                    'excerpt_enable'  => $excerpt_enable,
                );
            } else {
                // Post style 3, 4, 5, 6 and 7 specific arguments.
                $icons_enable = false;
                $author_enable = get_theme_mod( 'rovenblog_author_author', true );
                $date_enable = get_theme_mod( 'rovenblog_author_date', true );
                $comments_enable = get_theme_mod( 'rovenblog_author_comments', true );
                $args = array(
                    'category_enable' => $category_enable,
                    'thumbnail_type'  => $thumbnail_type,
                    'thumbnail_limit' => $thumbnail_size,
                    'icons_enable'    => $icons_enable,
                    'author_enable'   => $author_enable,
                    'date_enable'     => $date_enable,
                    'comments_enable' => $comments_enable,
                    'excerpt_enable'  => $excerpt_enable,
                );
            }
        
        } else {
            // Archive/Category posts Customizer arguments.
            $style_type = get_theme_mod( 'rovenblog_archive_style', 'style8' );
            $category_enable = get_theme_mod( 'rovenblog_archive_category', true );
            $thumbnail_type = get_theme_mod( 'rovenblog_archive_aspect', 'landscape' );
            $excerpt_enable = get_theme_mod( 'rovenblog_archive_excerpt', true );
            $nr_cols = intval( get_theme_mod( 'rovenblog_archive_grid_columns', 1 ) );
            $sidebar = get_theme_mod( 'rovenblog_archive_show_sidebar', true );
            $grid_width = intval( get_theme_mod( 'rovenblog_max_width_content', 1230 ) );
            $rb_fullwidth = false;
            // Determine the most suitable image size for the selected image aspect based on the number of columns and grid width.
            
            if ( 1 === $nr_cols && (1600 < $grid_width || true === $rb_fullwidth) ) {
                $thumbnail_size = '-full';
            } elseif ( 1 === $nr_cols ) {
                
                if ( true === $sidebar && 1400 >= $grid_width ) {
                    $thumbnail_size = '-mid';
                } else {
                    $thumbnail_size = '-max';
                }
            
            } elseif ( 2 === $nr_cols ) {
                
                if ( true !== $sidebar && (1400 < $grid_width || true === $rb_fullwidth) ) {
                    $thumbnail_size = '-mid';
                } else {
                    $thumbnail_size = '-min';
                }
            
            } else {
                $thumbnail_size = '-min';
            }
            
            // Prepare post template arguments.
            
            if ( 'style1' === $style_type || 'style2' === $style_type ) {
                $args = array(
                    'category_enable' => $category_enable,
                    'thumbnail_type'  => $thumbnail_type,
                    'thumbnail_limit' => $thumbnail_size,
                    'excerpt_enable'  => $excerpt_enable,
                );
            } else {
                // Post style 3, 4, 5, 6 and 7 specific arguments.
                $icons_enable = false;
                $author_enable = get_theme_mod( 'rovenblog_archive_author', true );
                $date_enable = get_theme_mod( 'rovenblog_archive_date', true );
                $comments_enable = get_theme_mod( 'rovenblog_archive_comments', true );
                $args = array(
                    'category_enable' => $category_enable,
                    'thumbnail_type'  => $thumbnail_type,
                    'thumbnail_limit' => $thumbnail_size,
                    'icons_enable'    => $icons_enable,
                    'author_enable'   => $author_enable,
                    'date_enable'     => $date_enable,
                    'comments_enable' => $comments_enable,
                    'excerpt_enable'  => $excerpt_enable,
                );
            }
        
        }
        
        
        if ( 'masonry' === $grid_type ) {
            while ( have_posts() ) {
                ?>
				<div class="rb-masonry-grid-item">
					<?php 
                the_post();
                // Post template based on style.
                get_template_part( 'template-parts/post-styles/post', $style_type, $args );
                ?>
				</div>
				<?php 
            }
        } else {
            while ( have_posts() ) {
                ?>
				<div class="rb-grid-item">
					<?php 
                the_post();
                // Post template based on style.
                get_template_part( 'template-parts/post-styles/post', $style_type, $args );
                ?>
				</div>
				<?php 
            }
        }
    
    }

}

/**
 * Register the sidebar and footer widget areas.
 */
function rovenblog_widgets_init()
{
    $before_title = '<h5 class="widget-title">';
    $after_title = '</h5>';
    $title_style = get_theme_mod( 'rovenblog_widget_title_style', 'none' );
    // Modify Widget title structure based on the widget styling option.
    
    if ( 'style-1' === $title_style ) {
        $before_title = '<h5 class="widget-title widget-title-style-1">';
    } elseif ( 'style-2' === $title_style ) {
        $before_title = '<h5 class="widget-title widget-title-style-2">';
    } elseif ( 'style-3' === $title_style ) {
        $before_title = '<h5 class="widget-title widget-title-style-3">';
    } elseif ( 'style-4' === $title_style ) {
        $before_title = '<h5 class="widget-title widget-title-style-4">';
    } elseif ( 'style-5' === $title_style ) {
        $before_title = '<h5 class="widget-title widget-title-style-5">';
    } elseif ( 'style-6' === $title_style ) {
        $before_title = '<h5 class="widget-title widget-title-style-6">';
        $after_title = '<svg width="33" height="6" xmlns="https://www.w3.org/2000/svg">
		<path d="M0,4c1.505,0,2.195-0.809,3.069-1.832C3.936,1.152,4.919,0,6.743,0c1.899,0,3.008,1.29,3.898,2.326
		C11.534,3.364,12.131,4,13.128,4c1.505,0,2.195-0.809,3.069-1.832C17.064,1.152,18.047,0,19.871,0c1.9,0,3.009,1.29,3.899,2.326
		C24.662,3.364,25.26,4,26.257,4c1.506,0,2.195-0.809,3.069-1.832C30.193,1.152,31.177,0,33,0v3.528
		c-0.859,0-1.354,0.327-2.152,0.906C29.884,5.131,28.685,6,26.257,6c-1.966,0-3.096-0.812-4.003-1.465
		c-0.869-0.624-1.448-1.007-2.383-1.007c-0.859,0-1.354,0.327-2.152,0.906C16.755,5.131,15.556,6,13.128,6
		c-1.966,0-3.096-0.812-4.004-1.465C8.256,3.91,7.677,3.528,6.743,3.528c-0.859,0-1.354,0.327-2.152,0.906C3.626,5.131,2.428,6,0,6V4
		z"/></svg></h5>';
    } elseif ( 'style-7' === $title_style ) {
        $before_title = '<h5 class="widget-title widget-title-style-7"><span>';
        $after_title = '</span></h5>';
    } elseif ( 'style-8' === $title_style ) {
        $before_title = '<h5 class="widget-title widget-title-style-8"><span>';
        $after_title = '</span></h5>';
    } elseif ( 'style-9' === $title_style ) {
        $before_title = '<h5 class="widget-title widget-title-style-9">';
    } elseif ( 'style-10' === $title_style ) {
        $before_title = '<h5 class="widget-title widget-title-style-10"><span>';
        $after_title = '</span></h5>';
    }
    
    register_sidebar( array(
        'name'          => esc_html__( 'Header Top Colum 1', 'roven-blog' ),
        'id'            => 'rovenblog-header-top1',
        'description'   => esc_html__( 'The widgets added here will appear in the first column of the Top Header', 'roven-blog' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => $before_title,
        'after_title'   => $after_title,
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Header Top Colum 2', 'roven-blog' ),
        'id'            => 'rovenblog-header-top2',
        'description'   => esc_html__( 'The widgets added here will appear in the second column of the Top Header', 'roven-blog' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => $before_title,
        'after_title'   => $after_title,
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Home Page Sidebar', 'roven-blog' ),
        'id'            => 'rovenblog-sidebar-home',
        'description'   => esc_html__( 'The widgets added here will appear in the sidebar enabled for the Home page', 'roven-blog' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => $before_title,
        'after_title'   => $after_title,
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Archive/Category Sidebar', 'roven-blog' ),
        'id'            => 'rovenblog-sidebar-archive',
        'description'   => esc_html__( 'The widgets added here will appear in the sidebar enabled for archive/category', 'roven-blog' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => $before_title,
        'after_title'   => $after_title,
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Author Sidebar', 'roven-blog' ),
        'id'            => 'rovenblog-sidebar-author',
        'description'   => esc_html__( 'The widgets added here will appear in the sidebar enabled for author page', 'roven-blog' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => $before_title,
        'after_title'   => $after_title,
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Search Sidebar', 'roven-blog' ),
        'id'            => 'rovenblog-sidebar-search',
        'description'   => esc_html__( 'The widgets added here will appear in the sidebar enabled for Search', 'roven-blog' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => $before_title,
        'after_title'   => $after_title,
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Colum 1', 'roven-blog' ),
        'id'            => 'rovenblog-footer-1',
        'description'   => esc_html__( 'The widgets added here will appear in the first column of the Footer', 'roven-blog' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => $before_title,
        'after_title'   => $after_title,
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Colum 2', 'roven-blog' ),
        'id'            => 'rovenblog-footer-2',
        'description'   => esc_html__( 'The widgets added here will appear in the second column of the Footer', 'roven-blog' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => $before_title,
        'after_title'   => $after_title,
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Colum 3', 'roven-blog' ),
        'id'            => 'rovenblog-footer-3',
        'description'   => esc_html__( 'The widgets added here will appear in the third column of the Footer', 'roven-blog' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => $before_title,
        'after_title'   => $after_title,
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Colum 4', 'roven-blog' ),
        'id'            => 'rovenblog-footer-4',
        'description'   => esc_html__( 'The widgets added here will appear in the fourth column of the Footer', 'roven-blog' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => $before_title,
        'after_title'   => $after_title,
    ) );
}

add_action( 'widgets_init', 'rovenblog_widgets_init' );

if ( is_customize_preview() ) {
    /**
     * This function is used to help switch the widget tile styling in siderbar based on Customizer options.
     *
     * @param object $params - sidebar parameters.
     */
    function rovenblog_widget_params( $params )
    {
        $before_title = '<h5 class="widget-title">';
        $after_title = '</h5>';
        $title_style = get_theme_mod( 'rovenblog_widget_title_style', 'none' );
        // Modify Widget title structure based on the widget styling option.
        
        if ( 'style-1' === $title_style ) {
            $before_title = '<h5 class="widget-title widget-title-style-1">';
        } elseif ( 'style-2' === $title_style ) {
            $before_title = '<h5 class="widget-title widget-title-style-2">';
        } elseif ( 'style-3' === $title_style ) {
            $before_title = '<h5 class="widget-title widget-title-style-3">';
        } elseif ( 'style-4' === $title_style ) {
            $before_title = '<h5 class="widget-title widget-title-style-4">';
        } elseif ( 'style-5' === $title_style ) {
            $before_title = '<h5 class="widget-title widget-title-style-5">';
        } elseif ( 'style-6' === $title_style ) {
            $before_title = '<h5 class="widget-title widget-title-style-6">';
            $after_title = '<svg width="33" height="6" xmlns="https://www.w3.org/2000/svg">
			<path d="M0,4c1.505,0,2.195-0.809,3.069-1.832C3.936,1.152,4.919,0,6.743,0c1.899,0,3.008,1.29,3.898,2.326
			C11.534,3.364,12.131,4,13.128,4c1.505,0,2.195-0.809,3.069-1.832C17.064,1.152,18.047,0,19.871,0c1.9,0,3.009,1.29,3.899,2.326
			C24.662,3.364,25.26,4,26.257,4c1.506,0,2.195-0.809,3.069-1.832C30.193,1.152,31.177,0,33,0v3.528
			c-0.859,0-1.354,0.327-2.152,0.906C29.884,5.131,28.685,6,26.257,6c-1.966,0-3.096-0.812-4.003-1.465
			c-0.869-0.624-1.448-1.007-2.383-1.007c-0.859,0-1.354,0.327-2.152,0.906C16.755,5.131,15.556,6,13.128,6
			c-1.966,0-3.096-0.812-4.004-1.465C8.256,3.91,7.677,3.528,6.743,3.528c-0.859,0-1.354,0.327-2.152,0.906C3.626,5.131,2.428,6,0,6V4
			z"/></svg></h5>';
        } elseif ( 'style-7' === $title_style ) {
            $before_title = '<h5 class="widget-title widget-title-style-7"><span>';
            $after_title = '</span></h5>';
        } elseif ( 'style-8' === $title_style ) {
            $before_title = '<h5 class="widget-title widget-title-style-8"><span>';
            $after_title = '</span></h5>';
        } elseif ( 'style-9' === $title_style ) {
            $before_title = '<h5 class="widget-title widget-title-style-9">';
        } elseif ( 'style-10' === $title_style ) {
            $before_title = '<h5 class="widget-title widget-title-style-10"><span>';
            $after_title = '</span></h5>';
        }
        
        $params[0]['before_title'] = $before_title;
        $params[0]['after_title'] = $after_title;
        return $params;
    }
    
    add_filter( 'dynamic_sidebar_params', 'rovenblog_widget_params' );
}

/**
 * Register and load theme specific widgets.
 */
function rovenblog_load_widgets()
{
    register_widget( 'RB_Widget_Archives' );
    register_widget( 'RB_Widget_Categories' );
    register_widget( 'RB_Widget_Logo' );
    register_widget( 'RB_Widget_Social_Networks' );
    register_widget( 'RB_Widget_Social_Networks_List_Alt' );
    register_widget( 'RB_Widget_Posts' );
    register_widget( 'RB_Widget_Tag_Cloud' );
    register_widget( 'RB_Widget_Text' );
}

add_action( 'widgets_init', 'rovenblog_load_widgets' );