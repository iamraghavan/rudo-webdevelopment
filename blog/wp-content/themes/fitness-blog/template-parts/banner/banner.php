<?php
/**
 * Fitness Blog Hero Home two
 */

 $banner_title = get_theme_mod('banner_title', __('Welcome to Reptiles World', 'fitness-blog'));
 $banner_description = get_theme_mod('banner_descriptions', __('Simply dummy text of the printing and typesetting industry.
 has been theindustry\'s standard dummy text ever since the
 1500s, when an unknownprinter', 'fitness-blog'));
 $get_banner_image = get_theme_mod('banner_image');
 $button_text = get_theme_mod('banner_button_text', __( 'Discover', 'fitness-blog' ));
 $button_link = get_theme_mod('banner_button_link', '#');
 ?>
 <section id="hero-section" class="banner-section">
     <div class="container">
         <div class="row">
            <?php 
            $banner = false;
            $col_class = 'col-md-6 ';
            if(!$get_banner_image): 
                $banner = true;
                $col_class = 'col-md-12 ';
            endif;
            ?>
             <div class="<?php echo $col_class; ?>align-self-center">
                <div class="hero-content mb-4 mb-md-0">
                 <?php
                 if(!empty($banner_title)) :
                 ?>
                    <h2 class="banner-title mt-0"><?php echo wp_kses_post($banner_title); ?></h2>
                <?php endif;
                if (!empty($banner_description)) :
                ?>
                    <p class="banner-descriptions"><?php echo wp_kses_post($banner_description); ?></p>
                <?php endif;
                if (!empty($button_text)):
                ?>
                    <div class="discover-me-button">
                        <a href="<?php echo esc_url($button_link);?>"><?php echo esc_html( $button_text );?></a>
                    </div>
                 <?php endif; ?>
                </div>
             </div>
            <?php
                if(!$banner):
                ?>
                    <div class="col-md-6 text-right">
                        <div class="hero-right-img">
                        <?php
                            echo wp_get_attachment_image( $get_banner_image['id'], 'full' );
                        ?>
                        </div>
                    </div>
                <?php
                endif;
                ?>
         </div>
     </div>
 </section>
