<!-- slider-area -->
<section class="posts-sider fix"  >               
        <div class="category-post-slider-active">
        <?php 
          $anymags_slider_category = get_theme_mod('anymags_featured_category'); 
          $anymags_slider_posts  =   get_theme_mod('anymags_number_of_post',5); 
          $args = array(
          'category_name'=>$anymags_slider_category,
          'posts_per_page'=> $anymags_slider_posts,
          );
          $query = new WP_Query( $args );
          

          if($query->have_posts()):
                  while($query->have_posts()):$query->the_post();  
                    $categories = get_the_category();
                    foreach ( $categories as $category ) { 
                        $anymags_news_slider_category=$category->cat_name; 
                    }
          ?>
        
            <div class="box-slider-post hover-zoomin">
                <?php if (has_post_thumbnail()) { ?>
                
                    <?php the_post_thumbnail('slider-post-thumbnail'); ?>
               
                <?php } else { ?>
                   <img src="<?php echo esc_url(get_stylesheet_directory_uri().'/assets/images/defaultthemecolor.png') ?>" class="img-responsive" alt="<?php echo esc_html(get_post_thumbnail_id()); ?>">
                <?php } ?>
                <div class="text">
                    <div class="post-tags">
                        <ul>
                            <li class="slider-cat"><?php echo esc_html($anymags_news_slider_category); ?></li>
                        </ul>
                    </div>
                    <h3> <a href="<?php  the_permalink();?>"><?php the_title();?> </a> </h3>
                    <div class="post-tags mt-20">
                        <ul>
                            <li>  
                                <span class="icon">
                                <i class="fa fa-user-crown"></i>
                                </span> 
                                <?php anymags_posted_by(); ?> 
                            </li>
                            <li>
                                <span class="icon">
                                <i class="fa fa-clock"></i>
                                </span> 
                                <?php anymags_posted_on(); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php  
        endwhile;
        else:
            echo "<p>No Content found</p>";

        endif;
      ?>       
              
        </div> 
</section>
<!-- slider-area-end -->