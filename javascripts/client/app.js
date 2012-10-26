jQuery(document).ready(function($) {
//code here


  
  /* ========================================================================================================================
  
  Isotope Animations
  
  ======================================================================================================================== */

  /**
   * Animation Engine
   *
   */
  function isotopeAnimationEngine(){
    if(jQuery.browser.mozilla || jQuery.browser.msie){
      return "jquery";
    }else{
      return "css";
    }
  }

  /**
   * Project Filtering
   *
   */
  function projectFilterInit() {
    $('.isotope-item').hide();
    $('.nav-filter a').click(function(){
      var selector = $(this).attr('data-filter');
      $('.isotope').isotope({
        filter: selector,
        hiddenStyle : {
            opacity: 0,
            scale : 1
        }
      });
    
      if ( !$(this).parent().hasClass('active') ) {
        $(this).parents('.nav-filter').find('.active').removeClass('active');
        $(this).parent().addClass('active');
      }
    
      return false;
    });
  }
  
  projectFilterInit();
  

  /**
   * Load Images before calling isotope so that we get the right dimensions.
   *
   */
  var $container = $('.isotope');

  $container.imagesLoaded( function(){
    $('.isotope-item').fadeIn();
    $container.isotope({
      itemSelector : '.isotope-item',
      layoutMode : 'masonry',
      animationEngine: isotopeAnimationEngine()
    });
  });


  /* ========================================================================================================================
  
  Flexslider Functions
  
  ======================================================================================================================== */

   
 $('.flexslider').flexslider({
    animation: "slide",
    namespace: "cartogram-slider-",
    directionNav: true,
    controlNav: true,
    slideshow: false,
    pauseOnHover: true,
    slideshowSpeed: 5000,
    animationLoop: false,
    itemWidth: 308,
    itemMargin: 15,
    minItems: 1,
    maxItems: 3
  });

});

