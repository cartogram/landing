(function ($) {  

  $(function(){
    /* Isotope Browser Check  */

  function isotopeAnimationEngine(){
    if(jQuery.browser.mozilla || jQuery.browser.msie){
      return "jquery";
    }else{
      return "css";
    }
  }

  /* Filtering */

  function projectFilterInit() {
    $('#filterNav a').click(function(){
      var selector = $(this).attr('data-filter');  
      $('.isotope').isotope({
        filter: selector,     
        hiddenStyle : {
            opacity: 0,
            scale : 1
        }     
      });
    
      if ( !$(this).parent().hasClass('active') ) {
        $(this).parents('#filterNav').find('.active').removeClass('active');
        $(this).parent().addClass('active');
      }
    
      return false;
    }); 
  }
  projectFilterInit();
  $('.isotope-item').hide();

  var $container = $('.isotope');

  $container.imagesLoaded( function(){
    $('.isotope-item').fadeIn();
    $container.isotope({
      itemSelector : '.isotope-item',
      layoutMode : 'masonry',
      animationEngine: isotopeAnimationEngine()
    });
  });
  /* Slider */
  $('.flexslider-thumbnails').flexslider({
      animation: "slide",
      namespace: "cartogram-slider-",
   //   controlNav: "thumbnails",
      directionNav: false,
      pauseOnHover: true,
      slideshowSpeed: 5000
    });
   $('.flexslider').flexslider({
      animation: "slide",
      namespace: "cartogram-slider-",
      directionNav: false,
      pauseOnHover: true,
      slideshowSpeed: 5000
    });

  /* Accordion Nav */
   $('#nav-database > li > a').click(function(){
    if ($(this).attr('class') != 'active'){
      $('#nav-database li ul').slideUp();
      $(this).next().slideToggle();
      $('#nav-database li a').removeClass('active');
      $(this).addClass('active');
    }
    return false;
  });
  
  });
  
})(jQuery);

