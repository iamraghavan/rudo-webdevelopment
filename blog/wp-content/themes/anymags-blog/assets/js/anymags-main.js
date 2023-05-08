jQuery(document).ready(function() {

    jQuery(window).on('scroll', function() {
        if (jQuery(this).scrollTop() > 200) {
            jQuery('.anymags-sticky').addClass("sticky-nav");
        } else {
            jQuery('.anymags-sticky').removeClass("sticky-nav");
        }
    });

    jQuery('.skip-link-search-skip').focus(function(){
        jQuery('.skip-link-search-back-skip').focus();
    });

    //search toggle js
    jQuery('.header-search > .search-btn').click(function(){
        jQuery(this).siblings('.header-search-form').fadeIn('slow');
    });
    jQuery('.header-search-form .close' && '.header-search-form').click(function(){
        jQuery('.header-search-form').fadeOut('slow');
    });

    jQuery(window).keyup(function(e){
        if(e.key == "Escape") {
            jQuery('.header-search-form').fadeOut('slow');
        }
    });

    jQuery('.header-search-form .search-form').click(function(e){
        e.stopPropagation();
    });

    // featured-post-slider
    jQuery('.category-post-slider-active').slick({
        dots: false,
        infinite: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2500,
        speed: 2000,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

});